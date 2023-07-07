<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table = 'profesor';

    protected $fillable = ['codigo_profesor', 'nombres', 'ape_paterno', 'ape_materno', 'dni', 'email'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
