<?php
Route::get('/', function () {
    return view('introduction');
})->name('index');

Route::get('/read', 'ReadController@read')->name('read');

$this->group(['middleware' => ['auth'], 'prefix' => 'home'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile', 'UserController@profileUpdate')->name('profileUpdate');
    Route::get('/settings', 'UserController@settings')->name('settings');
    Route::post('/settings', 'UserController@settingsUpdate')->name('settingsUpdate');
    Route::get('/deactivate', 'UserController@deactivateUser')->name('deactivateUser');

    Route::get('/createUser', 'UserController@createUser')->name('createUser');
    Route::post('/storeUser', 'UserController@storeUser')->name('storeUser');
    Route::get('/listingUsers', 'UserController@userListing')->name('userListing');

    Route::get('/createEquipments', 'EquipmentsController@createEquipments')->name('createEquipments');
    Route::get('/listingEquipments', 'EquipmentsController@listingEquipments')->name('listingEquipments');
    Route::get('/destroyEquipments/{id}', 'EquipmentsController@destroyEquipments')->name('destroyEquipments');
    Route::get('/showEquipments', 'EquipmentsController@showEquipments')->name('showEquipments');
    Route::post('/storeEquipment', 'EquipmentsController@storeEquipment')->name('storeEquipment');
    Route::post('/editEquipment', 'EquipmentsController@editEquipment')->name('editEquipment');

    Route::get('/createSensor', 'SensorController@createSensor')->name('createSensor');
    Route::get('/listingSensors', 'SensorController@listingSensors')->name('listingSensors');
    Route::get('/destroySensor/{id}', 'SensorController@destroySensor')->name('destroySensor');
    Route::post('/storeSensor', 'SensorController@storeSensor')->name('storeSensor');
});

Auth::routes();
