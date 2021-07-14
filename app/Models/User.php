<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'usuarios';
    protected $fillable = [
        'id',
        'nombres', 
        'correo',
        'telefono',
        'clave',
        'rol',
        'codigo',
        'activo',
        'eliminado'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo(Catalogue::class, 'rol');
    }


}
