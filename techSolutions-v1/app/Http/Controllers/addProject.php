<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addProject extends Controller
{
    public function add(){
        return view('agregarProyectoView');
    }
}
