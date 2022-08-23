<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $fillable = ['codigo_env', 'id_producto', 'ciudad_origen', 'ciudad_destino'];
}
