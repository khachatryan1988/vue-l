<?php

use App\Http\Controllers\Auth\AuthController;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});






Route::group([
    'middleware' => 'api',
], function () {
    Route::prefix('auth')->group(function (Router $router) {
        $router->post('login', [AuthController::class, 'login']);
        $router->post('logout', [AuthController::class, 'logout']);
        $router->post('refresh', [AuthController::class, 'refresh']);
        $router->post('me', [AuthController::class, 'me']);
        $router->post('register', [AuthController::class, 'register']);
    });
});
