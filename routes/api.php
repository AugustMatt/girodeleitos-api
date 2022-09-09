<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Sanctum\Sanctum;

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


Route::get('/users', [UserController::class, 'index']);

Route::post('/users/sexo', function (Request $request) {
    $userController = new UserController();
    return $userController->loginAuth($request);
});

Route::middleware('auth:sanctum')->get('/user/sexo/MiaKhalifa', function (Request $request) {
    return 'oi';
});
