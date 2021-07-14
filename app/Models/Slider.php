<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'id',
        'titulo', 
        'descripcion',
        'imagen',
        'link',
        'eliminado'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
