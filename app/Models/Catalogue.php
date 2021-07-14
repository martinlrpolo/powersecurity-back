<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'catalogo';
    protected $fillable = [
        'id',
        'clave', 
        'tipo',
        'descripcion',
        'eliminado'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}
