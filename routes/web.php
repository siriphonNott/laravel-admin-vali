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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/index', function () {
    return view('dashboard');
});

Route::get('/Member', function () {
    return view('member');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/about', function () {
	// $data['firstname'] = 'Siriphon';
	// $data['lastname']  = 'Panyathipo';
	$name = 'Siriphon';
    // return view('about')->with('name','Nott Dev');
    return view('about')->withNameDo('Hi');
});
