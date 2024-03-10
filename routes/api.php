<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UsersController;
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
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::get('/users', [UsersController::class, 'alluser']); // List all users
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:sanctum'])->group(function () {
//    Route::get('/users', [UsersController::class, 'index']); // List all users
    Route::post('/users', [UsersController::class, 'store']); // Create a new user
    Route::get('/users/{user}', [UsersController::class, 'show']); // Show details of a specific user
    Route::put('/users/{user}', [UsersController::class, 'update']); // Update a specific user
    Route::delete('/users/{user}', [UsersController::class, 'destroy']); // Delete a specific user

    // Additional routes
    Route::post('/users/{id}/assign-roles', [UsersController::class, 'assignRoles']); // Assign roles to a user
    Route::post('/get-users', [UsersController::class, 'getUsers']); // Get users using a specific method
    Route::post('/get-user', [UsersController::class, 'userDetail']); // Get details of a user using a specific method
    Route::post('/delete-selected-users', [UsersController::class, 'DeleteSelectedUsers']); // Delete selected users using a specific method
    Route::post('/profile-setting', [UsersController::class, 'updateProfile']); // Update user's profile using a specific method





});
