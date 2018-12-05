<?php

use Illuminate\Http\Request;

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
Route::post('register', 'API\RegisterController@register');
Route::middleware('auth:api')->get('/test', function(){
    return 'aaa';
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group( function () {
    Route::resource('clients', 'API\ClientController')->except(['create', 'edit']);

    Route::post('document', 'API\DocumentController@create');
    Route::get('document/{client_id}', 'API\DocumentController@show');
});