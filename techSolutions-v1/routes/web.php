<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UFController; 
use App\Http\Controllers\projectControllers;

Route::get('/all-projects', [projectControllers::class, 'index'])->name('all-projects');
Route::get('/all-projects/{_id}', [projectControllers::class, 'get'])->name('get-project');

Route::post('/add-project/{_id}', function ($_id) {
    return "Se ha añadido el proyecto número {$_id}";
});

Route::delete('/delete-project/{_id}', function ($_id) {
    return "Se ha eliminado el proyecto número {$_id}";
});

Route::put('/update-project/{_id}', function ($_id, $_value) {
    return "Se ha actualizado el proyecto número {$_id} con el nuevo valor {$_value}.";
});

/* Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-projects/{_id}', function ($_id) {
    //return "Este es el proyecto número {$_id}";
}); /*




// Para la API de UF
 
Route::get('/view-UF', [UFController::class,'getUF']);

/*Route::get('/view-UF/{key}', function($_key){
    Http::get("http://api.cmfchile.cl/api-sbifv3/recursos_api/uf?apikey={$_key}&formato=json");
    return view('verUF');
});*/
