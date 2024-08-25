<?php

use App\Http\Controllers\MovieController; // Import the MovieController
use App\Http\Controllers\UserController; // Import the UserController
use App\Http\Controllers\RatingController; // Import the RatingController
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route; 

// Route to get the currently authenticated user
Route::get('/user', function (Request $request) {
    return $request->user(); 
})->middleware('auth:sanctum'); 

// API routes for movies using the MovieController
Route::apiResource('movies', MovieController::class);
    // This line registers API routes for movies, using the MovieController class
    // It automatically defines routes for CRUD operations (create, read, update, delete) on the 'movies' resource

// API routes for users using the UserController
Route::apiResource('users', UserController::class);
    // This line registers API routes for users, using the UserController class
    // It automatically defines routes for CRUD operations (create, read, update, delete) on the 'users' resource

// API routes for ratings using the RatingController
Route::apiResource('ratings', RatingController::class);
    // This line registers API routes for ratings, using the RatingController class
    // It automatically defines routes for CRUD operations (create, read, update, delete) on the 'ratings' resource

