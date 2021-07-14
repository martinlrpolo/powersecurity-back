<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\CatalogueDao;
class CatalogueController extends Controller
{

    public function all(){
    	$dao = new CatalogueDao();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new CatalogueDao();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function insert(Request $request){
        
        $data = array(
            'title' => $request['title'],
            'description' => $request['description'],
            'link' => $request['link'],
        );

        $dao = new CatalogueDao();
        $res = $dao -> insert($data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);

    }

    public function update(Request $request){
        $id = $request['id'];

        $data = array(
            'title' => $request['title'],
            'description' => $request['description'],
            'link' => $request['link'],
        );
        
        $dao = new CatalogueDao();
        $res = $dao -> update($id, $data);
        if($res == 1)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new CatalogueDao();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}