<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/products','ProductController');
Route::resource('/categories', 'CategoryController');
Route::resource('/ncms', 'NcmController');
Route::resource('/aliquots', 'AliquotController');
Route::resource('/csons', 'CsonController');
Route::resource('/enterprises','EnterpriseController');
Route::resource('/addresses','AddressController');
Route::resource('/contacts','ContactController');
Route::resource('/type_providers','TypeProviderController');
Route::resource('/providers','ProviderController');
Route::resource('/clients', 'ClientController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
