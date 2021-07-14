<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\TeamDao;
use Symfony\Component\HttpFoundation\File;
use Symfony\Component\HttpFoundation\File\MimeType;
class TeamController extends Controller
{

    public function all(){
    	$dao = new TeamDao();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function getLimit($limit){
    	$dao = new TeamDao();
        $res = $dao -> getLimit($limit);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new TeamDao();
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

        $dao = new TeamDao();
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
        $dao = new TeamDao();
        $res = $dao -> update($id, $data);
        if($res == 1)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new TeamDao();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}