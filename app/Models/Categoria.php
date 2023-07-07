<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $fillable = ['nombre'];

    public function administrador()
    {   // Se establece relacón belongsTo  indica que una categoria pertenece a un administrador
        return $this->belongsTo(Administrador::class);
    }

    public function reporte()
    {   // Relación hasMany lo que indica que una categoria pertecene a varios reportes asociados
        // return $this->hasMany(Reporte::class);
        return $this->hasMany(Reporte::class, 'categoria_id');
    }
}
