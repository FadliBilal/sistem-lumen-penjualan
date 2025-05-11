<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

$router->post('/login', 'AuthController@login');

$router->group(['prefix' => 'penjualan', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'PenjualanController@index');
    $router->get('/{id}', 'PenjualanController@show');
    $router->post('/', 'PenjualanController@store');
    $router->put('/{id}', 'PenjualanController@update');
    $router->delete('/{id}', 'PenjualanController@destroy');
    $router->post('/{id}/bayar', 'PenjualanController@bayar');
    $router->get('/{id}/send-email', 'PenjualanController@sendEmail');
});
