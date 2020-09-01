<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/Login' , function () {
    return response()->json ([
        'user' => [
            'Email' => 'Hettiarachchi1998@gmail.com',
            'password' => '12345'
        ]
    ]);
});

Route::get('/Register' , function () {
    return response()->json ([
        'user' => [
            'Full_name' => 'Tiran Hettiarachchi',
            'Email' => 'Hettiarachchi1998@gmail.com',
            'Password' => '1234',
            'Repassword' => '1234',
            'Gender' => 'Male',
            'Age' => '21',
            'Address' => 'Malabe'
        ]
    ]);
});*/

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('patient','RegisterController');
});
