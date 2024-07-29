<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addProject;
use App\Http\Controllers\deleteProject;
use App\Http\Controllers\projectController;
use App\Http\Controllers\UFController;
use App\Http\Controllers\updateProject;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-projects', [ProjectController::class, 'index']);

Route::get('/all-projects/{_id}', [ProjectController::class, 'get']);

Route::get('/add-project', [addProject::class, 'add']);
Route::post('/add-project', [addProject::class, 'add']);

Route::get('/update-project', [updateProject::class, 'add']);
Route::put('/update-project', [updateProject::class, 'add']);

Route::get('/delete-project', [deleteProject::class, 'delete']);
Route::delete('/delete-project', [deleteProject::class, 'delete']);

Route::get('/view-UF', [UFController::class, 'getUF']);

/* Route::put('/update-project/{_id}', function ($_id, $_value) {
    return "Se ha actualizado el proyecto número {$_id} con el nuevo valor {$_value}.";
}); */



