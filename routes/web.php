<?php

use App\Http\Controllers\Admin\Courses\CourseController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Lession\LessionController;
use App\Models\Course;
use Illuminate\Http\Request;
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

Route::prefix('admin')->group(function(){
    Route::get('/home', [IndexController::class, 'index'])->name('home');

    Route::prefix('/courses')->name('course.')->group(function(){
        Route::get('/', [CourseController::class, 'index'])->name('allcourse');
        Route::get('/addcourse', [CourseController::class, 'addcourse'])->name('addcourse');
        Route::post('addcourse', [CourseController::class, 'store'])->name('store');
        Route::get('/editcourse/{id}', [CourseController::class, 'edit'])->name('editcourse');
        Route::post('/editcourse/{id}', [CourseController::class, 'update'])->name('update');
        Route::delete('/delete', [CourseController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/lessions')->name('lession.')->group(function(){
        Route::get('/create', [LessionController::class, 'create'])->name('create');
    });
});
