<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('panel', [Dashboard::class, 'index'])->name('dashboard');
    //Makale İşlemleri
    Route::get('/makaleler/silinenler', [ArticleController::class, 'trashed'])->name('trashed.article');
    Route::resource('makaleler', ArticleController::class);
    Route::get('/switch', [ArticleController::class, 'switchStatus'])->name('switch');
    Route::get('/delete/{id}', [ArticleController::class, 'delete'])->name('delete.article');
    Route::get('/hardDelete/{id}', [ArticleController::class, 'hardDelete'])->name('hard.delete.article');
    Route::get('/recover/{id}', [ArticleController::class, 'recover'])->name('recover.article');
    //Kategori İşlemleri
    Route::get('/kategoriler', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategoriler/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/kategoriler/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/kategori/status', [CategoryController::class, 'switchStatus'])->name('category.switch');
    Route::get('/kategori/getData', [CategoryController::class, 'getData'])->name('category.getdata');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


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


