<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'personal';

    protected $fillable = ['codigo_personal', 'nombres', 'ape_paterno', 'ape_materno', 'dni', 'email'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
