<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Routes for the API

// Authentication
Route::post('register', [AuthController::class, 'register']);
Route::post('login',    [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('create-new-token', [AuthController::class, 'createNewToken']);
});

Route::middleware('auth:api')->group(function () {

    //Roles
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::put('/roles/{id}', [RoleController::class, 'update']);
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

    // Schools
    Route::get('/schools', [SchoolController::class, 'index']);
    Route::get('/schools/{id}', [SchoolController::class, 'show']);
    Route::post('/schools', [SchoolController::class, 'store']);
    Route::put('/schools/{id}', [SchoolController::class, 'update']);
    Route::delete('/schools/{id}', [SchoolController::class, 'destroy']);


    // Students
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);

    // Teachers
    Route::get('/teachers', [TeacherController::class, 'index']);
    Route::get('/teachers/{id}', [TeacherController::class, 'show']);
    Route::post('/teachers', [TeacherController::class, 'store']);
    Route::put('/teachers/{id}', [TeacherController::class, 'update']);
    Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);
    // Parents
    Route::get('/parents', [ParentController::class, 'index']);
    Route::get('/parents/{id}', [ParentController::class, 'show']);
    Route::post('/parents', [ParentController::class, 'store']);
    Route::put('/parents/{id}', [ParentController::class, 'update']);
    Route::delete('/parents/{id}', [ParentController::class, 'destroy']);
    // Staff
    Route::get('/staff', [StaffController::class, 'index']);
    Route::get('/staff/{id}', [StaffController::class, 'show']);
    Route::post('/staff', [StaffController::class, 'store']);
    Route::put('/staff/{id}', [StaffController::class, 'update']);
    Route::delete('/staff/{id}', [StaffController::class, 'destroy']);
    // Events
    // Route::get('/events', [EventController::class, 'index']);
    // Route::get('/events/{id}', [EventController::class, 'show']);
    // Route::post('/events', [EventController::class, 'store']);
    // Route::put('/events/{id}', [EventController::class, 'update']);
    // Route::delete('/events/{id}', [EventController::class, 'destroy']);
    // // News
    // Route::get('/news', [NewsController::class, 'index']);
    // Route::get('/news/{id}', [NewsController::class, 'show']);
    // Route::post('/news', [NewsController::class, 'store']);
    // Route::put('/news/{id}', [NewsController::class, 'update']);
    // Route::delete('/news/{id}', [NewsController::class, 'destroy']);
});
// Notifications