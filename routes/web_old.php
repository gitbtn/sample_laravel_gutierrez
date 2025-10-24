<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BookController;


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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('courses', CourseController::class);

Route::GET('courses/delete/{id}',[CourseController::class, 'delete'])->name('course.delete');

Route::resource('books', BookController::class);

Route::GET('books/delete/{id}',[BookController::class, 'delete'])->name('book.delete');

