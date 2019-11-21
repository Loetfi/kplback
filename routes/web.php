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


Route::get('backup','BackupDatabaseController@index');



Route::group(['middleware' => ['checksessionlogin']], function () {

    Route::get('/berita','BeritaController@index')->name('berita');
    Route::get('/berita/add','BeritaController@add')->name('berita/add');
    Route::post('/berita/add','BeritaController@prosesadd')->name('berita/add');
    Route::get('/berita/detail/{id}','BeritaController@index');
    Route::get('/berita/edit/{id}','BeritaController@index');

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

    
    Route::get('dashboard','DashboardController@web');
    Route::get('/pesawat', function () {
        return view('travel/pesawat');
    })->name('pesawat');

    // api 
    Route::get('/travel/pesawat','PesawatController@list');
    Route::get('/travel/pesawat/detail/{id}','PesawatController@edit');
    Route::get('/travel/pesawat/approval/{id_order}/{id}','PesawatController@prosesedit');


    Route::get('/travel/hotel','HotelController@list');
    Route::get('/travel/hotel/detail/{id}','HotelController@edit');
    Route::get('/travel/hotel/approval/{id_order}/{id}','HotelController@prosesedit');


    Route::group(['prefix' => 'serbausaha'], function () {

        Route::get('/', function () {
            return view('serbausaha/listserbausaha')->with(array('title' => 'Serba Usaha'));
        })->name('serbausaha');

        // bus
        Route::get('/ruangmeeting','RuangMeetingController@list');
        Route::get('/ruangmeeting/detail/{id}','RuangMeetingController@edit');
        Route::get('/ruangmeeting/approval/{id_order}/{id}','RuangMeetingController@prosesedit'); 

        // konsumsi rapat 
        Route::get('/konsumsirapat','KonsumsiRapatController@list');
        Route::get('/konsumsirapat/detail/{id}','KonsumsiRapatController@edit');
        Route::get('/konsumsirapat/approval/{id_order}/{id}','KonsumsiRapatController@prosesedit'); 

    });


    Route::group(['prefix' => 'gedungtekno'], function () {

        Route::get('/', function () {
            $data = array(
                'title' => 'Serba Usaha', 
                'kategori' => 
                [['id' => 15, 'nama' => 'Meeting Room'],
                ['id' => 16, 'nama' => 'Talkshow'],
                ['id' => 17, 'nama' => 'Seminar'],
                ['id' => 18, 'nama' => 'Event'],
                ['id' => 19, 'nama' => 'Pameran'],
                ['id' => 20, 'nama' => 'Class Room'],
                ['id' => 21, 'nama' => 'Wedding Venue']]
            );
            return view('gedungtekno/listgedungtekno')->with($data);
        })->name('gedungtekno');

        // bus
        Route::get('/id_kat/{id}/{nama}','GedungTeknoController@list');
        Route::get('/detail/{id}/{id_kat}/{nama}','GedungTeknoController@edit');
        Route::get('/approval/{id_order}/{id}/{id_kat}/{nama}','GedungTeknoController@prosesedit'); 
    });

    Route::group(['prefix' => 'travel'], function () {
        // bus
        Route::get('/bus','BusController@list');
        Route::get('/bus/detail/{id}','BusController@edit');
        Route::get('/bus/approval/{id_order}/{id}','BusController@prosesedit');

        //shuttle
        Route::get('/shuttle','ShuttleBusController@list');
        Route::get('/shuttle/detail/{id}','ShuttleBusController@edit');
        Route::get('/shuttle/approval/{id_order}/{id}','ShuttleBusController@prosesedit');

        //kereta
        Route::get('/kereta','KeretaController@list');
        Route::get('/kereta/detail/{id}','KeretaController@edit');
        Route::get('/kereta/approval/{id_order}/{id}','KeretaController@prosesedit');

    });

    Route::group(['prefix' => 'topup'], function () {
        // bus
        Route::get('/', function () {
            return view('topup/order')->with(array('title' => 'Ticketing'));
        })->name('topup');

        // pulsa
        Route::get('/pulsa','PulsaController@list');
        Route::get('/pulsa/detail/{id}','PulsaController@edit');
        Route::get('/pulsa/approval/{id_order}/{id}','PulsaController@prosesedit');

        // paketdata
        Route::get('/paketdata','PaketDataController@list');
        Route::get('/paketdata/detail/{id}','PaketDataController@edit');
        Route::get('/paketdata/approval/{id_order}/{id}','PaketDataController@prosesedit');

        // tagihan listrik
        Route::get('/tagihanlistrik','TagihanListrikController@list');
        Route::get('/tagihanlistrik/detail/{id}','TagihanListrikController@edit');
        Route::get('/tagihanlistrik/approval/{id_order}/{id}','TagihanListrikController@prosesedit');

        // tagihan listrik
        Route::get('/tokenlistrik','TokenListrikController@list');
        Route::get('/tokenlistrik/detail/{id}','TokenListrikController@edit');
        Route::get('/tokenlistrik/approval/{id_order}/{id}','TokenListrikController@prosesedit');

    });

    // simpanan
    Route::group(['prefix' => 'simpanan'], function () {
        // simpanan
        Route::get('/','SimpananController@list')->name('simpanan');
        Route::get('/detail/{id}','SimpananController@edit');
        Route::get('/approval/{id_order}/{id}','SimpananController@prosesedit');
    });

    Route::group(['prefix' => 'pinjaman'], function () {
        // pinjaman
        Route::get('/','PinjamanController@list')->name('pinjaman');
        Route::get('/detail/{id}','PinjamanController@edit');
        Route::get('/approval/{id_order}/{id}','PinjamanController@prosesedit');

    });



    
    // travel
    Route::get('/travel','TravelController@index')->name('travel');

    Route::group(['prefix' => 'konfigurasi'], function () {
        // pinjaman
        Route::get('/angka-pertahun','KonfigurasiController@index')->name('konfigurasi');
        Route::post('/update','KonfigurasiController@update');
    });

});

Route::get('pengurus/dashboard/','DashboardController@index');





// Route::get('/', function () {
//     return view('auth/login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/chart', function () {
//     return view('chart');
// });

// berita



// promo
// Route::get('/promo', function () {

// })->name('promo');

// Route::get('/toko', function () {
//     return view('toko/toko');
// })->name('toko');


// Route::get('/order', function () {
//     return view('travel/order');
// });


// Route::post('promo','AuthController@login')->name('promo');



// promo 

