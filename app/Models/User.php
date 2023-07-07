<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo_usuario',
        'password',
        'tipo',
        'alumno_id',
        'profesor_id',
        'personal_id',
        'administrador_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'codigo_usuario_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
    public function profesor() 
    {
        return $this->belongsTo(Profesor::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function administrador()
    {
        return $this->belongsTo(Administrador::class);
    }

    // Recién implementada

    public function reporte()
    {
        return $this->hasMany(Reporte::class, 'usuario_id');
    }
}
