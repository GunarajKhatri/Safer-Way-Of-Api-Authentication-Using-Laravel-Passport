<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\throwException;

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



Route::post('/refresh_token', [App\Http\Controllers\ApiController::class, 'RefreshToken']);
Route::middleware(['auth:api-admins'])->group(function () {
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
    Route::post('/admin/logout', [App\Http\Controllers\ApiController::class, 'Logout']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
