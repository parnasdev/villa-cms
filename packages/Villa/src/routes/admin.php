<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
|
|
*/

$router->group(['namespace' => 'Admin' , 'prefix' => 'admin' , 'middleware' => 'auth:api'], function () use ($router) {
    $router->group(['prefix' => 'residences'] , function () use ($router) {
        $router->get('' , 'ResidenceController@index');
        $router->post('' , 'ResidenceController@store');
        $router->patch('/{id}/edit' , 'ResidenceController@update');
        $router->get('/{id}' , 'ResidenceController@show');
        $router->delete('/{id}' , 'ResidenceController@destroy');
    });
    $router->group(['prefix' => 'specifications'] , function () use ($router) {
        $router->get('' , 'SpecificationController@index');
        $router->post('' , 'SpecificationController@store');
        $router->patch('/{id}/edit' , 'SpecificationController@update');
        $router->get('/{id}' , 'SpecificationController@show');
        $router->delete('/{id}' , 'SpecificationController@destroy');
    });
});
