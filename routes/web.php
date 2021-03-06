<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Survey\Order;
use App\Http\Controllers\Wallpaper\InfoController;
use App\Http\Controllers\Wallpaper\TagController;
use App\Http\Controllers\Wallpaper\WallpaperController;
use Illuminate\Support\Facades\Artisan;
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
    echo 'hello';
});
// Route::get('/db',function(){
//     Artisan::call("migrate:fresh --seed");
//     dd("done");
// });
Route::get('/cache', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    dd("done");
});
Route::post('login', [AuthController::class, 'signin']);
Route::get('login', function () {
    echo bcrypt('iamtheparsabaneribaneri7392');
});
Route::post('register', [AuthController::class, 'signup']);
Route::get('test', [AuthController::class, 'test'])->middleware(['auth:sanctum']);
Route::prefix('wallpaper')->group(function () {
    Route::get('info', [InfoController::class, 'index']);
    Route::get('wallpapers', [WallpaperController::class, 'index']);
    Route::get('wallpapers/{wallpaper}', [WallpaperController::class, 'show']);
    Route::get('wallpapers/tag/{tag}', [WallpaperController::class, 'showByTag']);
    Route::get('tags', [TagController::class, 'index']);
    Route::get('tags/{tag}', [TagController::class, 'show']);
    Route::delete('tags/{tag}', [TagController::class, 'destroy'])->middleware(['auth:sanctum', 'ability:wallpaper:manage']);

    Route::post('wallpapers', [WallpaperController::class, 'store'])->middleware(['auth:sanctum', 'ability:wallpaper:manage']);
    Route::patch('wallpapers/{wallpaper}', [WallpaperController::class, 'update'])->middleware(['auth:sanctum', 'ability:wallpaper:manage']);
    Route::delete('wallpapers/{wallpaper}', [WallpaperController::class, 'destroy'])->middleware(['auth:sanctum', 'ability:wallpaper:manage']);

    Route::post('tags', [TagController::class, 'store'])->middleware(['auth:sanctum', 'ability:wallpaper:manage']);
    Route::patch('tags/{tag}', [TagController::class, 'update'])->middleware(['auth:sanctum', 'ability:wallpaper:manage']);
});

Route::prefix('survey')->group(function () {
    Route::post('order/insert', [Order::class, 'insert']);
});
