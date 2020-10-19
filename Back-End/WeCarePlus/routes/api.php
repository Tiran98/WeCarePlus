<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['web']], function () {
    // Route::post('register','PatientController@register');
    // Route::post('login','PatientController@login');
    // Route::get('login','PatientController@showLoginForm');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
Route::post('register','PatientController@register');
Route::post('login','PatientController@login');
Route::get('login','PatientController@showLoginForm');
Route::resource('patientlist', 'PatientController');
Route::get ('patientListGen-pdf', 'PdfGenerateController@patientListGen' );

Route::post('addEmp','EmployeeController@addEmp');
Route::get ('empListItems', 'EmployeeController@index' );

Route::get ('supplier-generate-pdf', 'PdfGenerateController@supplierList' );

Route::get ('order-history-generate-pdf', 'PdfGenerateController@orderHistory' );

Route::resource('supplier', 'SupplierController');

Route::resource('stock-order', 'StockOrderController');


// Route::middleware('auth:api')->get('/register',function(Request $request){
//     return $request->user();
// });
// Route::middleware('auth:api')->get('/login',function(Request $request){
//     return $request->patient();
// });

Route::middleware('auth:api')->get('/addEmp',function(Request $request){
    return $request->Employee();
});
Route::middleware('auth:api')->get('/index',function(Request $request){
    return $request->Employee();
});
