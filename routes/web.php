<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeCarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Auth::routes(['register' => 'false']);

// trang chủ
Route::get('/', [DashboardController::class, 'index']);
Route::get('/logout', [DashboardController::class, 'logout']);
Route::get('/bang-dieu-khien', [DashboardController::class, 'index'])->name('home');
// 

// tài khoản người dùng
Route::get('/tai-khoan', [UserController::class, 'myaccount']);
Route::get('/danh-sach-user', [UserController::class, 'index']);
Route::get('/nguoi-dung/{id}', [UserController::class, 'edit']);
Route::get('/them-tai-khoan', [UserController::class, 'create']);
Route::post('/them-tai-khoan', [UserController::class, 'store']);
Route::post('/luu-thong-tin-nguoi-dung/{id}', [UserController::class, 'update']);
// 

// quản lý xe
Route::get('/danh-sach-xe', [CarsController::class, 'index']);
Route::get('/xe/{id}', [CarsController::class, 'show']);
Route::get('/them-xe', [CarsController::class, 'create']);
Route::post('/them-xe', [CarsController::class, 'store']);
Route::get('/chi-tiet-xe/{id}', [CarsController::class, 'show']);
Route::get('/sua-thong-tin-xe/{id}', [CarsController::class, 'edit']);
Route::post('/sua-thong-tin-xe/{id}', [CarsController::class, 'update']);
Route::get('/xoa-xe/{id}', [CarsController::class, 'destroy']);
// 

// quản lý phân loại xe -- loại xe
Route::get('/them-loai-xe', [TypeCarController::class, 'index']);
Route::post('/them-loai-xe', [TypeCarController::class, 'store']);
Route::get('/sua-loai-xe/{id}', [TypeCarController::class, 'edit']);
Route::post('/sua-loai-xe/{id}', [TypeCarController::class, 'update']);
Route::get('/xoa-loai-xe/{id}', [TypeCarController::class, 'destroy']);
// 

// quản lý phân loại xe -- thương hiệu
Route::get('/them-thuong-hieu', [CarBrandController::class, 'index']);
Route::post('/them-thuong-hieu', [CarBrandController::class, 'store']);
Route::get('/sua-thuong-hieu/{id}', [CarBrandController::class, 'edit']);
Route::post('/sua-thuong-hieu/{id}', [CarBrandController::class, 'update']);
// 

// cho thuê xe
Route::get('/danh-sach-cho-thue', [LeaseController::class, 'index']);
Route::get('/thong-tin-thue/{id}', [LeaseController::class, 'show']);
Route::get('/cho-thue/{id}', [LeaseController::class, 'create']);
Route::get('/xuat-xe/{id}', [LeaseController::class, 'update']);
Route::post('/luu-phieu-coc', [LeaseController::class, 'store']);
Route::get('/tra-xe', [LeaseController::class, 'traxe']);
Route::post('/tim-kiem-phieu-thue', [LeaseController::class, 'result']);
Route::post('/nhan-tra-xe/{id}', [LeaseController::class, 'nhanxe']);
Route::post('/ket-thuc-hop-dong/{id}', [LeaseController::class, 'luuKho']);
Route::get('/thanh-toan-thue-xe', [LeaseController::class, 'thanhtoan']);
Route::get('/thanh-toan-tien/{id}', [LeaseController::class, 'ketThucThue']);
// 

// kiểm tra xe
Route::get('/danh-sach-kiem-tra', [CheckController::class, 'index']);
Route::get('/kiem-tra/{id}', [CheckController::class, 'create']);
Route::get('/kiem-tra-nhan-xe/{id}', [CheckController::class, 'nhanxe']);
Route::post('/luu-phieu-kiem-tra', [CheckController::class, 'store']);
Route::post('/luu-phieu-kiem-tra-nhan-xe/{id}', [CheckController::class, 'luuphieunhanxe']);
Route::get('/kiem-tra-dinh-ky/{id}', [CheckController::class, 'kiemTraDinhKy']);
// 

// Quản lý tài chính
Route::get('/tong-quan', [TransactionController::class, 'index']);
Route::get('/tong-thu', [TransactionController::class, 'tongThu']);
Route::get('/tong-chi', [TransactionController::class, 'tongChi']);
// 