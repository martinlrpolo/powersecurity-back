<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'servicios';
    protected $fillable = [
        'id',
        'nombre', 
        'descripcion',
        'imagen',
        'eliminado'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
