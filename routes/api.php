<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

// GET -> Returns all tasks
Route::get('/tasks', [TaskController::class, 'index']);

Route::prefix('/task')->group (function () {
    // GET -> Returns a task with a given id.
    Route::get('/{id}', [TaskController::class, 'show']);
    // POST -> Creates a new task
    Route::post('/store', [TaskController::class, 'store']);
    // PUT -> Update a task with a given id
    Route::put('/{id}', [TaskController::class, 'update']);
    // PUT -> Toggle complete a task with a given id
    Route::put('/status/{id}', [TaskController::class, 'toggleComplete']);
    // DELETE -> Delete a task with a given id
    Route::delete('/{id}', [TaskController::class, 'destroy']);
    }
);

Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);