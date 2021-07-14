<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\BrandDao;
use Symfony\Component\HttpFoundation\File;
use Symfony\Component\HttpFoundation\File\MimeType;
class BrandController extends Controller
{

    public function all(){
    	$dao = new BrandDao();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function getLimit($limit){
    	$dao = new BrandDao();
        $res = $dao -> getLimit($limit);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($name){
    	$dao = new BrandDao();
        $res = $dao -> get($name);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function getByLine($line){
    	$dao = new BrandDao();
        $res = $dao -> getByLine($line);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }


    /*
    public function insert(Request $request){
        
        $data = array(
            'title' => $request['title'],
            'description' => $request['description'],
            'link' => $request['link'],
        );
    
        if ($request->file("file")->isValid()){
            $file = $request -> file("file");
            $ext = $file -> getClientOriginalExtension();
            if($ext == "jpg" || $ext == "png"  || $ext == "jpeg"){
                $mime = $file -> getMimeType();
                $data['image'] = 'data:'.$mime.';base64,' . base64_encode(file_get_contents($file));
            }else{
                return response() -> json(["message" => "Invalid image extension"], 400);
            }
        }else{
            return response() -> json(["message" => "Load Image"], 400);
        }

        $dao = new BrandDao();
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
        if ($request->hasFile("file")) {
            if ($request->file("file")->isValid()){
                $file = $request -> file("file");
                $ext = $file -> getClientOriginalExtension();
                if($ext == "jpg" || $ext == "png"  || $ext == "jpeg"){
                    $mime = $file -> getMimeType();
                    $data['image'] = 'data:'.$mime.';base64,' . base64_encode(file_get_contents($file));
                }else{
                    return response() -> json(["message" => "Invalid image extension"], 400);
                }
            }else{
                return response() -> json(["message" => "Load Image"], 400);
            }
        }
        $dao = new BrandDao();
        $res = $dao -> update($id, $data);
        if($res == 1)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new BrandDao();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }
    */


}