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
    Route::get('/delete', 'UserController@delete')->name('delete');
    Route::get('/deleteUser', 'UserController@deleteUser')->name('deleteUser');
});

Auth::routes();
<<<<<<< HEAD
=======

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/teste/teste', function () {
    return 'teste....';
});

Route::get('/sensor/{modelo}/{valor}', function (){
    return 'asdfadsfas';
});
>>>>>>> 467410710f1aa515648cbed6ff01e66d205ec717
