<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProyectoModel;

class projectController extends Controller
{
    public function new($_nuevo){
        $nuevo = new ProyectoModel();
    }

    private $projects = [
        ['id' => 1, 'nombre' => 'Proyecto X', 'fecha_inicio' => '2024-03-01', 'estado' => 'Finalizado', 'owner' => 'Mozart', 'costo' => '$5.000.000'],
        ['id' => 2, 'nombre' => 'Proyecto Y', 'fecha_inicio' => '2024-06-13', 'estado' => 'En curso', 'owner' => 'Dr. Simi', 'costo' => '$15.000.000'],
        ['id' => 3, 'nombre' => 'Proyecto Z', 'fecha_inicio' => '2024-08-25', 'estado' => 'Pendiente', 'owner' => 'Pepito Los Palotes', 'costo' => '$10.000.000']
    ];

    public function index()
    {
        return view('obtenerProyectoView', ['projects' => $this->projects]);
    }

    public function get($_id){
        if($_id == NULL) {
            return view('obtenerProyectoView', ['projects' => $this->projects]);
        } else {
            return view('obtenerProyectoByIDView');
        }
    }

}