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

    Route::get('/createUser', 'UserController@createUser')->name('createUser')->middleware(['admin']);
    Route::post('/storeUser', 'UserController@storeUser')->name('storeUser')->middleware(['admin']);
    Route::get('/listingUsers', 'UserController@userListing')->name('userListing')->middleware(['admin']);
    Route::get('/showUser', 'UserController@showUser')->name('showUser')->middleware(['admin']);
    ///Route::get('/show/comun/user', 'UserController@listAllUserComun')->name('showComunUser')->middleware(['admin']);

    Route::get('/editUser/{id}', 'UserController@editUser')->name('editUser')->middleware(['admin']);
    Route::post('/updateUser', 'UserController@updateUser')->name('updateUser')->middleware(['admin']);
    Route::get('/destroyUser/{id}', 'UserController@destroy')->name('userDestroy')->middleware(['admin']);

    Route::get('/createEquipments', 'EquipmentsController@createEquipments')->name('createEquipments')->middleware(['admin']);
    Route::post('/storeEquipment', 'EquipmentsController@storeEquipment')->name('storeEquipment')->middleware(['admin']);
    Route::get('/listingEquipments', 'EquipmentsController@listingEquipments')->name('listingEquipments');
    Route::get('/destroyEquipment/{id}', 'EquipmentsController@destroyEquipments')->name('destroyEquipment')->middleware(['admin']);
    Route::get('/showEquipment', 'EquipmentsController@showEquipments')->name('showEquipment');

    Route::get('/editEquipment/{id}', 'EquipmentsController@editEquipment')->name('editEquipment')->middleware(['admin']);
    Route::post('/updateEquipment', 'EquipmentsController@updateEquipment')->name('updateEquipment')->middleware(['admin']);

    Route::get('/createSensor', 'SensorController@createSensor')->name('createSensor')->middleware(['admin']);
    Route::post('/storeSensor', 'SensorController@storeSensor')->name('storeSensor')->middleware(['admin']);
    Route::get('/listingSensors', 'SensorController@listingSensors')->name('listingSensors');
    Route::get('/destroySensor/{id}', 'SensorController@destroySensor')->name('destroySensor')->middleware(['admin']);
    Route::get('/showSensor', 'SensorController@showSensor')->name('showSensor');

    Route::get('/editSensor/{id}', 'SensorController@editSensor')->name('editSensor')->middleware(['admin']);
    Route::post('/updateSensor', 'SensorController@updateSensor')->name('updateSensor')->middleware(['admin']);

    Route::get('/readingReport', 'ReadController@readingReport')->name('readingReport');
    Route::post('/readingReport', 'ReadController@reading')->name('reading');
    Route::get('/read/list/sensors', 'ReadController@listSensors')->name('readListSensors');
    Route::get('/readingPDF', 'ReadController@readingPDF')->name('readingPDF');

    Route::get('/read/sensors/average', 'ReadController@sensorAverage')->name('sensorsAverage');

    Route::get('/metricas', 'MetricasController@index')->name('metricas')->middleware(['admin']);
});

///Auth::routes();
