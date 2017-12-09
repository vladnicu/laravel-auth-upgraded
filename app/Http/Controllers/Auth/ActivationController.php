<?php

namespace Cook\Http\Controllers\Auth;

use Auth;
use Cook\Models\User;
use Illuminate\Http\Request;
use Cook\Http\Controllers\Controller;

class ActivationController extends Controller
{
    public function activate(Request $request){
        $user = User::byActivationColumns($request->email, $request->token)->firstOrFail();
        
        $user->update([
            'active' => true,
            'activation_token' => null
        ]);
        
        Auth::loginUsingId($user->id);
        
        return redirect()->route('home')->withSuccess('Activated! You\'re now signed in.');
    }
}
