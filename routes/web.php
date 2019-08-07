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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'web'], function(){
    //redirect to login
    // Route::auth();
    Auth::routes(['verify' => true, 'register' => false]);
});
Route::group(['middleware' => ['web','auth']], function(){
    //redirect to login
    Route::get('/home','HomeController@index');
    Route::get('/', function(){
        //Super Admin
        if(Auth::user()->level==0){
            return view('superadmin.home');
        //Perizinan
        }elseif(Auth::user()->level==1){
            return view('petugas_perizinan.home');
        //Perpajakan
        }elseif(Auth::user()->level==2){
            return view('petugas_perpajakan.home');
        //Akutansi
        }elseif(Auth::user()->level==3){
            return view('petugas_akutansi.home');
        //Pengguna Umum
        }elseif(Auth::user()->level==4){
            return view('pengguna_umum.home');
        }
    });
});


//Dokumen
Route::get('dokumen/index/', 'DokumenController@index');
Route::get('dokumen/create/', 'DokumenController@create');
Route::post('dokumen/simpan/', 'DokumenController@store');
Route::get('dokumen/detail/{id}', 'DokumenController@show');
Route::get('dokumen/edit/{id}', 'DokumenController@edit');
Route::post('dokumen/update/{id}', 'DokumenController@update');
Route::get('dokumen/hapus/{id}', 'DokumenController@destroy');

//Pengguna Umum
Route::get('pumum/index/', 'PenggunaUmumController@index');
Route::get('pumum/create/', 'PenggunaUmumController@create');
Route::post('pumum/simpan/', 'PenggunaUmumController@store');
Route::get('pumum/detail/{id}', 'PenggunaUmumController@show');
Route::get('pumum/edit/{id}', 'PenggunaUmumController@edit');
Route::post('pumum/update/{id}', 'PenggunaUmumController@update');
Route::get('pumum/hapus/{id}', 'PenggunaUmumController@destroy');

//Petugas
Route::get('petugas/index/', 'PetugasController@index');
Route::get('petugas/create/', 'PetugasController@create');
Route::post('petugas/simpan/', 'PetugasController@store');
Route::get('petugas/detail/{id}', 'PetugasController@show');
Route::get('petugas/edit/{id}', 'PetugasController@edit');
Route::post('petugas/update/{id}', 'PetugasController@update');
Route::get('petugas/hapus/{id}', 'PetugasController@destroy');