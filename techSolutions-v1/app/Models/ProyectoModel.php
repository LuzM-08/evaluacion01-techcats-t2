<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//setters & getters
class ProyectoModel extends Model
{
    use HasFactory;
    private $id;
    private $nombre;
    private $fechaInicio;
    private $estado;
    private $responsable;
    private $monto;
    private $createdBy;

    public function _construct()
    {

    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    //setters
    public function setID($_n)
    {
        $this->id = $_n;
    }

    public function setNombre($_n)
    {
        $this->nombre = $_n;
    }
    public function setFechaInicio($_n)
    {
        $this->fechaInicio = $_n;
    }
    public function setResponsable($_n)
    {
        $this->responsable = $_n;
    }
    public function setMonto($_n)
    {
        $this->monto = $_n;
    }
    public function setEstado($_n)
    {
        $this->estado = $_n;
    }
    //getters
    public function getId()
    {
        return $this->estado;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }
    public function getResponsable()
    {
        return $this->responsable;
    }
    public function getMonto()
    {
        return $this->monto;
    }

}
