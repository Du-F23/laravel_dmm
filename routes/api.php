<?php

namespace App\Http\Controllers;
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


//Respuesta json de todos los estudiantes
Route::get('/students', [ApiController::class, 'lista0']);
Route::get('/students/lista1', [ApiController::class, 'lista1']);
Route::get('/students/lista2', [ApiController::class, 'lista2']);
Route::get('/students/lista3', [ApiController::class, 'lista3']);

//Detalle de un solo estudiante
Route::get('/students/{id}', [ApiController::class, 'detalle0']);
Route::get('/students/detalle1/{id}', [ApiController::class, 'detalle1']);
Route::get('/students/detalle2/{id}', [ApiController::class, 'detalle2']);
Route::get('/students/detalle3/{id}', [ApiController::class, 'detalle3']);




