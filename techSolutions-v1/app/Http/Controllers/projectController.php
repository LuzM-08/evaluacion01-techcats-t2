<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProyectoModel;

class projectController extends Controller
{
    public function new($_nuevo){
        $nuevo = new ProyectoModel();
    }

}