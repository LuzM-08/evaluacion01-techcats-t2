<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\getProject;
use App\Http\Controllers\addProject;
use App\Http\Controllers\updateProject;
use App\Http\Controllers\deleteProject;
use App\Http\Controllers\UFController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-projects', function () {
    return view('obtenerProyectoView');
});

Route::get('/all-projects/{_id}', [getProject::class, 'get']);

Route::post('/add-projects/{_id}', [addProject::class, 'add']);

Route::put('/update-project/{_id}', [updateProject::class, 'add']);

Route::delete('/delete-project/{_id}', [deleteProject::class, 'add']);


// Para la API de UF

Route::get('/view-UF', [UFController::class, 'getUF']);

