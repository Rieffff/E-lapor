<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicComplaintController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminComplaintController;
use App\Http\Controllers\ResponseController;

Route::get('/complaints', [PublicComplaintController::class,'form'])->name('public.form');
Route::get('/', [PublicComplaintController::class,'list'])->name('public.list');
Route::get('/complaints/{id}', [PublicComplaintController::class,'show'])->name('public.show');
Route::post('/complaints', [PublicComplaintController::class,'submit'])->name('public.submit');

// Admin auth
Route::get('/admin/login', [AdminAuthController::class,'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class,'logout'])->name('admin.logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminComplaintController::class,'index'])->name('admin.dashboard');
    Route::get('/complaints/{id}', [AdminComplaintController::class,'show'])->name('admin.complaints.show');
    Route::post('/complaints/{id}/status', [AdminComplaintController::class,'changeStatus'])->name('admin.complaints.status');
    Route::post('/complaints/{id}/makeResponse', [AdminComplaintController::class,'makeResponse'])->name('admin.complaints.makeResponse');
    Route::post('/complaints/{id}/response', [ResponseController::class,'store'])->name('admin.complaints.response');
});
