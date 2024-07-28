<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProyectoModel;

class projectControllers extends Controller
{
    public function get($_id){
        if($_id == NULL) {
            // select * from proyectos
        } else {
            // select * from proyectos where id = $_id
        }
    }

    public function add($_id, $_nuevo){
        // insert into tabla values = $_nuevo; 
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