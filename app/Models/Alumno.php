<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumno';


    protected $fillable = ['codigo_alumno', 'nombres', 'ape_paterno', 'ape_materno', 'dni', 'email' ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
