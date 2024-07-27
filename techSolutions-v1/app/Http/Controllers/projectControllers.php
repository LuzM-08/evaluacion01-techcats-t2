<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class projectControllers extends Controller
{
    public function get($_id){
        if($_id == NULL) {
            // select * from proyectos
        } else {
            // select * from proyectos where id = $_id
        }
    }

    public function add($_id, $_nombre, $_fecha, $_estado, $_responsable, $_monto){
        // insert into tabla values = $_id, $_nombre  (...)
    }

    public function update($_id, $_col, $_val) {
        // update tabla set $_col = $_val where id = $_id
    }

    public function delete($_id){
        // delete from tabla  where id = $_id
    }

}