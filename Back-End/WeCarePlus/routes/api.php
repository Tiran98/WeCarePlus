<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register','RegisterController@register');
Route::post('login','RegisterController@login');

Route::middleware('auth:api')->get('/register',function(Request $request){
    return $request->patient();
});
Route::middleware('auth:api')->get('/login',function(Request $request){
    return $request->patient();
});