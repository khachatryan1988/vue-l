<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
        $router->post('register', [RegisterController::class, 'register']);
    });



    Route::middleware('auth:api')->group(function () {


        // Actions related logged in user
        Route::prefix('user')->group(function (Router $router) {
            $router->put('/', [UserController::class, 'update']);
            $router->get('/friends', [UserController::class, 'friends']);
        });
        // Actions related all users
        Route::prefix('users')->group(function (Router $router) {
            $router->get('/', [UserController::class, 'getAllUsers']);
        });
        Route::prefix('friend-request')->group(function (Router $router) {
            $router->post('send', [FriendRequestController::class, 'sendFriendRequest']);
            $router->get('received', [FriendRequestController::class, 'getReceivedFriendRequests']);
            $router->post('accept', [FriendRequestController::class, 'acceptFriendRequest']);
        });
    });
});
