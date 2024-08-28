<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users_api', [UsersApiController::class, 'index'])->name('userapi.index');
Route::get('/users_api/create', [UsersApiController::class, 'create'])->name('userapi.create');
Route::get('/users_api/{id}', [UsersApiController::class, 'show'])->name('userapi.show');
Route::post('/users_api/store', [UsersApiController::class, 'store'])->name('userapi.store');
Route::get('/users_api/edit/{id}', [UsersApiController::class, 'edit'])->name('userapi.edit');
Route::post('/users_api/update/{id}', [UsersApiController::class, 'update'])->name('userapi.update');
Route::delete('/users_api/delete/{id}', [UsersApiController::class, 'destroy'])->name('userapi.delete');
