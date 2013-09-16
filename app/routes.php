<?php

Route::controller('me', 'DashboardController', ['getIndex'=>'dashboard']);

Route::get('/', ['as'=>'home', function(){ return View::make('pages.home'); } ]);
Route::post('/', ['before'=>'csrf', function(){ return Redirect::route('home')->withInput(Input::except('password')); } ]);