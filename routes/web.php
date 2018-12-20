<?php

Route::get('/', ['as' => 'index', 'uses' => 'AdminController@getIndex']);
Route::get('/registration/{event_number}', ['as' => 'registration', 'uses' => 'AdminController@getRegistration']);
Route::post('/event-registration', ['as' => 'save_registration', 'uses' => 'AdminController@saveRegistration']);

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', ['as' => 'login', 'uses' => 'AdminController@getLogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'AdminController@postLogin']);
});
Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AdminController@getLogout']);
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@getDashboard']);
    Route::get('/view-event-{id}', ['as' => 'view_event', 'uses' => 'AdminController@viewEvent']);
    Route::get('/manage-event', ['as' => 'manage_event', 'uses' => 'AdminController@getEvent']);
    Route::get('/add-event', ['as' => 'add_event', 'uses' => 'AdminController@addEvent']);
    Route::post('/add-event', ['as' => 'save_event', 'uses' => 'AdminController@saveEvent']);
});



Route::get('create', function() {
    echo bcrypt('admin');
});
