<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\ProductDao;
class ProductController extends Controller
{

    public function get($clienttype, $line, $brand){
        $dao = new ProductDao();
        $res = $dao -> get($clienttype, $line, $brand);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function getByCode($clienttype, $code){
        $dao = new ProductDao();
        $res = $dao -> getByCode($clienttype, $code);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }
}