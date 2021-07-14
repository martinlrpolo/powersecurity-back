<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Utils\Variables;

class Brand extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'nombre', 
        'CodLinea'
    ];

    //protected $primaryKey = 'id';
    public $timestamps = false;

    public function __construct(){
        $this->connection = Variables::$AWS_MYSQL_DATABASE;
    }

}
