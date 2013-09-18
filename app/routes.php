<?php

Route::controller('me', 'DashboardController', ['getIndex'=>'dashboard']);


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