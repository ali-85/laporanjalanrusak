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
Route::get('/',[
    'uses' => "UserController@index",
    'as' => 'index'
]);
Route::get('/findDesa','UserController@findDesa')->name('findDesa');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[
        'uses' => "UserController@getLogin",
        'as' => 'login'
    ]);
    Route::post('/postlogin',[
        'uses' => "UserController@postLogin",
        'as' => 'postLogin'
    ]);
    Route::get('/signup',[
        'uses' => "UserController@getSignup",
        'as' => 'signup'
    ]);
    Route::post('/postsignup',[
        'uses' => 'UserController@postSignup',
        'as' => 'postSignup'
    ]);
});

Route::group(['middleware' => 'auth'],function(){
    Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);
    Route::get('/riwayat',[
        'uses' => 'UserController@getLaporan',
        'as' => 'list.laporan'
    ]);
    Route::get('/riwayat/{id}',[
        'uses' => 'UserController@getAlasan',
        'as' => 'laporan.detail'
    ]);
    Route::post('/postlaporan',[
        'uses' => 'UserController@postLapor',
        'as' => 'postLaporan'
    ]);
    Route::get('/laporan/user/{id}',[
        'uses' => 'UserController@getDetail',
        'as' => 'user.detail'
    ]);
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/dashboard',[
        'uses' => 'AdminController@index',
        'as' => 'admin.index'
    ]);
    Route::get('/laporan',[
        'uses' => 'AdminController@getLaporan',
        'as' => 'admin.laporan'
    ]);
    Route::post('/laporan/{id}',[
        'uses' => 'AdminController@storeData',
        'as' => 'admin.pushtoproses'
    ]);
    Route::post('/laporan/tolak/{id}',[
        'uses' => 'AdminController@storeTolak',
        'as' => 'laporan.tolak'
    ]);
    Route::post('/laporan/selesai/{id}',[
        'uses' => 'AdminController@storeLapor',
        'as' => 'laporan.selesai'
    ]);
    Route::get('/laporan/detail/{id}',[
        'uses' => 'AdminController@getDetail',
        'as' => 'admin.detail'
    ]);
    Route::get('/laporan/proses',[
        'uses' => 'AdminController@getProses',
        'as' => 'admin.proses'
    ]);
    Route::get('/laporan/selesai',[
        'uses' => 'AdminController@getSelesai',
        'as' => 'admin.selesai'
    ]);
    Route::get('/laporan/ditolak',[
        'uses' => 'AdminController@getTolak',
        'as' => 'admin.tolak'
    ]);
    Route::post('/laporan/batal/{id}',[
        'uses' => 'AdminController@batalTolak',
        'as' => 'batal.tolak'
    ]);
    Route::get('/laporan/semua',[
        'uses' => 'AdminController@getSemua',
        'as' => 'admin.semua'
    ]);
    Route::get('/pengguna',[
        'uses' => 'AdminController@getUser',
        'as' => 'admin.user'
    ]);
    Route::post('/pengguna/tambah',[
        'uses' => 'AdminController@tambahUser',
        'as' => 'tambah.user'
    ]);
    Route::get('/pengguna/edit',[
        'uses' => 'AdminController@editUser',
        'as' => 'edit.user'
    ]);
    Route::put('/pengguna/ubah/{id}',[
        'uses' => 'AdminController@ubahUser',
        'as' => 'ubah.user'
    ]);
    Route::get('/pengguna/delete/{id}',[
        'uses' => 'AdminController@userDelete',
        'as' => 'user.delete'
    ]);
    Route::get('/desa',[
        'uses' => 'AdminController@getDesa',
        'as' => 'admin.desa'
    ]);
    Route::post('/desa/store',[
        'uses' => 'AdminController@storeDesa',
        'as' => 'admin.postdesa'
    ]);
    Route::get('/desa/edit',[
        'uses' => 'AdminController@editDesa',
        'as' => 'edit.desa'
    ]);
    Route::put('/desa/update/{id}',[
        'uses' => 'AdminController@updateDesa',
        'as' => 'update.desa'
    ]);
    Route::get('/desa/hapus/{id}',[
        'uses' => 'AdminController@hapusDesa',
        'as' => 'hapus.desa'
    ]);
    Route::get('/desa/page', 'AdminController@fetch_desa');
    Route::get('/desa/search', 'AdminController@searchDesa')->name('search.desa');
    Route::get('/kecamatan',[
        'uses' => 'AdminController@getKcmtn',
        'as' => 'admin.kcmtn'
    ]);
    Route::post('/kecamatan/store',[
        'uses' => 'AdminController@storeCamat',
        'as' => 'admin.postcamat'
    ]);
    Route::get('/kecamatan/edit',[
        'uses' => 'AdminController@editKcmtn',
        'as' => 'edit.kecamatan'
    ]);
    Route::put('/kecamatan/update/{id}',[
        'uses' => 'AdminController@updateKcmtn',
        'as' => 'update.kcmtn'
    ]);
    Route::get('/kecamatan/hapus/{id}',[
        'uses' => 'AdminController@hapusKcmtn',
        'as' => 'delete.kcmtn'
    ]);
});
