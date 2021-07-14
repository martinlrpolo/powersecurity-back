<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MiniSlider extends Model
{
    protected $table = 'mini_sliders';
    protected $fillable = [
        'id',
        'titulo', 
        'descripcion',
        'imagenprincipal',
        'imagensegundaria',
        'link',
        'eliminado'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
