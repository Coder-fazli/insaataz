<?php

namespace App\Http\Controllers;
use Mail;
use App\Enum\Status;
use App\Models\Category;
use App\Models\Order;
use App\Models\Brand;
use App\Models\OrderItems;
use App\Models\Product;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{

    public function __construct(
        private CategoryRepository $categoryRepository,
        private ProductRepository  $productRepository,
        private BrandRepository    $brandRepository,
    )
    {
    }

    const ITEMCOUNT = 12;

    public function index(Request $request)
    {
        //if(request()->get('pagetype')) {

        //} else {
            // return view('site.maintance');
        //}



        $minPrice = Cache::remember('products_min_price', now()->addMinutes(10), function () {
            return Product::where('status', Status::ACTIVE)->min('price');
        });

        $maxPrice = Cache::remember('products_max_price', now()->addMinutes(10), function () {
            return Product::where('status', Status::ACTIVE)->max('price');
        });

//        $category = $this->categoryRepository->all();

        $category = Cache::remember('category', now()->addMinutes(10), function () {
            return Category::where('status', Status::ACTIVE)->orderByRaw('CAST(`order` AS UNSIGNED)')
                ->get();
        });

        if ($request->ajax()) {
            $query = Product::query()->select(['products.*', 'pf.image as front_image', 'pp.image as back_image'])
                ->leftJoin('product_photos as pf', function ($j) {
                    $j->on('pf.product_id', '=', 'products.id');
                    $j->where('pf.is_front', true);
                })
                ->leftJoin('product_photos as pp', function ($j) {
                    $j->on('pp.product_id', '=', 'products.id');
                    $j->where('pp.is_back', true);
                })
                ->where('products.status', Status::ACTIVE);

            $max = (string)$request->maxPrice;
            $min = (string)$request->minPrice;
            $brands = (array)$request->brand;

            if ($max && $min) {
                $query->whereBetween('price',
                    array($min, $max));
                // $query->orWhere('products.discount_price', '<=', 300);
            }

            if ($brands) {
                $query->whereIn('brand_id', $brands);
            }

            $sortbyArr = explode('_', $request->sortBy);
            $sortbyArr[0] = $sortbyArr[0] == 'date' ? 'created_at' : $sortbyArr[0];

            // $sortbyArr[0] => sıralama yapılacak sütun adı (price veya date)
            // $sortbyArr[1] => sıralama yönü (asc veya desc)


            if ($sortbyArr[1] == 'asc') {
                $query->orderBy($sortbyArr[0]);
            } else {
                $query->orderBy($sortbyArr[0], 'desc');
            }


            $products = $query->paginate(self::ITEMCOUNT);
            $html = View::make('site.partials.productByCategoryList', compact('products'))->render();
            $nextPage = $products->nextPageUrl() ? 'have' : 'not_have';

            return response()->json([
                'success' => true,
                'html' => $html,
                'next' => $nextPage
            ]);
        }

        $page = request('page', 1); // Geçerli sayfa numarasını al
        $cacheKey = "products_with_category_photos_page_v6_{$page}";

        $products = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return Product::with(['category', 'photos'])
                ->orderby('id', 'asc')
                ->where('status', Status::ACTIVE)
                ->paginate(self::ITEMCOUNT);
        });


//        $products = Product::with(['category', 'photos'])->orderbyRaw('products.category_id = 80 DESC')->paginate(self::ITEMCOUNT);
//
//        $products = $this->productRepository
//        ->joinPhoto()
//        ->orderByRaw('products.category_id = 80 DESC')
//        ->paginate(self::ITEMCOUNT);


//        $categories = $this->categoryRepository->getParents();





        $categories = Cache::remember('categories_with_children_v2'.time(), now()->addMinutes(10), function () {
            return Category::orderBy('order')
                ->with([
                    'getChildren',
                    'getChildren.getChildren',
                    'getChildren.getChildren.getChildren',
                ])
                ->where('status', Status::ACTIVE)
                ->whereNull('parent_id')
                ->get();
        });

        $brands = Cache::remember('brands_v2', now()->addMinutes(10), function () {
            return Brand::where('status', Status::ACTIVE)->get();
        });
