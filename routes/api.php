<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=>'tasks','as'=>'tasks.'], function(){
    Route::get('/',[TaskController::class,'index']);
    Route::post('/',[TaskController::class,'store']);
    Route::get('/{task}',[TaskController::class,'show'])->withTrashed();
    Route::put('/{task}',[TaskController::class,'update']);
    Route::delete('/{task}',[TaskController::class,'destroy']);
    
});
