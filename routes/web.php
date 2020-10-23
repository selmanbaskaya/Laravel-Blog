<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\Auth;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
*/
Route::get('admin/panel', [Dashboard::class, 'index'])->name('admin.dashboard');
Route::get('admin/login', [Auth::class, 'login'])->name('admin.login');

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', [Homepage::class, 'index'])->name('homepage');
Route::get('/iletisim', [Homepage::class, 'contact'])->name('contact');
Route::post('/iletisin', [Homepage::class, 'contactpost'])->name('contact.post');
Route::get('/Kategori/{category}', [Homepage::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [Homepage::class, 'single'])->name('single');
Route::get('/{sayge}', [Homepage::class, 'page'])->name('page');


