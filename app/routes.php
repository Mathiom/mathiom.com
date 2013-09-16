<?php

Route::controller('me', 'DashboardController', ['getIndex'=>'dashboard']);

Route::controller('/', 'HomeController', [
    'getIndex'=>'home',
    'postIndex'=>'login'
]);