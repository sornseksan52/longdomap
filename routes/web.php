<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::any('/ters', function () {
    echo'0';
});

Route::get('user/{id}', 'UserController@show');
Route::get('/pdf', 'Auth\PdfController@createPDF');

// Route::prefix('login')->group(function () {
//     Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
//     Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');
// });

Route::any('/home', 'TestController@index');
Route::any('/verifydata', 'TestController@getVerifydata');

Route::any('/auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::any('/auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/login/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('/login/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('send-mail/{provider}', function ($mail) {

    $details = [
        'title' => 'Mail from Motofixx Developper',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to($mail)->send(new \App\Mail\SendMail($details));

    dd("Email is Sent.");
});


Route::get('/date', function () {
    return view('date');
});
