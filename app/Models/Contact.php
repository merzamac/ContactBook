<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'cedula', 'nombre', 'apellido', 'edad', 'genero', 
        'telefono', 'correo', 'estado_civil', 'direccion', 
        'departamento', 'cargo'
    ];

    // IMPORTANTE: Convierte automáticamente el JSON de la DB a Array de PHP
    protected $casts = [
        'telefono' => 'array',
        'correo' => 'array',
    ];
}
