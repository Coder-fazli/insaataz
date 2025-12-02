<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Client modelini kullanmak için ekledik
use App\Models\FavoriteProduct;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Enum\Status;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductRepository;

class ClientController extends Controller
{
    public function __construct(
        private ProductRepository  $productRepository
    )
    {

    }
    
    public function registerForm()
    {
        return view('auth.register'); // Kayıt formunu gösteren view dosyasını kullanabilirsiniz.
    }

    public function submitRegisterForm(Request $request)
    {
        $rules = [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ];

        $messages = [
            'email.unique' => __('message.this_email_already_exists'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('profile.register')
                ->withErrors($validator)
                ->withInput();
        }

        $client = new Client([
            'fullname'  => $request->input('fullname'),
            'email'     => $request->input('email'),
            'phone'     => $request->input('phone'),
            'password'  => Hash::make($request->input('password')),
        ]);

        $client->activation_token = Str::random(55);
        $client->is_confirmed = 0; //deaktiv
            
        $client->save();

        Mail::send('site.mail.activation', ['client' => $client], function (Message $message) use ($client) {
            $message->to($client->email)
                    ->subject('Confirmation Email');
        });

        return redirect()->route('profile.login')->with([
            'message' => __('message.Success_register_Please_confirm_your_email_address'),
            'type'    => 'success',
        ]);
    }
    
    public function activation($activation)
    {
        DB::beginTransaction();

        try {
            $response = $this->getClientFromToken($activation);
            
            if ($response['success']) {

                // Mail::send('site.mail.activation_for_admin', ['client' => $response['client']], function (Message $message) use ($response) {
                //     $message->to('admin@orel.coder.az')
                //             ->subject('Confirmation Email');
                // });

                return redirect()->route('profile.login')->with([
                    'message' => $response['message'],
                    'type'    => 'success',
                ]);
            } else {
                return redirect()->route('profile.login')->with([
                    'message' => $response['message'],
                    'type'    => 'error',
                ]);
            }

        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }

        return false;
    }

    public function mailChangeActivation($activation){
        DB::beginTransaction();

        try {
            $response = $this->getClientFromToken($activation);
            
            if ($response['success']) {

                // Mail::send('site.mail.activation_for_admin', ['client' => $response['client']], function (Message $message) use ($response) {
                //     $message->to('admin@orel.coder.az')
                //             ->subject('Confirmation Email');
                // });

                return redirect()->route('profile.login')->with([
                    'message' => __('message.changed_mail_activated'),
                    'type'    => 'success',
                ]);
            } else {
                return redirect()->route('profile.login')->with([
                    'message' => __('message.changed_mail_NotActivated'),
                    'type'    => 'error',
                ]);
            }

        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }

        return false;
    }

    public function getClientFromToken($activation)
    {
        $client = Client::where('activation_token', $activation)->first();
    
        if (!is_null($client)) {
            $client->activation_token = null;
            $client->is_confirmed = Status::ACTIVE;
            $client->save();

            DB::commit();
            return ['success' => true, 'message' => __('message.register_completed'), 'client' => $client];
        } else {
            return ['success' => false, 'message' => __('message.register_NotCompleted')];
        }
    }

    public function profile(){
        $client = auth()->guard('client')->user();
        return view('site.profile.index', compact('client'));
    }
    
    public function wishList(){
        if(Auth::guard('client')->check()){
            $clientID = Auth::guard('client')->id();
            $favoriteProduct = new FavoriteProduct();
            $favProductsQuery = $favoriteProduct->getFavoriteProductsWithPhotos($clientID);
            $favProducts = $favProductsQuery->paginate(8);
            
            return view('site.profile.wishList',compact('favProducts'));
        } else {
            return redirect()->route('profile.login')->with([
                'message'=> __('message.please_login'),
                'type'=> 'error',
            ]);
        }
    }
    
    public function loginForm()
    {
         return view('auth.login');
    }
    
    public function submitLoginForm(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('client')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'is_confirmed' => 1])){
            return redirect()->intended('/');
        } else {
            return redirect()->route('profile.login')->with([
                'message'=> __('login.waiting_email_confirmation'),
                'type'=> 'error',
            ]);
        }

        // if (Auth::guard('client')->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        //     'is_confirmed' => 1], $request->get('remember'))){
        //      dd($remember);
        //     //  ,
        //     // 'is_active' => 1
        //     // return redirect()->intended('/');
        // }

        return redirect()->route('profile.login')->with([
            'message'=> __('message.login_is_incorrect'),
            'type'=> 'error',
        ]);

        return back()->withInput($request->only('email'));
    }

    public function clientLogout() {
        Auth::guard('client')->logout();
        return redirect()->route('profile.login');
    }

    public function addFavorite(Request $request) {
        // Middleware-de auth client check olunur
        $clientID = Auth::guard('client')->id();
        $productID = $request->product;


        $favoriteProduct = FavoriteProduct::create([
            'client_id' => $clientID,
            'product_id' => $productID,
        ]);

        if($favoriteProduct){
            return redirect()->back()->with([
                'message'=> __('message.success_add_favorite'),
                'type'=> 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message'=> __('message.cant_add_favorite'),
                'type'=> 'error',
            ]);
        }
    }

    public function removeFromFavorite(Request $request) {
        // Middleware-de auth client check olunur
        $clientID = Auth::guard('client')->id();
        $productID = $request->product;
    
        $favoriteProduct = FavoriteProduct::where([
            'client_id' => $clientID,
            'product_id' => $productID,
        ])->delete();
    
        if ($favoriteProduct) {
            return redirect()->back()->with([
                'message' => __('message.success_remove_favorite'),
                'type' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => __('message.cant_remove_favorite'),
                'type' => 'error',
            ]);
        }
    }

    public function addCompare(Request $request){
        // Middleware-de auth client check olunur
        $productID = $request->product;
        $existingCompareList = json_decode(request()->cookie('product_ids'), true);

        if ($existingCompareList === null) {
            $existingCompareList = [];
        }

        if (!in_array($productID, $existingCompareList)) {
            $existingCompareList[] = $productID;
            $compareListCookie     = cookie('product_ids', json_encode($existingCompareList), 86400);
            
            return redirect()->back()->withCookie($compareListCookie)->with([
                'message'=> __('message.success_add_compare'),
                'type'=> 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message'=> __('message.cant_add_compare'),
                'type'=> 'error',
            ]);
        }
    }

    public function removeCompare(Request $request){
        // Middleware-de auth client check olunur
        $productID = $request->product;
        $existingCompareList = json_decode(request()->cookie('product_ids'), true);

        if ($existingCompareList === null) {
            $existingCompareList = [];
        }

        if (($key = array_search($productID, $existingCompareList)) !== false) {
            unset($existingCompareList[$key]);
            $compareListCookie = cookie('product_ids', json_encode($existingCompareList), 86400);
            
            return redirect()->back()->withCookie($compareListCookie)->with([
                'message'=> __('message.success_remove_compare'),
                'type'=> 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message'=> __('message.cant_remove_compare'),
                'type'=> 'error',
            ]);
        }
    }

    public function compare(){
        if (request()->cookie() && request()->cookie('product_ids')) {
            $productIdsCookie = json_decode(request()->cookie('product_ids'), true);
        
            if (!empty($productIdsCookie)) {
                $compareProduct = new Product();
                $compareProductsQuery = $compareProduct->getCompareProductsWithPhotos($productIdsCookie);
                $products = $compareProductsQuery->paginate(8);
                
                return view('site.profile.compare', compact('products'));
            } else {
                return redirect()->route('products')->with([
                    'message' => __('message.add_product_to_compareList'),
                    'type'    => 'error',
                ]);
            }
        } else {
            return redirect()->route('products')->with([
                'message' => __('message.add_product_to_compareList'),
                'type'    => 'error',
            ]);
        }
    }

    public function updateProfile(Request $request){
        $rules = [
            // 'fullname' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'phone' => 'required|string|max:255',
        ];
        
        $messages = [
            'email.unique' => __('message.this_email_already_exists'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
    
        $validator->sometimes('password', ['required', 'string', 'min:8'], function ($input) {
            return !empty($input->password);
        });
        
        $validator->sometimes('password', ['nullable'], function ($input) {
            return empty($input->password);
        });
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Diğer güncellemeleri yapın
        $client = Client::where('id', auth()->guard('client')->id())->first();

        if (!is_null($client)) {
            $client->phone = $request->input('phone');
            
            if (!is_null($request->input('password'))) {
                $client->password = Hash::make($request->input('password'));
            }

            if($request->input('email') !== $client->email){
                $have_email = Client::where('email', $request->input('email'))->first();
            
                if(is_null($have_email)){
                    $client->email = $request->input('email');
                    $client->activation_token = Str::random(55);
                    $client->is_confirmed = 0; //deaktiv
                    $client->save();

                    Mail::send('site.mail.mail_change_activation', ['client' => $client], function (Message $message) use ($client) {
                        $message->to($client->email)
                                ->subject('Confirmation Email');
                    });

                    Auth::guard('client')->logout();

                    return redirect()->route('profile.login')->with([
                        'message' => __('message.Success_update_Please_confirm_your_email_address'),
                        'type'    => 'success',
                    ]);
                } else {
                    return redirect()->route('profile.login')->with([
                        'message' => __('message.this_email_used'),
                        'type'    => 'error',
                    ]);
                }
            } else{
                $client->save();

                return redirect()->back()->with([
                    'message'=> __('message.success_profile_update'),
                    'type'=> 'success',
                ]);
            }
        } else {
            return redirect()->route('profile.login')->with([
                'message' => __('message.system_error'),
                'type'    => 'error',
            ]);
        }
    }
    
    public function showOrders(){
        $clientID = Auth::guard('client')->id();
        $orders   = Order::where('client_id', $clientID)->get();
        return view('site.profile.orders', compact('orders'));
    }
    
    public function showOneOrder($orderID) {
        $order = Order::find($orderID);
        if(!empty($order)){
            return view('site.profile.order-details', compact('order'));
        } else {
            return redirect()->back()->with([
                'message'=> __('message.there_is_no_such_order'),
                'type'=> 'success',
            ]);
        }
    }
}