<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('towers', 'TowerController');
Route::resource('problem', 'ProblemController');
Route::resource('reports', 'ReportController');
Route::resource('networks', 'NetworkController');
Route::resource('customers', 'CustomerController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('towers/create', 'TowerController@selectCus'); 
Route::get('reports/create', 'ReportController@selectCus'); 
Route::get('xml-marker', 'TowerController@xml'); //เรียกใช้ข้อมูล xml 





// Route::get('home', 'TowerController@marker');
// Route::get('/mapdata', 'MapController@show');
// Route::get('marker','MapController@marker')->name('home');
