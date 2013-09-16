<?php

Route::controller('me', 'DashboardController');

Route::get('/', function(){ return View::make('pages.home'); });