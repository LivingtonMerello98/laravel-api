<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController; //controller per area amministratore
use App\Http\Controllers\Admin\CategoryController;  //controller per le categorie dentro area amministrazione

use App\Http\Controllers\Admin\TechnologyController; //controller per le tecnologie


use App\Http\Controllers\Guest\PageController; //controller per area guest
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('guest/', [PageController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//rotta per il backoffice
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('technologies', TechnologyController::class);
});



require __DIR__ . '/auth.php';
