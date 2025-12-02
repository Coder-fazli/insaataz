<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ForgetPasswordController extends Controller
{

    public function showForgetPasswordForm(){
        return view('auth.forget_password');
    }

    public function forgetPasswordSubmit(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
        ]);
        
        $sendTo         = $request->email;
        
        if(Client::where('email', $request->email)->first()){
            $randomPassword = Str::random(6); // 6 karakterlik rastgele bir şifre oluşturur
            $message        = __('mail.forget_password_message')." ".$randomPassword; //"Şifrənizi təsdiq etmək üçün lazım olan kod: ".$randomPassword
    
            // Şimdi Session sınıfını kullanabilirsiniz
            Session::put('randomPassword', $randomPassword);
            Session::put('choosenMail', $sendTo);
            
            // Sadece metin mesajı gönder
            Mail::raw($message, function ($message) use ($sendTo) {
                $message->to($sendTo)
                        ->subject('Şifrə Təsdiqi');
            });
            
            return redirect()->route('profile.confirm_password');
        } else{
            return redirect()->route('profile.register')->with([
                'message'=> __('forget_password.you_dont_have_an_account_registered_with_this_email'),
                'type'=> 'error'
            ]);
        }
    }
    
    public function confirmPassword(){
        return view('auth.confirm_password');
    }
    
    public function confirmPasswordSubmit(Request $request){
        $this->validate($request, [
            'password' => 'required|min:6'
        ]);
        
        if(Session::get('randomPassword') == $request->password) {
            return redirect()->route('profile.change_password');
        } else {
            return redirect()->route('profile.confirm_password')->with([
                'message'=> __('confirm_password.wrong_confirm_password'),
                'type'=> 'error'
            ]);
        }
    }
    
    public function changePassword(){
        return view('auth.change_password');
    }
    
    public function changePasswordSubmit(Request $request){
        $this->validate($request, [
            'password' => 'required|min:6',
            'repassword' => 'required|min:6'
        ]);
        
        if($request->password === $request->repassword) {
            $newPassword  = Hash::make($request->password);
            $choosenEmail = Session::get('choosenMail');
            
            $updated = Client::where('email', $choosenEmail)->update(['password' => $newPassword]);

            if ($updated) {
                Session::forget('randomPassword');
                Session::forget('choosenMail');

                return redirect()->route('profile.login')->with([
                    'message' => __('changed_password.password_updated'),
                    'type' => 'success',
                ]);
            } else {
                return redirect()->route('profile.change_password')->with([
                    'message' => __('changed_password.password_not_updated'),
                    'type' => 'error',
                ]);
            }
        } else {
            return redirect()->route('profile.change_password')->with([
                'message'=> __('changed_password.password_not_the_same'),
                'type'=> 'error'
            ]);
        }
    }
    
}