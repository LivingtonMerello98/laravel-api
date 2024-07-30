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
Route::get('/projects', [ProjectController::class, 'index']);


// {
//     "success": true,
//     "results": [
//         {
//             "id": 37,
//             "category_id": 4,
//             "url": "fakewebsite",
//             "cover": "uploads/JYjVCRgF4E37705pRQaoLyAmoyPWULMiZ7iMmPzJ.jpg",
//             "title": "www.laravel",
//             "slug": "wwwlaravel",
//             "description": "lorem ipsum",
//             "created_at": "2024-07-26T09:21:06.000000Z",
//             "updated_at": "2024-07-26T09:21:06.000000Z"
//         },
//         {
//             "id": 42,
//             "category_id": 2,
//             "url": "fakewebsite",
//             "cover": "uploads/dmqgeUbKFpSPuvTPudzGqyBXcjCb8em5IMZtn0hM.jpg",
//             "title": "tabella pivot prove",
//             "slug": "tabella-pivot-prove",
//             "description": "tabella pivot prove",
//             "created_at": "2024-07-26T19:07:45.000000Z",
//             "updated_at": "2024-07-26T19:07:45.000000Z"
//         },
//         {
//             "id": 43,
//             "category_id": 4,
//             "url": "fakewebsite",
//             "cover": "uploads/oboBwQgz615OZmGczo5dF6llYIjjb9GSPbeEdv33.jpg",
//             "title": "taebella pivot",
//             "slug": "taebella-pivot",
//             "description": "taebella pivot",
//             "created_at": "2024-07-26T19:09:00.000000Z",
//             "updated_at": "2024-07-26T19:09:00.000000Z"
//         }
//     ]
// }