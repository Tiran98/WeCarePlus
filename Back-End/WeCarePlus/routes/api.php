<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register','RegisterController@register');
Route::post('login','RegisterController@login');
Route::post('addEmp','EmployeeController@addEmp');
Route::get ('empListItems', 'EmployeeController@index' );

Route::get ('supplier-generate-pdf', 'PdfGenerateController@supplierList' );
Route::get ('order-history-generate-pdf', 'PdfGenerateController@orderHistory' );

Route::resource('supplier', 'SupplierController');
Route::resource('stock-order', 'StockOrderController');

Route::resource('income', 'IncomeController');
Route::resource('expense', 'ExpenseController');

Route::get ('income-generate-pdf', 'PdfGenerateController@incomeList' );
Route::get ('expense-generate-pdf', 'PdfGenerateController@expenseList' );


Route::middleware('auth:api')->get('/register',function(Request $request){
    return $request->patient();
});
Route::middleware('auth:api')->get('/login',function(Request $request){
    return $request->patient();
});
Route::middleware('auth:api')->get('/addEmp',function(Request $request){
    return $request->Employee();
});
Route::middleware('auth:api')->get('/index',function(Request $request){
    return $request->Employee();
});