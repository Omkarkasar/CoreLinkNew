<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//Login & Authenticationhjgh
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/loginuser', [AuthController::class, 'loginuser'])->name('loginuser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Only accessible after login  safee 
Route::middleware(['checkAuth'])->group(function () {

    Route::get('/index', [HomeController::class, 'index'])->name('index');
    Route::get('/tables', [HomeController::class, 'tables'])->name('tables');

    // Our CST
    Route::get('/ourcstform', [HomeController::class, 'ourcstform'])->name('ourcstforms');
    Route::post('/ourcststore', [MainController::class, 'ourcststore'])->name('ourcststore');
    Route::get('/ourcstget', [MainController::class, 'ourcstget'])->name('ourcstget');
    Route::delete('ourcstdelete/{id}', [MainController::class, 'ourcstdelete'])->name('ourcstdelete');
    Route::get('ourcstsearchoperation', [MainController::class, 'ourcstsearchoperation'])->name('ourcstsearchoperation');

    // Region
    Route::get('/regionform', [HomeController::class, 'regionform'])->name('regionform');
    Route::post('regionstore', [MainController::class, 'regionstore'])->name('regionstore');
    Route::get('regionget', [MainController::class, 'regionget'])->name('regionget');
    Route::delete('regiondelete/{id}', [MainController::class, 'regiondelete'])->name('regiondelete');
    Route::get('regionsearchoperation', [MainController::class, 'regionsearchoperation'])->name('regionsearchoperation');

    // Chapter
    Route::get('/chapterform', [HomeController::class, 'chapterform'])->name('chapterform');
    Route::post('chapterstore', [MainController::class, 'chapterstore'])->name('chapterstore');
    Route::get('chapterget', [MainController::class, 'chapterget'])->name('chapterget');
    Route::delete('chapterdelete/{id}', [MainController::class, 'chapterdelete'])->name('chapterdelete');
    Route::get('chaptersearchoperation', [MainController::class, 'chaptersearchoperation'])->name('chaptersearchoperation');

    // Category
    Route::get('/categoryform', [HomeController::class, 'categoryform'])->name('categoryform');
    Route::post('categorystore', [MainController::class, 'categorystore'])->name('categorystore');
    Route::get('categoryget', [MainController::class, 'categoryget'])->name('categoryget');
    Route::delete('categorydelete/{id}', [MainController::class, 'categorydelete'])->name('categorydelete');
    Route::get('categorysearchoperation', [MainController::class, 'categorysearchoperation'])->name('categorysearchoperation');

    // Memberf
    Route::get('/memberform', [HomeController::class, 'memberform'])->name('memberform');
    Route::post('memberstore', [MainController::class, 'memberstore'])->name('memberstore');
    Route::get('memberget', [MainController::class, 'memberget'])->name('memberget');
    Route::delete('memberdelete/{id}', [MainController::class, 'memberdelete'])->name('memberdelete');
    Route::get('membersearchoperation', [MainController::class, 'membersearchoperation'])->name('membersearchoperation');

});
