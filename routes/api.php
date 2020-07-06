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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Headquarters
|--------------------------------------------------------------------------
*/
Route::get('headquarter', 'HeadQuarterController@index');
Route::get('headquarter/register', 'HeadQuarterController@create');
Route::post('headquarter/create', 'HeadQuarterController@store');
Route::get('headquarter/edit/{id}', 'HeadQuarterController@edit');
Route::get('headquarter/show/{id}', 'HeadQuarterController@show');
Route::put('headquarter/update/{id}', 'HeadQuarterController@update');
Route::delete('headquarter/delete/{id}', 'HeadQuarterController@destroy');

/*
|--------------------------------------------------------------------------
| Complex
|--------------------------------------------------------------------------
*/
Route::get('complex', 'ComplexController@index');
Route::get('complex/register', 'ComplexController@create');
Route::post('complex/create', 'ComplexController@store');
Route::get('complex/edit/{id}', 'ComplexController@edit');
Route::get('complex/show/{id}', 'ComplexController@show');
Route::put('complex/update/{id}', 'ComplexController@update');
Route::delete('complex/delete/{id}', 'ComplexController@destroy');

/*
|--------------------------------------------------------------------------
| Commissar
|--------------------------------------------------------------------------
*/

Route::get('commissar', 'CommissarController@index');
Route::get('commissar/register', 'CommissarController@create');
Route::post('commissar/create', 'CommissarController@store');
Route::get('commissar/edit/{id}', 'CommissarController@edit');
Route::get('commissar/show/{id}', 'CommissarController@show');
Route::put('commissar/update/{id}', 'CommissarController@update');
Route::delete('commissar/delete/{id}', 'CommissarController@destroy');

