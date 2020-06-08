<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/produto', 'ControladorProduto@index')->name('produto');
    Route::get('/novo-produto', 'ControladorProduto@create')->name('novo-produto');
    Route::post('/cadastrar-produto', 'ControladorProduto@store')->name('cadastrar-produto');
    Route::get('/produto/apagar/{id}', 'ControladorProduto@destroy')->name('produto-apagar');
    Route::get('/produto/editar/{id}', 'ControladorProduto@edit')->name('produto-editar');
    Route::post('/produto/{id}', 'ControladorProduto@update')->name('alterar-produto');

    Route::get('/categoria', 'ControladorCategoria@index')->name('categoria');
    Route::get('/nova-categoria', 'ControladorCategoria@create')->name('nova-categoria');
    Route::post('/cadastrar-categoria', 'ControladorCategoria@store')->name('cadastrar-categoria');
    Route::get('/categoria/apagar/{id}', 'ControladorCategoria@destroy')->name('categoria-apagar');
    Route::get('/categoria/editar/{id}', 'ControladorCategoria@edit')->name('categoria-editar');
    Route::post('/categoria/{id}', 'ControladorCategoria@update')->name('categoria-alterar');
    Route::get('/categoria/listar/{id}', 'ControladorCategoria@list')->name('categoria-listar');
});