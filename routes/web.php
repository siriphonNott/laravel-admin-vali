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
	$data['module'] = 'dashboard';
  return view('site.dashboard', $data);
});

Route::get('/index', function () {
	$data['module'] = 'dashboard';
    return view('site.dashboard', $data);
});

Route::get('/Member', function () {
	$data['module'] = 'member';
    return view('site.member', $data);
});



Route::get('/about', function () {
	// $data['firstname'] = 'Siriphon';
	// $data['lastname']  = 'Panyathipo';
	$name = 'Siriphon';
    // return view('about')->with('name','Nott Dev');
    return view('about')->withNameDo('Hi');
});
