<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/add-project/{_id}', function ($_id) {
    return "Se ha añadido el proyecto número {$_id}";
});

Route::delete('/delete-project/{_id}', function ($_id) {
    return "Se ha eliminado el proyecto número {$_id}";
});

Route::put('/update-project/{_id}', function ($_id, $_value) {
    return "Se ha actualizado el proyecto número {$_id} con el nuevo valor {$_value}.";
});



