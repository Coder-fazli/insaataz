<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\EmailRequest;
use App\Models\ContactForm;
use App\Models\Email;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SliderRepository;
use App\Repositories\AboutRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Artisan;
use App\Models\Certificate;
use App\Models\Partner;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Settings;
use App\Enum\Status;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    public function __construct(
        private SliderRepository   $sliderRepository,
        private CategoryRepository $categoryRepository,
        private ProductRepository  $productRepository,



//        private ServicesRepository  $servicesRepository,
//        private PackageRepository  $packageRepository,
        private AboutRepository  $aboutRepository,
//        private FaqRepository  $faqRepository,

    )
    {

    }

    public function index()
    {

        $chosenProducts = Cache::remember('chosen_products_with_category_photos_v7', now()->addMinutes(10), function () {
            return Product::with(['category', 'photos'])
                ->where('is_chosen', Status::ACTIVE)
                ->orderBy('updated_at', 'desc')
                ->limit(12)
                ->get();
        });

//        $chosenProducts = $this->productRepository->getChosen(12, ['category','photos'])->joinPhoto()->get();


        $modulus = time() % 5;



//        $bestSellerProducts = $this->productRepository->getBestSeller(5, ['category', 'photos'])->joinPhoto()->get();

        $cachename = 'bestseller_last_products_';
        $bestSellerProducts = Cache::remember($cachename, now()->addMinutes(10), function () {
            return Product::with(['category', 'photos'])
                ->where('is_best_seller', Status::ACTIVE)
//                ->inRandomOrder()
                ->limit(5)
                ->get();
        });

//        $discounted = $this->productRepository->getDiscountedProducts(12,['category', 'photos'], random: true)->joinPhoto()->get();

        $cachename = 'discounted_random_products_v_'.$modulus;
        $discounted = Cache::remember($cachename, now()->addMinutes(10), function () {
            return Product::with(['category', 'photos'])
                ->limit(12)
                ->inRandomOrder()
                ->whereNotNull('discount_price')
                ->where('discount_price', '!=', 0)
                ->get();
        });

        $partners = Partner::all();

        return view('site.home', [
            'chosenProducts' => $chosenProducts,
            'bestSellerProducts' => $bestSellerProducts,
            'sliders' => $this->sliderRepository->getActives(),
//            'bestSellerRandomProducts' => $this->productRepository->getBestSeller(3,['category', 'photos'], random: true)->joinPhoto()->get(),
//            'chosenRandomProducts' => $this->productRepository->getChosen(3,['category', 'photos'], random: true)->joinPhoto()->get(),
//            'latestRandomProducts' => $this->productRepository->getLatest(3,['category', 'photos'], random: true)->joinPhoto()->get(),
            'discountedRandomProducts' => $discounted,
            'partners' => $partners,
        ]);
    }


    public function product($slug)
    {


        $product = $this->productRepository->getBySlug($slug, ['photos', 'features', 'category:id,title']);

        $images = $product->photos;
        $features = $product->features;

        $relatedProducts = $this->productRepository->getRelatedByCategory($product->category_id, 12, 'category:id,title');

//        $this->createTranslatedLinks($product->getTranslations('slug'), 'product');
        return view('site.products.detail', compact('product', 'images', 'features', 'relatedProducts'));
    }


    public function quickView($id)
    {
        $product = $this->productRepository->get($id, ['photos']);
        $photos = $product->photos;
        return View::make('site.partials._product-quick-view', compact('product', 'photos'));
    }


    public function about()
    {
        $about = $this->aboutRepository->first();
        $certificates = Certificate::all();
        $partners = Partner::all();
        return view('site.about', compact('about', 'certificates', 'partners'));
    }

    public function addToCart()
    {
        $productId = request('id');
        $qty = request('qty');
        $product = $this->productRepository->get($productId);
        if ($product) {
            Cart::add($product->id, $product->title, $qty ?? 1, $product->discount_price ?? $product->price, 1);
            return response()->json(['success' => true, 'message' => __('site.addCartSuccess'), 'count' => Cart::count()]);
        } else {
            return response()->json(['success' => true, 'message' => __('site.addCartError')]);
        }
    }

    public function cart()
    {
        $cartProducts = Cart::content();
        $productIds = $cartProducts->pluck('id');
        $products = $this->productRepository->getByIds($productIds, ['photos:id,image']);
        $this->custom_array_merge($products, $cartProducts);
        return \view('site.cart', compact('products'));
    }

    function custom_array_merge(&$products, &$cartProducts)
    {
        foreach ($cartProducts as $key_1 => &$cartProduct) {
            foreach ($products as $key_1 => $product) {
                if ($cartProduct->id == $product->id) {
                    $product['qty'] = $cartProduct->qty;
                    $product['rowId'] = $cartProduct->rowId;
                }
            }
        }
        return $products;
    }

    public function contactForm(ContactFormRequest $request)
    {
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        ContactForm::create($data);

        // Send email notification
        try {
            \Mail::send('emails.contact', $data, function ($message) use ($data) {
                $message->to('info@orelinsaat.az')
                    ->subject('Yeni əlaqə forması: ' . $data['subject']);
                $message->replyTo($data['email'], $data['fullname']);
            });
        } catch (\Exception $e) {
            \Log::error('Contact form email error: ' . $e->getMessage());
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => __('site.form_sended'),
            ]);
        }

        return redirect()->back()->with(['type' => 'success', 'message' => __('site.form_sended')]);
    }

    public function emailForm(EmailRequest $request)
    {
        Email::create($request->validated());
        return response()->json(['message' => 'saved']);
    }

    private function createTranslatedLinks($slugs, $route): void
    {
        $translatedLinks = [];
        foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale) {
            $translatedLinks[$locale] =
                LaravelLocalization::localizeUrl(
                    route($route, ['slug' => data_get($slugs, $locale, $slugs['az'])]),
                    $locale
                );
        }
        View::share('translatedLinks', $translatedLinks);
    }

    public function service($slug)
    {
        $service = $this->servicesRepository->getBySlug($slug);
        $o_services = $this->servicesRepository->all();
        $this->createTranslatedLinks($service->getTranslations('slug'), 'service');
        return view('site.services.detail', compact('service', 'o_services'));
    }

    public function services()
    {
        $services = $this->servicesRepository->all();
        return view('site.services.index', compact('services'));
    }

    public function portfolio(){
        $portfolio = Portfolio::orderBy('id', 'desc')->paginate(12);
        return view('site.portfolio.index', compact('portfolio'));
    }

    public function contact(){
        $settings = Settings::first();
        return view('site.contact', compact('settings'));
    }

    public function blog(){
        $blog = Blog::orderBy('id', 'desc')->paginate(9);
        return view('site.blog.index', compact('blog'));
    }

    public function blogDetail($slug){
        $blog = Blog::where('slug', $slug)->first();

        if ($blog) {
            Blog::where('slug', $slug)->update(['view' => $blog->view + 1]);
            $blog->view++;
            $photos = $blog->photos()->get();
            return view('site.blog.detail', compact('blog', 'photos'));
        } else {
            // Eğer blog bulunamazsa, 404 sayfasına yönlendir
            return abort(404);
        }
    }
}
