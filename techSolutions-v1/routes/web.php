<?php

use App\Http\Controllers\addProject;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UFController;
use App\Http\Controllers\updateProject;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-projects', function () {
    //return "Estos son todos los proyectos :)";
    return view('obtenerProyectoView');
});

Route::get('/all-projects/{_id}', function ($_id) {
    return "Este es el proyecto número {$_id}";
});

Route::post('/add-projects/{_id}', [addProject::class, 'add']);

Route::put('/update-project/{_id}', [updateProject::class, 'add']);

Route::put('/update-project/{_id}', function ($_id, $_value) {
    return "Se ha actualizado el proyecto número {$_id} con el nuevo valor {$_value}.";
});

// Para la API de UF

Route::get('/view-UF', [UFController::class, 'getUF']);

