<?php
Route::get('/', function() {
    return redirect('login');
});



Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::prefix('dashboard')->group(function() { 
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
    Route::get('account/add', function() { 
        return view('admin.admin-created');
    })->middleware('auth:admin')->name('admin.created.form');
    Route::post('account/created', 'Auth\AdminController@create')->name('admin.created'); //create
    Route::delete('account/delete/{admin}', 'Auth\AdminController@delete')->name('admin.delete'); //delete
    Route::get('account/show/{admin}', 'Auth\AdminController@show')->name('admin.show'); //show
    Route::patch('account/edit/{admin}', 'Auth\AdminController@edit')->name('admin.edit'); //edit, patch
});


Route::get('datatables/anydata', 'DatatablesController@anyData')->name('datatables.data');

Route::get('login/google', 'Auth\AdminLoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\AdminLoginController@handleProviderCallback');
