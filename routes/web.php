<?php

use Illuminate\Support\Facades\Route;


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

Route::group(['middleware'=>['auth']], function () {
    //For auth
    Route::get('dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('dashboard','App\Http\Controllers\DashboardController@dashview')->name('dashboard');
   //for auth

   //for file upload and inserting to data base
    Route::get('updatefile','App\Http\Controllers\DashboardController@uploadtask')->name('updatefile');
    Route::post('updatefile','App\Http\Controllers\DashboardController@filestored')->name('uploadfile');
    //for file upload and inserting to data base

     //for showing data in the database using datatable
    Route::get('views','App\Http\Controllers\DashboardController@view')->name('fileview');
    //for showing data in the database using datatable

    //for downloading files in the database
    Route::get('/file/download/{file}','App\Http\Controllers\DashboardController@dfile');
    //for downloading files in the database

    //for editing files
    Route::get('edit','App\Http\Controllers\DashboardController@edit')->name('fileedit');
    //for editing files

    //for updating retrive data in the database
    Route::post('edit','App\Http\Controllers\DashboardController@updateData')->name('fileUpdate');
    //for updating retrive data in the database

    //delete record file
    Route::get('delete','App\Http\Controllers\DashboardController@deletefile')->name('deletefile');
    
    


});

require __DIR__.'/auth.php';
