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

Route::get('applicants', 'ApplicantController@index');
Route::get('deletedapplicants', 'ApplicantController@indexDeleted');
Route::group(['prefix' => 'applicant'], function () {
    Route::post('add', 'ApplicantController@add');
    Route::get('view/{id}', 'ApplicantController@view');
    Route::get('edit/{id}', 'ApplicantController@edit');
    Route::post('update/{id}', 'ApplicantController@update');
    Route::delete('delete/{id}', 'ApplicantController@delete');
    Route::delete('forceDelete/{id}', 'ApplicantController@forceDelete');
    Route::delete('restore/{id}', 'ApplicantController@restore');
});
