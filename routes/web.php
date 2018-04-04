<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (\Illuminate\Http\Request $request) {
    //$user = $request->user();
    //$user->updatePermission('delete posts');
    return view('welcome');
    
});

Auth::routes();

Route::get('/auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');

Route::get('/auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('/auth/activate/resend', 'Auth\ActivationResendController@resend');

Route::get('/password/change', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.change');
Route::post('/password/change', 'Auth\ChangePasswordController@change');

Route::get('/dashboard', 'Profile\DashboardController@dashboard')->name('dashboard');

Route::get('/profile/edit', 'Profile\ProfileEditController@showEditForm')->name('profile.edit');
Route::post('/profile/edit', 'Profile\ProfileEditController@edit');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/admin', function() {
    return 'Admin panel';
});
});

