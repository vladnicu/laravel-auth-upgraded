<?php

namespace Cook\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Cook\Http\Controllers\Controller;

class DashboardController extends Controller
{
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('profile.dashboard');
    }
}
