<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administrador';


    protected $fillable = ['codigo_administrador', 'nombres', 'ape_paterno', 'ape_materno', 'dni', 'email'];

    public function user()
    {    
        return $this->hasOne(User::class);
    }

    public function categoria()
    {   // Esta relación indica que un administrador solo le pertenece muchas categorias
        // return $this->hasOne(Categoria::class);
        return $this->hasMany(Categoria::class);
    }
}
