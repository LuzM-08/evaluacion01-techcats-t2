<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrModel extends Model
{
    use HasFactory;

    protected $table = 'qrs';

    protected $fillable = [
        'user_id_create',
        'user_id_last_update',
        'proyecto_id',
        'etiqueta',
        'redireccion',
        'activo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_create');
    }

    public function proyecto()
    {
        return $this->belongsTo(ProyectoModel::class, 'proyecto_id');
    }

}
