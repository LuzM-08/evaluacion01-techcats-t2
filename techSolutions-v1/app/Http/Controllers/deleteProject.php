<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class deleteProject extends Controller
{
    public function delete() {
        return view('eliminarProyectoView');
    }
}
