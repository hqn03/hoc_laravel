<?php

use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'products'], function(){
    Route::get('/',[ProductController::class,'index'])->name('products.index');
    // Route::get('/create',[ProductController::class,'create'])->name('products.create');
    // Route::post('/create',[ProductController::class,'store'])->name('products.store');
    Route::get('/{product}',[ProductController::class,'show'])->name('products.show');
    Route::get('/edit/{product}',[ProductController::class, 'edit'])->name('products.edit');
    Route::put('/edit/{product}',[ProductController::class, 'update']);
});

