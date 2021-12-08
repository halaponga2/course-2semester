<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\GoodsReviewsController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('main');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/goods', [GoodsController::class, 'index']);

Route::get('/createGoods', function () {
    return view('createGoods');
});

Route::post('/createGoods', [GoodsController::class, 'save']);

Route::get('/destroy/{id}', [GoodsController::class, 'destroy']);
Route::get('/edit/{id}', [GoodsController::class, 'edit']);
Route::post('/edit/{id}', [GoodsController::class, 'update']);
Route::get('/goods/{id}', [GoodsController::class, 'show']);

Route::post('/goods/{id}/reviews',[GoodsReviewsController::class,'store']);
Route::get('/goods/reviews/destroy/{id}',[GoodsReviewsController::class,'destroy']);

Route::get('/about', [AboutController::class,'index']);