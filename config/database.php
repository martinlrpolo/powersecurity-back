<?php
use App\Utils\Variables;
 
return array(

    'default' => Variables::$DEFAULT_DATABASE,

    'connections' => array(

        # Our primary database connection
        Variables::$DEFAULT_DATABASE => array(
            'driver'    => env('DB_CONNECTION'),
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD')
        ),

        # Our secondary database connection
        Variables::$AWS_MYSQL_DATABASE => array(
            'driver'    => 'mysql',
            'host'      => 'ec2-18-188-201-207.us-east-2.compute.amazonaws.com',
            'database'  => 'msd2014',
            'username'  => 'userws',
            'password'  => '123',
            'charset' => 'utf8'
        ),
    ),
);