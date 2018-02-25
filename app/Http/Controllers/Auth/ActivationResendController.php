<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\Auth\UserRequestedActivationEmail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationResendController extends Controller
{
    public function showResendForm(){
        return view('auth.activate.resend');
    }
    
    public function resend(Request $request){
        
        $this->validateResendRequest($request);
        
        $user = User::byEmail($request->email)->first();
        
        //trigger activation event
        event(new UserRequestedActivationEmail($user));
        
        return redirect()->route('login')->withSuccess('Account activation email has been resent');
    }
    
    protected function validateResendRequest(Request $request){
        
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => "Could not find that account."
        ]);
    }
    
}