//        $brands = $this->brandRepository->all();

        return view('site.products.index', compact('category', 'products', 'categories', 'brands', 'minPrice', 'maxPrice'));
    }



    public function categories(Request $request, $id=0)
    {



        $category = Cache::remember('category', now()->addMinutes(10), function () {
            return Category::where('status', Status::ACTIVE)->orderByRaw('CAST(`order` AS UNSIGNED)')
                ->get();
        });



        $page = request('page', 1); // Geçerli sayfa numarasını al
        $cacheKey = "products_with_category_photos_page_v6_{$page}";
        $products = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return Product::with(['category', 'photos'])
                ->orderby('id', 'asc')
                ->where('status', Status::ACTIVE)
                ->paginate(self::ITEMCOUNT);
        });



        $categories = Cache::remember('categories_with_children_v2_1', now()->addMinutes(10), function () {
            return Category::orderBy('order')
                ->with([
                    'getChildren',
                    'getChildren.getChildren',
                    'getChildren.getChildren.getChildren',
                ])
                ->where('status', Status::ACTIVE)
                ->whereNull('parent_id')
                ->get();
        });
        if ($id == 0)
        {
            $allCategories = $categories;
        }
        else{
            $category = Category::findorfail($id);
            $subs = Category::where('parent_id', $id)->where('status', 1)->get();
            if (count($subs) > 0)
            {
                $allCategories = $subs;
            }
            else
            {
                return redirect()->route('products', ['category_id' => $id]);
            }
        }




        return view('site.products.categories', compact('category', 'products', 'categories', 'allCategories'));
    }

    public function product($slug)
    {
       // return view('site.maintance');
        $field = 'slug->' . app()->getLocale();

        $product = Product::where($field, $slug)->where('status', Status::ACTIVE)
            ->with([
                'photos', 'category:id,title', 'features'
            ])
            ->firstorfail();

//        $product = $this->productRepository->getBySlug($slug, ['photos', 'features', 'category:id,title']);

        if ($product) {
            $images = $product->photos;
            $features = $product->features;

            $modulus = time() % 5;
            $cacheKey = 'related_products_category:'.$product->category_id.'_v_'.$modulus;
            $relatedProducts = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($product) {
                return Product::where('status', Status::ACTIVE)
                    ->with([
                        'category:id,title', 'photos'
                    ])
                    ->where('category_id', $product->category_id)
                    ->inRandomOrder()
                    ->limit(12)
                    ->get();
            });


            return view('site.products.detail', compact('product', 'images', 'features', 'relatedProducts'));
        } else {
            // Eğer blog bulunamazsa, 404 sayfasına yönlendir
            return abort(404);
        }
    }

    public function quickView($id)
    {

        $product = $this->productRepository->get($id, ['photos']);
        $photos = $product->photos;

        return View::make('site.partials._product-quick-view', compact('product', 'photos'));
    }


    public function addToCart()
    {
        $productId = (int)request('id');
        $qty = (int)request('qty') ?? 1;

        if (!$qty)
            $qty = 1;

        $product = $this->productRepository->get($productId);
        // $product = Product::query()->find($productId);

        if ($product) {
            if($product->stock == 0) {
                return response()->json(['error' => true, 'message' => __('site.notInStock')]);
            } else {
                Cart::add($product->id, $product->title, $qty ?? 1, $product->discount_price ?? $product->price, 1);
                $products = $this->productRepository->getProductsFromCart();

                $cartModalHtml = $this->generateCartModal($products);

                return response()->json(['success' => true, 'message' => __('site.addCartSuccess'), 'count' => $products->sum('qty'), 'cartModal' => $cartModalHtml]);
            }
        } else {
            return response()->json(['success' => true, 'message' => __('site.addCartError')]);
        }
    }

    public function cart()
    {
        $products = $this->productRepository->getProductsFromCart();
        return \view('site.cart', compact('products'));
    }

    public function updateCart()
    {
        $row = request('row');
        $productId = (int)request('id');
        $qty = (int)request('qty');
        $product = Product::query()->find($productId);

        if ($qty > $product->stock) {
            $products = $this->productRepository->getProductsFromCart();
            $cartModalHtml = $this->generateCartModal($products);

            return response()->json(['success' => false, 'message' => __('site.is_not_enough'), 'count' => $products->sum('qty'), 'cartModal' => $cartModalHtml]);
        } else {
            Cart::update($row, $qty);
            $products = $this->productRepository->getProductsFromCart();
            $cartModalHtml = $this->generateCartModal($products);

            $cartBox = View::make('site.partials._cart', ['products' => $products])->render();

            return response()->json(['success' => true, 'count' => $products->sum('qty'), 'cartBox' => $cartBox, 'cartModal' => $cartModalHtml]);
        }
    }

    public function removeCart()
    {
        $row = request('row');

        try {
            Cart::remove($row);
            $products = $this->productRepository->getProductsFromCart();
            $cartModalHtml = $this->generateCartModal($products);
            $cartBox = View::make('site.partials._cart', ['products' => $products])->render();

            return response()->json(['success' => true, 'count' => $products->sum('qty'), 'cartBox' => $cartBox, 'cartModal' => $cartModalHtml]);
        } catch (\Exception $exception) {
            dd($exception->getMessage());

            return response()->json(['success' => false, 'count' => $products->sum('qty')]);
        }
    }

   public function category(Request $request)
{
    $sort = $request->get('sort');
    $brand_id = $request->get('brand_id');
    $category_id = $request->get('category_id');
    $max_price = $request->get('max_price', 1000000);
    $min_price = $request->get('min_price', 0);
    $perPage = $request->get('perPage', 9);
    $page = $request->get('page', 1);

    // Initialize the query with the 'product_shema_images' relationship
    $query = Product::with('photos', 'category');

    if ($brand_id) {
        $query->where('brand_id', $brand_id);
    }

    if ($category_id) {
//        $categoryIds = Category::where('id', $category_id)
//            ->orWhere('parent_id', $category_id)
//            ->pluck('id')->toArray();
//        $query->whereIn('category_id', $categoryIds);

        $categoryIds = Category::where('id', $category_id)
            ->orWhere('parent_id', $category_id)
            ->orderBy('order', 'asc')
            ->pluck('id')
            ->toArray();


        $query->whereIn('category_id', $categoryIds)
            ->orderByRaw('FIELD(category_id, ' . implode(',', $categoryIds) . ')');

    }

    if ($min_price !== null) {
        $query->where('price', '>=', $min_price);
    }

    if ($max_price !== null) {
        $query->where('price', '<=', $max_price);
    }

    if ($sort) {
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'date_desc':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
    } else {
        $query->orderBy('created_at', 'asc');
    }

    $products = $query->skip(($page - 1) * $perPage)->take($perPage)->orderByDesc('order')->get();

    return response()->json($products);
}


    public function generateCartModal($products)
    {
        return view('site.partials._modalCart', ['products' => $products])->render();
    }

    public function order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'payment' => 'required',
        ]);

        $products = $this->productRepository->getProductsFromCart();

        if ($products->isEmpty())
            abort(404);

        try {
            $client_id = Auth::guard('client') ? Auth::guard('client')->id() : null;

            // if($request->payment == 'card'){

            // }

            if($request->delivery == 'deliveryFromAddress'){
                if(!empty($request->address)) {
                    $delivery = $request->address;
                } else {
                    return redirect()->back()->with(['message' => __('site.you_have_selected_delivery_to_address_but_you_havent_entered_address'), 'type' => 'error']);
                }
            } else {
                $delivery = $request->delivery;
            }

            $order = Order::create([
                'client_id' => $client_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'payment' => $request->payment,
                'delivery' => $delivery,
                'item_count' => $products->sum('qty'),
                'total' => $products->sum('total'),
                'status' => Status::ACTIVE,
            ]);

            foreach ($products as $product) {
                OrderItems::create([
                    'product_id' => $product->id,
                    'qty' => $product->qty,
                    'price' => $product->discount_price ?? $product->price,
                    'total' => $product->total,
                    'order_id' => $order->id,
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => __('site.errorOrder'), 'type' => 'error']);
        }
        Cart::destroy();

        return redirect()->route('home')->with(['message' => __('site.successOrder'), 'type' => 'success']);
    }

    public function search(Request $request){
        $search = $request->input('q');
        $locale = app()->getLocale();
        $field = 'products.title->' . $locale;

        $products = Product::select([
                'products.*',
                'pf.image as front_image',
                'pp.image as back_image',
                'categories.title as category_title',
                'brands.title as brand_title'
            ])
            ->leftJoin('product_photos as pf', function ($j) {
                $j->on('pf.product_id', '=', 'products.id');
                $j->where('pf.is_front', true);
            })
            ->leftJoin('product_photos as pp', function ($j) {
                $j->on('pp.product_id', '=', 'products.id');
                $j->where('pp.is_back', true);
            })
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.status', Status::ACTIVE)
            ->where(function($query) use ($field, $search, $locale) {
                // Normalize for Turkish characters (ı/i)
                $searchNormalized = str_replace(['ı', 'İ'], ['i', 'i'], mb_strtolower($search));

                $query->where($field, 'like', "%{$search}%")
                      ->orWhereRaw("LOWER(JSON_EXTRACT(brands.title, '$.{$locale}')) LIKE LOWER(?)", ["%{$search}%"])
                      ->orWhereRaw("LOWER(JSON_EXTRACT(categories.title, '$.{$locale}')) LIKE LOWER(?)", ["%{$search}%"])
                      // Search with normalized Turkish characters
                      ->orWhereRaw("REPLACE(REPLACE(LOWER(JSON_EXTRACT(products.title, '$.{$locale}')), 'ı', 'i'), 'i̇', 'i') LIKE ?", ["%{$searchNormalized}%"])
                      ->orWhereRaw("REPLACE(REPLACE(LOWER(JSON_EXTRACT(categories.title, '$.{$locale}')), 'ı', 'i'), 'i̇', 'i') LIKE ?", ["%{$searchNormalized}%"]);
            })
            ->orderByRaw("
                CASE
                    WHEN LOWER(JSON_EXTRACT(brands.title, '$.{$locale}')) LIKE LOWER(?) THEN 1
                    WHEN LOWER(JSON_EXTRACT(categories.title, '$.{$locale}')) LIKE LOWER(?) THEN 2
                    WHEN LOWER(JSON_EXTRACT(products.title, '$.{$locale}')) LIKE LOWER(?) THEN 3
                    WHEN LOWER(JSON_EXTRACT(products.title, '$.{$locale}')) LIKE LOWER(?) THEN 4
                    ELSE 5
                END
            ", ["%{$search}%", "%{$search}%", "{$search}%", "% {$search}%"])
            ->orderBy('products.id', 'desc')
            ->get();

        return view('site.products.search', compact('products'));
    }

    public function get_price(Request $request) {
        // Validating incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email_and_phone' => 'required',
            'product_name' => 'required|string|max:255',
        ]);

        // Proceed only if the data is validated
        // $validatedData contains sanitized and validated input

        $email = env('MAIL_USERNAME');
        $subject = __('site_form.subject');

        // Sending mail with validated data
        $sended = Mail::send('site.get_price', $validatedData, function ($message) use ($subject, $email) {
            $message->to($email)->subject($subject);
        });

        // Redirecting back with success message if mail sent successfully
        if ($sended) {
            return redirect()->back()->with('success', __('site_form.success'));
        }
    }

}
