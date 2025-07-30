<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\propertyController;
use App\Http\Controllers\OptionController;

$idregex = '[0-9]+';
$slugregex = '[a-z0-9\-]+';

Route::get('/', [App\Http\Controllers\User\homeController::class, 'index'])->name('home');
Route::get('/room', [App\Http\Controllers\User\roomController::class, 'index'])->name('room');
Route::get('/room/{slug}-{property}', [\App\Http\Controllers\User\roomController::class, 'show'])
    ->name('room.show')->where([
        'slug' => $slugregex,
        'property' => $idregex
    ]);
Route::get('/contact', [App\Http\Controllers\User\contactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\User\aboutController::class, 'index'])->name('about');

Route::get('/admin/login', [App\Http\Controllers\Admin\authController::class, 'login'])->middleware('guest')->name('login');
Route::post('/admin/login', [App\Http\Controllers\Admin\authController::class, 'dologin'])->middleware('guest')->name('dologin');
Route::delete('/admin/logout', [App\Http\Controllers\Admin\authController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [propertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/create', [propertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [propertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{property}/edit', [propertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [propertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [propertyController::class, 'destroy'])->name('properties.destroy');
    Route::resource('option',OptionController::class)
        ->names([
            'index' => 'option.index',
            'create' => 'option.create',
            'store' => 'option.store',
            'edit' => 'option.edit',
            'update' => 'option.update',
            'destroy' => 'option.destroy'
        ]);
    Route::resource('category', 'App\Http\Controllers\Admin\categoryController')
        ->names([
            'index' => 'category.index',
            'create' => 'category.create',
            'store' => 'category.store',
            'edit' => 'category.edit',
            'update' => 'category.update',
            'destroy' => 'category.destroy'
        ]);
});
