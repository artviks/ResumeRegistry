<?php

use App\Http\Controllers\ResumeController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('resumes', [ResumeController::class, 'index']);

Route::get('resume/{id}', [ResumeController::class, 'show']);

Route::post('resume', [ResumeController::class, 'store']);

Route::put('resume', [ResumeController::class, 'store']);

Route::delete('resume/{id}', [ResumeController::class, 'destroy']);
