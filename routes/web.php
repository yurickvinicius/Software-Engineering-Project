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
});

Auth::routes();
