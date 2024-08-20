<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectController;
use App\Http\Controllers\UFController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

Route::get('/', function () {
    return view('usuario.login');
});
/* return view('landing.index');
})->name('raiz');
 */

Route::get('/all-projects', [ProjectController::class, 'index']);

Route::get('/all-projects/{_id}', [ProjectController::class, 'get']);

Route::get('/add-project', [ProjectController::class, 'addProject']);
Route::post('/add-project', [ProjectController::class, 'addProject']);

Route::get('/update-project', [ProjectController::class, 'updateProject']);
Route::put('/update-project', [ProjectController::class, 'updateProject']);

Route::get('/delete-project', [ProjectController::class, 'deleteProject']);
Route::delete('/delete-project', [ProjectController::class, 'deleteProject']);

Route::get('/view-UF', [ProjectController::class, 'viewUF']);

/* Rutas evaluación 2 */
Route::get('/login', [LoginController::class, 'formularioLogin'])->name('usuario.login');
Route::post('/login', [LoginController::class, 'login'])->name('usuario.validar');

Route::get('/users/register', [LoginController::class, 'formularioUsuario'])->name('usuario.registrar');
Route::post('/users/register', [LoginController::class, 'registrar'])->name('usuario.registrar');

/* Route::get('/backoffice', function(){
    $user = Auth::user();
    if ($user == NULL) {
        return redirect()-> route('usuario.login')->withErrors(['message' => 'No existe una sesion activa']);
    } return view ('backoffice.dashboard', ['user' => $user]);
}) ->name('backoffice.dashboard');  */

Route::get('/backoffice', function () {
    $token = session('jwt_token');

    if (!$token) {
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa o el token es inválido.']);
    }

    $user = Auth::user();
    if ($user == NULL) {
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesion activa']);
    }

    try {
        $user = JWTAuth::setToken($token)->authenticate();
        return view('backoffice.dashboard', ['user' => $user]);
    } catch (Exception $e) {
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa o el token es inválido.']);
    }
})->name('backoffice.dashboard');



Route::post('/logout', [LoginController::class, 'logout'])->name('usuario.logout');
