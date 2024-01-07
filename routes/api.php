<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealWorldController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(RealWorldController::class)
->name('realWorld')
->group(function () {
    Route::post('articles', 'articles')->name('articles');
    Route::get('articles/{id:slug}', 'getArticles')->name('getArticles');
    Route::patch('articles/{id:slug}', 'editArticles')->name('editArticles');
    // Route::put('articles/{id}', 'editArticles')->name('editArticles');
    Route::delete('articles/{id}', 'deleteArticles')->name('deleteArticles');
    Route::post('users', 'addUsers')->name('addUsers');
});
