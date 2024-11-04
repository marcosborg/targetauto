<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Brand
    Route::post('brands/media', 'BrandApiController@storeMedia')->name('brands.storeMedia');
    Route::apiResource('brands', 'BrandApiController');

    // Car Model
    Route::apiResource('car-models', 'CarModelApiController');

    // Year
    Route::apiResource('years', 'YearApiController');

    // Fuel
    Route::apiResource('fuels', 'FuelApiController');

    // Transmission
    Route::apiResource('transmissions', 'TransmissionApiController');

    // Vehicle
    Route::post('vehicles/media', 'VehicleApiController@storeMedia')->name('vehicles.storeMedia');
    Route::apiResource('vehicles', 'VehicleApiController');

    // Contact
    Route::apiResource('contacts', 'ContactApiController');
});
