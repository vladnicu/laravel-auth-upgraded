<?php

namespace Cook\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Cook\Http\Controllers\Controller;
use Cook\Models\User;

class ProfileEditController extends Controller
{

    
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
    public function showEditForm()
    {
        return view('profile.edit');
    }
    
    
    public function edit(Request $request){
        
        $this->validateEditRequest($request);
        
        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        
        return redirect()->route('profile.edit')->withSuccess('Success');
    }
    
    
    protected function validateEditRequest(Request $request){
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }
}
