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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/divisi','DivisiController@index');
Route::get('/divisi/create','DivisiController@vcreate');
Route::post('/divisi/create','DivisiController@create');
Route::get('/divisi/delete/{id}','DivisiController@delete');
Route::get('/divisi/edit/{id}','DivisiController@vedit');
Route::post('/divisi/edit/{id}','DivisiController@edit');

Route::get('/jabatan','JabatanController@index');
Route::get('/jabatan/create','JabatanController@vcreate');
Route::post('/jabatan/create','JabatanController@create');
Route::get('/jabatan/delete/{id}','JabatanController@delete');
Route::get('/jabatan/edit/{id}','JabatanController@vedit');
Route::post('/jabatan/edit/{id}','JabatanController@edit');

Route::get('/potongan','PotonganController@index');
Route::get('/potongan/create','PotonganController@vcreate');
Route::post('/potongan/create','PotonganController@create');
Route::get('/potongan/delete/{id}','PotonganController@delete');
Route::get('/potongan/edit/{id}','PotonganController@vedit');
Route::post('/potongan/edit/{id}','PotonganController@edit');