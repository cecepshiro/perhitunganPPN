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
            return view('petugas.petugas_perizinan.home');
        //Perpajakan
        }elseif(Auth::user()->level==2){
            return view('petugas.petugas_perpajakan.home');
        //Akutansi
        }elseif(Auth::user()->level==3){
            return view('petugas.petugas_akutansi.home');
        //Pengguna Umum
        }elseif(Auth::user()->level==4){
            return view('pengguna_umum.home');
        }
    });
});


//Pengaju Controller
Route::get('pengaju/index/', 'PengajuController@index');
// Route::get('pengaju/indexWaiting/', 'PengajuController@indexWaiting');
// Route::get('pengaju/indexRevisi/', 'PengajuController@indexRevisi');
Route::get('pengaju/create/', 'PengajuController@create');
Route::post('pengaju/simpan/', 'PengajuController@store');
Route::get('pengaju/detail/{id}', 'PengajuController@show');
Route::get('pengaju/edit/{id}', 'PengajuController@edit');
Route::post('pengaju/update/{id}', 'PengajuController@update');
Route::get('pengaju/hapus/{id}', 'PengajuController@destroy');
Route::get('pengaju/createAccount/{id}', 'PengajuController@createAccount');
Route::get('pengaju/feedbackRevisi/{id}', 'PengajuController@feedbackRevisi');
Route::post('pengaju/storeAccount/', 'PengajuController@storeAccount');
Route::get('pengaju/downloadIzinUsaha/{id}', 'PengajuController@downloadIzinUsaha');
Route::get('pengaju/tracking/', 'PengajuController@tracking');
Route::post('pengaju/cekTracking/', 'PengajuController@cekTracking');
Route::get('pengaju/updateTracking/{id}', 'PengajuController@updateTracking');
Route::post('pengaju/saveRevisi/', 'PengajuController@saveRevisi');

//Pengguna Umum Controller
Route::get('pumum/index/', 'PenggunaUmumController@index');
Route::get('pumum/create/{id}', 'PenggunaUmumController@create');
Route::post('pumum/simpan/', 'PenggunaUmumController@store');
Route::get('pumum/detail/{id}', 'PenggunaUmumController@show');
Route::get('pumum/edit/{id}', 'PenggunaUmumController@edit');
Route::post('pumum/update/{id}', 'PenggunaUmumController@update');
Route::get('pumum/hapus/{id}', 'PenggunaUmumController@destroy');
Route::get('pumum/listProfil/{id}', 'PenggunaUmumController@listProfil');

//Petugas
Route::get('petugas/index/', 'PetugasController@index');
Route::get('petugas/create/', 'PetugasController@create');
Route::post('petugas/simpan/', 'PetugasController@store');
Route::get('petugas/detail/{id}', 'PetugasController@show');
Route::get('petugas/edit/{id}', 'PetugasController@edit');
Route::post('petugas/update/{id}', 'PetugasController@update');
Route::get('petugas/hapus/{id}', 'PetugasController@destroy');

//Jenis Pajak
Route::get('jenispajak/index/', 'JenisPajakController@index');
Route::get('jenispajak/create/', 'JenisPajakController@create');
Route::post('jenispajak/simpan/', 'JenisPajakController@store');
Route::get('jenispajak/detail/{id}', 'JenisPajakController@show');
Route::get('jenispajak/edit/{id}', 'JenisPajakController@edit');
Route::post('jenispajak/update/{id}', 'JenisPajakController@update');
Route::get('jenispajak/hapus/{id}', 'JenisPajakController@destroy');

//Dokumen
Route::get('dokumen/index/', 'DokumenController@index');
Route::get('dokumen/create/{id}', 'DokumenController@create');
Route::post('dokumen/simpan/', 'DokumenController@store');
Route::get('dokumen/detail/{id}', 'DokumenController@show');
Route::get('dokumen/edit/{id}', 'DokumenController@edit');
Route::post('dokumen/update/{id}', 'DokumenController@update');
Route::get('dokumen/hapus/{id}', 'DokumenController@destroy');
Route::get('dokumen/listDokumen/{id}', 'DokumenController@listDokumen');
Route::get('dokumen/listDokumenPerizinan/{id}', 'DokumenController@listDokumenPerizinan');
Route::get('dokumen/downloadDokumen/{id}', 'DokumenController@downloadDokumen');
Route::get('dokumen/revisiDokumen/{id}', 'DokumenController@revisiDokumen');
Route::get('dokumen/revisiDokumenKembali/{id}', 'DokumenController@revisiDokumenKembali');
Route::get('dokumen/acceptDokumen/{id}', 'DokumenController@acceptDokumen');
Route::get('dokumen/logDokumen/{id}', 'DokumenController@logDokumen');

//Pajak
Route::get('pajak/listPajak/{id}', 'PajakController@listPajak');
Route::get('pajak/index', 'PajakController@index');
Route::get('pajak/create/{id}', 'PajakController@create');
Route::post('pajak/simpan/', 'PajakController@store');
Route::get('pajak/detail/{id}', 'PajakController@show');
Route::get('pajak/edit/{id}', 'PajakController@edit');
Route::post('pajak/update/{id}', 'PajakController@update');
Route::get('pajak/hapus/{id}', 'PajakController@destroy');
Route::get('pajak/konfirmasiBesaran/{id}', 'PajakController@konfirmasiBesaran');
Route::post('pajak/uploadBukti/{id}', 'PajakController@uploadBukti');
Route::post('pajak/saveBesaran/{id}', 'PajakController@saveBesaran');
Route::get('pajak/formUploadBukti/{id}', 'PajakController@formUploadBukti');
Route::get('pajak/formKonfirmasiBukti/{id}', 'PajakController@formKonfirmasiBukti');
Route::get('pajak/downloadBuktiBayar/{id}', 'PajakController@downloadBuktiBayar');
Route::post('pajak/konfirmasiBukti/{id}', 'PajakController@konfirmasiBukti');
Route::post('pajak/inputOmset/{id}', 'PajakController@inputOmset');
Route::get('pajak/formInputOmset/{id}', 'PajakController@formInputOmset');
Route::get('pajak/listTunggakanPajak/{id}', 'PajakController@listTunggakanPajak');
Route::get('pajak/sendNotifTunggakan/{id}', 'PajakController@sendNotifTunggakan');

//Usaha
Route::get('usaha/index/', 'UsahaController@index');
Route::get('usaha/create/', 'UsahaController@create');
Route::post('usaha/simpan/', 'UsahaController@store');
Route::get('usaha/detail/{id}', 'UsahaController@show');
Route::get('usaha/edit/{id}', 'UsahaController@edit');
Route::post('usaha/update/{id}', 'UsahaController@update');
Route::get('usaha/hapus/{id}', 'UsahaController@destroy');
Route::get('usaha/listUsaha/{id}', 'UsahaController@listUsaha');

//Push Email
// Route::get('pengajuan/sendemail','PengajuController@mail');

// Route::get('pajak/tes','PajakController@tesBulan');