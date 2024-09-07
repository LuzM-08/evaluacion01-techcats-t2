<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectController;
use App\Http\Controllers\UFController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Models\PrivilegeModel;
use App\Models\RolModel;
use App\Models\RolUserInfoPrivilegio;
use App\Models\ProyectoModel;
use App\Models\UserProfileModel;

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

/* Rutas Evaluación 3*/ 

//sin backoffice
Route::get('/users/register', [UserController::class, 'formularioNuevo'])->name('usuario.registrar');
Route::post('/users/register', [UserController::class, 'registrar'])->name('usuario.registrar');
//con backoffice
Route::get('/backoffice/users', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/backoffice/users/get/{_id}', [UserController::class, 'getById']);
Route::post('/backoffice/users/new', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/backoffice/users/down/{_id}', [UserController::class, 'disable'])->name('usuarios.disable');
Route::post('/backoffice/users/up/{_id}', [UserController::class, 'enable'])->name('usuarios.enable');
Route::post('/backoffice/users/update/{_id}', [UserController::class, 'update'])->name('usuarios.update');
Route::post('/backoffice/users/delete/{_id}', [UserController::class, 'delete'])->name('usuarios.delete');

Route::get('/backoffice', function () {
    $user = Auth::user();
    if ($user == NULL) {
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa.']);
    }
    $proyectosConQRs = ProyectoModel::with('qrs')->get();
    $user->rol_nombre = RolModel::findOrFail($user->rol_id)->nombre;
    //privilegios del Rol en Mantenedor y sus Privilegios
    $allRolMantenedorPrivilegio = RolUserInfoPrivilegio::all()->where('rol_id', $user->rol_id);
    $rolMP = [];
    foreach ($allRolMantenedorPrivilegio as $rmp) {
        $rolMP[$rmp->mantenedor_id][$rmp->privilegio_id] = $rmp->activo;
    }

    return view('backoffice.dashboard', [
        'user' => $user,
        'proyectos' => $proyectosConQRs,
        'mantenedores' => UserProfileModel::all(),
        'privilegios' => PrivilegeModel::all(),
        'rolMP' => $rolMP,
    ]);
})->name('backoffice.dashboard');

Route::get('/backoffice/proyectos', [projectController::class, 'index'])->name('proyectos.index');
Route::get('/backoffice/proyectos/get/{_id}', [projectController::class, 'getById']);
Route::post('/backoffice/proyectos/new', [projectController::class, 'create'])->name('proyectos.create');
Route::post('/backoffice/proyectos/down/{_id}', [projectController::class, 'disable'])->name('proyectos.disable');
Route::post('/backoffice/proyectos/up/{_id}', [projectController::class, 'enable'])->name('proyectos.enable');
Route::post('/backoffice/proyectos/update/{_id}', [projectController::class, 'update'])->name('proyectos.update');
Route::post('/backoffice/proyectos/delete/{_id}', [projectController::class, 'delete'])->name('proyectos.delete');

Route::get('/backoffice/mantenedores', [UserInfoController::class, 'index'])->name('mantenedores.index');
Route::get('/backoffice/mantenedores/get/{_id}', [UserInfoController::class, 'getById']);
Route::post('/backoffice/mantenedores/new', [UserInfoController::class, 'create'])->name('mantenedores.create');
Route::post('/backoffice/mantenedores/down/{_id}', [UserInfoController::class, 'disable'])->name('mantenedores.disable');
Route::post('/backoffice/mantenedores/up/{_id}', [UserInfoController::class, 'enable'])->name('mantenedores.enable');
Route::post('/backoffice/mantenedores/update/{_id}', [UserInfoController::class, 'update'])->name('mantenedores.update');
Route::post('/backoffice/mantenedores/delete/{_id}', [UserInfoController::class, 'delete'])->name('mantenedores.delete');

Route::get('/backoffice/privilegios', [PrivilegeController::class, 'index'])->name('privilegios.index');
Route::get('/backoffice/privilegios/get/{_id}', [PrivilegeController::class, 'getById']);
Route::post('/backoffice/privilegios/new', [PrivilegeController::class, 'create'])->name('privilegios.create');
Route::post('/backoffice/privilegios/down/{_id}', [PrivilegeController::class, 'disable'])->name('privilegios.disable');
Route::post('/backoffice/privilegios/up/{_id}', [PrivilegeController::class, 'enable'])->name('privilegios.enable');
Route::post('/backoffice/privilegios/update/{_id}', [PrivilegeController::class, 'update'])->name('privilegios.update');
Route::post('/backoffice/privilegios/delete/{_id}', [PrivilegeController::class, 'delete'])->name('privilegios.delete');

Route::get('/backoffice/roles', [RolController::class, 'index'])->name('roles.index');
Route::get('/backoffice/roles/get/{_id}', [RolController::class, 'getById']);
Route::post('/backoffice/roles/new', [RolController::class, 'create'])->name('roles.create');
Route::post('/backoffice/roles/down/{_id}', [RolController::class, 'disable'])->name('roles.disable');
Route::post('/backoffice/roles/up/{_id}', [RolController::class, 'enable'])->name('roles.enable');
Route::post('/backoffice/roles/update/{_id}', [RolController::class, 'update'])->name('roles.update');
Route::post('/backoffice/roles/delete/{_id}', [RolController::class, 'delete'])->name('roles.delete');


Route::get('/backoffice/qrs', [QrController::class, 'index'])->name('qrs.index');
Route::get('/backoffice/qrs/get/{_id}', [QrController::class, 'getById']);
Route::post('/backoffice/qrs/new', [QrController::class, 'create'])->name('qrs.create');
Route::post('/backoffice/qrs/down/{_id}', [QrController::class, 'disable'])->name('qrs.disable');
Route::post('/backoffice/qrs/up/{_id}', [QrController::class, 'enable'])->name('qrs.enable');
Route::post('/backoffice/qrs/update/{_id}', [QrController::class, 'update'])->name('qrs.update');
Route::post('/backoffice/qrs/delete/{_id}', [QrController::class, 'delete'])->name('qrs.delete');

Route::get('/redireccion', [QrController::class, 'handleRedireccion'])->name('redireccion');


