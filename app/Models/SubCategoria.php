<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategoria extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'descripcion',
        'estado',
        'categorias_id'
    ];
}
