<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

	Route::resource('marcas', 'CamionesMarcasController');

    Route::resource('camiones', 'CamionesController');
    
    Route::resource('tarifas', 'TarifasController');

    Route::resource('empresas', 'EmpresasController');
    Route::post('/boletas/completar', 'BoletasController@completar')->name('boletas.completar');
    Route::get('/boletas/{id}/detalle', 'BoletasController@detalle');

    Route::resource('boletas', 'BoletasController');

    Route::resource('conductores', 'ConductorController');
    
});
