<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/categoria/listar', 'ControladorCategoria@list')->name('categoria-listar');
