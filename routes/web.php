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

Route::get('login','AuthController@login')->name('login');
// Route::get('login','Auth\LoginController@index');
Route::get('/', function () {
    return redirect('login');
});

Route::post('login','AuthController@proses')->name('login');
Route::get('logout','AuthController@logout');

Route::get('pengurus/dashboard/','DashboardController@index');

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/chart', function () {
    return view('chart');
});

// berita
Route::get('/berita','BeritaController@index')->name('berita');


// promo
// Route::get('/promo', function () {
    
// })->name('promo');
Route::get('/promo','PromoController@index')->name('promo');
Route::get('/promo/add','PromoController@add');
Route::get('/promo/edit/{id}','PromoController@edit');
Route::get('/promo/delete/{id}','PromoController@delete');
Route::post('/promo/edit/{id}','PromoController@prosesedit');
Route::post('/promo/add','PromoController@prosesadd');
// end promo


Route::get('/toko','TokoController@index')->name('toko');
Route::get('/toko/detail/{id}','TokoController@edit');
Route::get('/toko/approval/{id_order}/{id}','TokoController@prosesedit');
// Route::get('/toko', function () {
//     return view('toko/toko');
// })->name('toko');

Route::get('/pesawat', function () {
    return view('travel/pesawat');
})->name('pesawat');

Route::get('/topup', function () {
    return 'oke';
})->name('topup');

// travel
Route::get('/travel','TravelController@index')->name('travel');
// Route::get('/order', function () {
//     return view('travel/order');
// });


// Route::post('promo','AuthController@login')->name('promo');

// api 
Route::get('/travel/pesawat','PesawatController@list');

// promo 

