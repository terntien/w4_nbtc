<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('laws', 'LawController');
Route::resource('towers', 'TowerController');
Route::resource('reports', 'ReportController');
Route::resource('problem', 'ProblemController');
Route::resource('networks', 'NetworkController');
Route::resource('licenses', 'LicenseController');
Route::resource('contacts', 'ContactController');
Route::resource('customers', 'CustomerController');

Auth::routes();


Route::get('towers/create', 'TowerController@selectCus'); 
Route::get('reports/create', 'ReportController@selectCus'); 
// Route::get('/home', 'TowerController@selectmarker'); 
Route::get('xml-marker', 'TowerController@xml'); //เรียกใช้ข้อมูล xml 

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('type', 'RroblemController@index');
// Route::get('home', 'TowerController@marker');
// Route::get('/mapdata', 'MapController@show');
// Route::get('marker','MapController@marker')->name('home');