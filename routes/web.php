<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


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

Route::get('/test-mail', function () {
    Mail::to('test@gmail.com')->send(new TestMail());
    return 'Test Mail Sent';
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboardold',function()
{
    return view('/dashboard');
});

Route::get('/dashboard', function () {
    return redirect('courses/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::resource('courses', CourseController::class);

Route::GET('courses/delete/{id}',[CourseController::class, 'delete'])->name('course.delete');

Route::resource('books', BookController::class);

Route::GET('books/delete/{id}',[BookController::class, 'delete'])->name('book.delete');


});



require __DIR__.'/auth.php';
