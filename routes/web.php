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


//Pengaju Controller
Route::get('pengaju/index/', 'PengajuController@index');
Route::get('pengaju/create/', 'PengajuController@create');
Route::post('pengaju/simpan/', 'PengajuController@store');
Route::get('pengaju/detail/{id}', 'PengajuController@show');
Route::get('pengaju/edit/{id}', 'PengajuController@edit');
Route::post('pengaju/update/{id}', 'PengajuController@update');
Route::get('pengaju/hapus/{id}', 'PengajuController@destroy');

//Pengguna Umum Controller
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


//Push Email

Route::get('pengajuan/sendemail','PengajuController@mail');