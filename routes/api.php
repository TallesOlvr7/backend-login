<?php

use App\Http\Middleware\AuthenticatedVerifyMiddleware;


use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::post('/login', [UserController::class, 'login'])
        ->middleware(AuthenticatedVerifyMiddleware::class );
    
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/logout', [UserController::class, 'logout']);
    });
});
