<?php
Route::get('/', function () {
    return view('introduction');
})->name('index');

$this->group(['middleware' => ['auth'], 'prefix' => 'home'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile', 'UserController@profileUpdate')->name('profileUpdate');
    Route::get('/settings', 'UserController@settings')->name('settings');
    Route::post('/settings', 'UserController@settingsUpdate')->name('settingsUpdate');
    Route::get('/deactivate', 'UserController@deactivateUser')->name('deactivateUser');

    Route::get('/createUser', 'UserController@createUser')->name('createUser');
    Route::get('/userListing', 'UserController@userListing')->name('userListing');

    Route::get('/createEquipments', 'EquipmentsController@createEquipments')->name('createEquipments');
    Route::get('/listingEquipments', 'EquipmentsController@listingEquipments')->name('listingEquipments');
    Route::get('/destroyEquipments', 'EquipmentsController@destroyEquipments')->name('destroyEquipments');
    Route::get('/showEquipments', 'EquipmentsController@showEquipments')->name('showEquipments');
});

Auth::routes();
