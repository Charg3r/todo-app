<?php

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

// GET -> Regresa información breve de todas las tareas
Route::get('/tasks', [TaskController::class, 'index']);

Route::prefix('/task')->group (function () {
    // GET -> Regresa toda la información de una tarea
    Route::get('/{id}', [TaskController::class, 'show']);
    // POST -> Crear una tarea
    Route::post('/store', [TaskController::class, 'store']);
    // PUT -> Editar una tarea
    Route::put('/{id}', [TaskController::class, 'update']);
    // DELETE -> Borrar una tarea
    Route::delete('/{id}', [TaskController::class, 'destroy']);
    }
);
