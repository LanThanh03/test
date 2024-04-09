<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/','App\Http\Controllers\ViduLayoutController@sach');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
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
Route::get('/sach','App\Http\Controllers\ViduLayoutController@sach');
Route::get('/sach/theloai/{id}','App\Http\Controllers\ViduLayoutController@theloai');
Route::get('/sach/chitiet/{id}','App\Http\Controllers\ViduLayoutController@chitiet');
#test git
Route::get("/test_chucnang","App\Http\Controllers\ViDuController@chucnang");

#Lynxinchao
Route::get("/test_chucnang1","App\Http\Controllers\ViDuController@chucnang1");
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
#cập nhật thông tin người dùng
Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')
->middleware('auth')->name("account");
#xử lí cập nhật
Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
->middleware('auth')->name('saveaccountinfo');
Route::get('/qlsach', 'App\Http\Controllers\BookController@qlsach')->name('qlsach');
#Thêm sách và xử lý thêm sách
Route::get('/bookadd', 'App\Http\Controllers\BookController@bookadd')->name('bookadd');
Route::post('/savebookinfo','App\Http\Controllers\BookController@savebookinfo')
->middleware('auth')->name('savebook');
#Sửa sách và xử lý sửa sách
Route::get('/bookedit/{id}', 'App\Http\Controllers\BookController@bookedit')->name('bookedit');
Route::post('/saveeditbook','App\Http\Controllers\BookController@saveeditbook')->name('saveeditbook');
require __DIR__.'/auth.php';
