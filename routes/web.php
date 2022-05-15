<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [StudentController::class, 'index'])->name('home');

Route::get('/add', function () {
    return view('addstudent',[
        "title"=>"Add Student"
    ]);
});

Route::post('addstudent', [StudentController::class, 'store']);
Auth::routes();
Route::get('/logout', [LoginController::class,'logout']);
Route::get('/home', [StudentController::class, 'index'])->name('home');
Route::get('delete/{id}', [StudentController::class,'destroy']);
Route::get('edit/{id}', [StudentController::class,'edit']);
Route::post('update', [StudentController::class,'update']);