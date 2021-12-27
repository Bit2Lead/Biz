<?php

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/admin/task_add', [App\Http\Controllers\Admin\Task::class, 'index']);

Route::post('/admin/task_add', [App\Http\Controllers\Admin\Task::class, 'index']);
Route::post('/admin/task_edit/{id}', [App\Http\Controllers\Admin\Task::class, 'task_edit']);