<?php

use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/folder/list', [FolderController::class, 'index']);
Route::get('/folder/detail/{folder}', [FolderController::class, 'show']);

Route::get('/task/list', [TaskController::class, 'index']);
Route::get('/task/detail/{task}', [TaskController::class, 'show']);
