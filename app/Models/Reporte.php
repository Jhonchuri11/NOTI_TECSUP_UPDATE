<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $table = 'reporte';

    protected $fillable = ['usuariod_id', 'categoria_id', 'administrador_id', 'ubicacion', 'fecha', 'evidencia', 'descripcion', 'estado' ];

    // Se establece la relación belongdTo donde cada reporte pertenece a un usuario, a un administrador y una categoria
    public function user() 
    {
       /// return $this->belongsTo(Usuario::class);
       return $this->belongsTo(User::class, 'usuario_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function administrador()
    {
        //return $this->belongsTo(Administrador::class);
        return $this->belongsTo(Administrador::class, 'administrador_id');
    }

}
