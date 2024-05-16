<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
///////////////////////User/////////////////////
Route::group([
    'middleware' => 'api',
    'prefix' => 'aaa'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\api\AuthController@login');
    Route::post('register', 'App\Http\Controllers\api\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\api\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\api\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\api\AuthController@me');
});
///////////////////////Category/////////////////////
Route::group([
    'middleware' => 'api',
    'prefix' => 'aaa'
], function ($router) {
Route::get('Category', [App\Http\Controllers\api\CategoryController::class, 'index']);
Route::post('Category.store', [App\Http\Controllers\api\CategoryController::class, 'store'])->middleware(['superadmin','admin']);
Route::post('Category.show', [App\Http\Controllers\api\CategoryController::class, 'show']);
Route::post('Category.show-sons', [App\Http\Controllers\api\CategoryController::class, 'showSons']);
Route::put('Category.update', [App\Http\Controllers\api\CategoryController::class, 'update'])->middleware(['superadmin','admin']);
Route::delete('Category.delete', [App\Http\Controllers\api\CategoryController::class, 'delete'])->middleware(['superadmin']);
});
///////////////////////Setting/////////////////////
Route::group([
    'middleware' => 'api',
    'prefix' => 'aaa'
], function ($router) {
Route::post('Setting', [App\Http\Controllers\api\SettingController::class, 'index']);
Route::put('Setting.update', [App\Http\Controllers\api\SettingController::class, 'update'])->middleware(['superadmin','admin']);
});
///////////////////////ProductController/////////////////////
Route::group([
    'middleware' => 'api',
    'prefix' => 'aaa'
], function ($router) {
Route::get('Product', [App\Http\Controllers\api\ProductController::class, 'index']);
Route::post('Product.store', [App\Http\Controllers\api\ProductController::class, 'store'])->middleware(['superadmin','admin']);
Route::post('Product.show', [App\Http\Controllers\api\ProductController::class, 'show']);
Route::post('Product.show_cart', [App\Http\Controllers\api\ProductController::class, 'show_cart']);
Route::put('Product.update', [App\Http\Controllers\api\ProductController::class, 'update'])->middleware(['superadmin','admin']);
Route::delete('Product.delete', [App\Http\Controllers\api\ProductController::class, 'delete'])->middleware(['superadmin']);
});

