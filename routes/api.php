<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\WorkspaceController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout']);
Route::get('/user', [AuthenticationController::class, 'userInfo'])->middleware('auth:sanctum');


// Workspaces 
Route::middleware('auth:sanctum')->group(function () { 
    Route::get('/workspaces', [WorkspaceController::class, 'index']);
    Route::post('/workspaces', [WorkspaceController::class, 'store']);
    Route::get('/workspaces/{id}', [WorkspaceController::class, 'show']);
    Route::put('/workspaces/{id}', [WorkspaceController::class, 'update']);
    Route::delete('/workspaces/{id}', [WorkspaceController::class, 'destroy']);
});


//Projects 
Route::middleware('auth:sanctum')->group(function () { 
    Route::post('/workspaces/{id}/projects',[ProjectController::class,'store']);
    Route::get('/projects/{id}',[ProjectController::class,'show']);
    Route::delete('/projects/{id}',[ProjectController::class,'destroy']);
});

//taches 
Route::middleware('auth:sanctum')->group(function(){
    route::post('/projects/{id}/tasks',[TacheController::class,'store']);
    route::get('/projects/{id}/tasks',[TacheController::class,'show']);
    route::put('/tasks/{id}',[TacheController::class,'update']);
    route::post('/tasks/{id}/timer',[TacheController::class,'timer']);
});
