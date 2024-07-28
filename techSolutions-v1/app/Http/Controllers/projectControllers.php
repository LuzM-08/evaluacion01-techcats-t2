<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProyectoModel;

class projectControllers extends Controller
{
    // Dummy data for demonstration
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

    public function add($_id, $_nuevo){
        // insert into tabla values = $_nuevo;
        return "Se ha agregado un nuevo proyecto de forma exitosa";
    }

    public function update($_id, $_val) {
        // update tabla set columna = $_val where id = $_id
    }

    public function delete($_id){
        // delete from tabla where id = $_id
    }

    public function new($_nuevo){
        $nuevo = new ProyectoModel();
    }

}