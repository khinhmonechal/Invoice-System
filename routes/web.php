<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

// Route::get('/add', function () {
//     return view('addInvoice');
// });

// Route::get('/list', function () {
// 	$invoices = DB::table('invoices')->get();
//     return view('invoiceList',compact('invoices'));
// });


Route::get('/list', 'InvoicesController@index');

Route::get('/add', 'InvoicesController@addInvoice');

Route::get('/create','InvoicesController@addInvoice');
Route::post('/create','InvoicesController@create');

Route::get('/delete/{id}', 'InvoicesController@delete');

Route::post('/search', 'InvoicesController@search');

Route::get('/edit/{id}','InvoicesController@editInvoice');
Route::post('/update/{id}','InvoicesController@update');

// Route::get('/pdfview/{id}', 'InvoicesController@pdfview');

Route::get('pdfview/{id}',array('as'=>'pdfview','uses'=>'InvoicesController@pdfview'));





