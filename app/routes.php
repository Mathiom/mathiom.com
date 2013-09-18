<?php

Route::controller('me', 'DashboardController', ['getIndex'=>'dashboard']);


//===============================================
// Welcome & Confirmation
//===============================================
Route::get('welcome', ['as'=>'welcome', function(){return View::make('pages.welcome');}]);
Route::controller('confirm', 'ConfirmationController', [
    'getIndex'  => 'confirmation-message',
    'postIndex' => 'confirmation-attempt'
]);


//===============================================
// Home, Login, Logout
//===============================================
Route::get('logout', ['as'=>'logout', function(){
    Auth::logout();
    return Redirect::route('home')->withErrors(['header'=>'You are now logged out.']);
}]);
Route::get('login', function(){
    return Redirect::to('/#login');
});
Route::controller('/', 'HomeController', [
    'getIndex'=>'home',
    'postIndex'=>'login'
]);