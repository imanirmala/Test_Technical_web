<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('linkCoba', function () {
//     return view('foldercoba.coba');
// });

// Route::get('/', function () {
//     return view('layouts.layout');
// });


 // Route::get('linkCoba2','siswaController@index');
// //Route::resource('linkCoba2','siswaController

 // Route::get('linkTest','testsController@index');
 // Route::get('tambah','testsController@create');
 // Route::post('storeData','testsController@store');

 // Route::get('edit/{x}','testsController@edit');
 // Route::post('/updateData/{y}','testsController@update');

 // Route::get('hapus/{z}','testsController@destroy');



Route::get('/', function () {
    return view('layouts.layout');
});

Route::resource('jenis','JenisBarangController');
Route::resource('jurusan','jurusanController');




// Route::resource('karyawan','karyawanController');














