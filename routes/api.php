<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Api\Controllers\BookApiController;
use \App\Api\Controllers\AuthorApiController;
use \App\Api\Controllers\CategoryApiController;

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

Route::middleware('auth.basic')->get('/user', function (Request $request) {
    return $request->user();
});
// Routes related to BookApiController
Route::get('/books', [BookApiController::class, 'index']);
Route::get('/books/{id}', [BookApiController::class, 'show']);
Route::post('/books', [BookApiController::class, 'store'])->middleware('auth.basic');
Route::put('/books/{id}', [BookApiController::class, 'update'])->middleware('auth.basic');
Route::delete('/books/{id}', [BookApiController::class, 'destroy'])->middleware('auth.basic');


// Routes related to AuthorApiController

Route::get('/authors', [AuthorApiController::class, 'index']);
Route::get('/authors/{id}', [AuthorApiController::class, 'show']);
Route::post('/authors', [AuthorApiController::class, 'store'])->middleware('auth.basic');
Route::put('/authors/{id}', [AuthorApiController::class, 'update'])->middleware('auth.basic');
Route::delete('/authors/{id}', [AuthorApiController::class, 'destroy'])->middleware('auth.basic');


// Routes related to CategoryApiController

Route::get('/categories', [CategoryApiController::class, 'index']);
Route::post('/categories', [CategoryApiController::class, 'store'])->middleware('auth.basic');
Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy'])->middleware('auth.basic');
