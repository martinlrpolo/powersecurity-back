<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Utils\Variables;

class Line extends Model
{
    protected $connection;
    protected $table = 'lineas_prod';
    protected $fillable = [
        'ID',
        'Linea', 
        'url_img'
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public function __construct(){
        $this->connection = Variables::$AWS_MYSQL_DATABASE;
    }

}
