<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'empleados';
    protected $fillable = [
        'id',
        'nombres', 
        'cargo',
        'descripcion',
        'email',
        'telefono',
        'eliminado'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
