<?php
Route::get('/', function () {
    return view('introduction');
})->name('index');

Route::get('/read', 'ReadController@read')->name('read');

Route::get('/login', 'LoginController@index')->name('index');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@getLogout')->name('logout');

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
    Route::get('/showUser', 'UserController@showUser')->name('showUser');

    Route::get('/editUser/{id}', 'UserController@editUser')->name('editUser');
    Route::post('/updateUser', 'UserController@updateUser')->name('updateUser');
    Route::get('/destroyUser/{id}', 'UserController@destroy')->name('userDestroy');

    Route::get('/createEquipments', 'EquipmentsController@createEquipments')->name('createEquipments');
    Route::post('/storeEquipment', 'EquipmentsController@storeEquipment')->name('storeEquipment');
    Route::get('/listingEquipments', 'EquipmentsController@listingEquipments')->name('listingEquipments');
    Route::get('/destroyEquipment/{id}', 'EquipmentsController@destroyEquipments')->name('destroyEquipment');    
    Route::get('/showEquipment', 'EquipmentsController@showEquipments')->name('showEquipment');

    Route::get('/editEquipment/{id}', 'EquipmentsController@editEquipment')->name('editEquipment');
    Route::post('/updateEquipment', 'EquipmentsController@updateEquipment')->name('updateEquipment');

    Route::get('/createSensor', 'SensorController@createSensor')->name('createSensor');
    Route::post('/storeSensor', 'SensorController@storeSensor')->name('storeSensor');
    Route::get('/listingSensors', 'SensorController@listingSensors')->name('listingSensors');
    Route::get('/destroySensor/{id}', 'SensorController@destroySensor')->name('destroySensor');
    Route::get('/showSensor/{id}', 'SensorController@showSensor')->name('showSensor');
    Route::get('/editSensor/{id}', 'SensorController@editSensor')->name('editSensor');
    Route::post('/updateSensor', 'SensorController@updateSensor')->name('updateSensor');
});

///Auth::routes();
