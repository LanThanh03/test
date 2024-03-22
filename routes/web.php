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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/vidu1','App\Http\Controllers\ViDuController@vidu1');
Route::get('/vidu2','App\Http\Controllers\ViDuController@vidu2');
Route::post('/tinhtong','App\Http\Controllers\ViDuController@tinhtong');

#bai1
Route::get('/bai1','App\Http\Controllers\ViDuController@bai1');
Route::post('/in_hoa','App\Http\Controllers\ViDuController@in_hoa');

#bài 2
Route::get('/bai2','App\Http\Controllers\ViDuController@bai2'); 
Route::post('/timMinMax','App\Http\Controllers\ViDuController@timMinMax');

#bài 3
Route::get('/bai3','App\Http\Controllers\ViDuController@bai3'); 
Route::post('/color','App\Http\Controllers\ViDuController@color');

#bài 4
Route::get('/bai4','App\Http\Controllers\ViDuController@bai4'); 
Route::post('/info','App\Http\Controllers\ViDuController@info');

#lấy sách
Route::get("/ql_sach/theloai","App\Http\Controllers\BookController@laythongtintheloai");
Route::get("/ql_sach/thongtinsach","App\Http\Controllers\BookController@laythongtinsach");
Route::get("/ql_sach/biamem","App\Http\Controllers\BookController@biamem");
Route::get("/ql_sach/thongke","App\Http\Controllers\BookController@thongke");

#test git
Route::get("/test_chucnang","App\Http\Controllers\ViDuController@chucnang");

#Lynxinchao
Route::get("/test_chucnang1","App\Http\Controllers\ViDuController@chucnang1");



    
