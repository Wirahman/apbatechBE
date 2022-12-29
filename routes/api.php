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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/v1/posts/store', 'api\v1\PostsController@store');
Route::post('/v1/klinik/create', 'api\v1\KlinikController@store');
Route::post('/v1/klinik/update', 'api\v1\KlinikController@update');
Route::delete('/v1/klinik/{kduser?}', 'api\v1\KlinikController@destroy');
Route::get('/v1/klinik/{kduser?}', 'api\v1\KlinikController@show');
Route::get('/v1/klinik', 'api\v1\KlinikController@index');


Route::post('/v1/klinik/ubaharray', 'api\v1\KlinikController@ubaharray');
Route::post('/v1/klinik/ubahString', 'api\v1\KlinikController@ubahString');
Route::post('/v1/klinik/manipulasiAngka', 'api\v1\KlinikController@manipulasiAngka');