<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Rules\MatchCurrentPassword;

use App\Events\Auth\UserChangedPassword;

class ChangePasswordController extends Controller
{
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/password/change';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }
    
    
    public function change(Request $request){
        $this->validateRequest($request);
        
        //trigger activation event
        event(new UserChangedPassword(Auth::user()));
        
        Auth::user()->update([
            'password' => bcrypt($request->password_new),
        ]);
        
        return redirect()->route('password.change')->withSuccess('Success');
        
    }
    
    protected function validateRequest(Request $request){
        
        $this->validate($request, [
            'password' => ['required', new MatchCurrentPassword],
            'password_new' => 'required|string|min:6|confirmed' 
        ]);
    }

}
