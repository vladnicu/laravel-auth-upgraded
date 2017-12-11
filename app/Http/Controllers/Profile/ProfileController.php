<?php

namespace Cook\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Cook\Http\Controllers\Controller;

class ProfileController extends Controller
{
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('profile.profile');
    }
}
