<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

// API Routes
Route::group([
    'prefix'     => 'admin/api',
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin\Api',
], function () {
    Route::get('offer', 'OffersController@index');
    Route::get('offer/{id}', 'OffersController@show');
});

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('offer', 'OfferCrudController');
    CRUD::resource('service', 'ServiceCrudController');
    CRUD::resource('customer', 'CustomerCrudController');
    CRUD::resource('contract', 'ContractCrudController');
}); // this should be the absolute last line of this file