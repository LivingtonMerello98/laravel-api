<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//questa rotta fa si che una richiesta http a un ednpoint raggiunga il controller
//Route::get('projects', [ProjectController::class, 'index']);


//con apiResource passiamo con l'api tutte le risorse tranne edit e create
Route::apiResource('projects', ProjectController::class)->parameters([
    'projects' => 'project:slug'
]);
