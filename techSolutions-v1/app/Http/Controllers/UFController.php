<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class UFController extends Controller
{
    public function getUF()
    {            
            $UFData = Http::get('http://api.cmfchile.cl/api-sbifv3/recursos_api/uf?apikey=d95fa4d6e65324b446b210582861bc46ef2767a5&formato=json');
            return view('verUF',compact('UFData'));
    }
}
