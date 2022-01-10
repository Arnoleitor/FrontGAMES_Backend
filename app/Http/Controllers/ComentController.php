<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coment;
use Illuminate\Database\QueryException;
class ComentController extends Controller
{
    //////////CREATE NEW COMENT\\\\\\\\\\\
    public function newcoment (Request $request){

        
        $iduser = $request->input('iduser');
        $idpost= $request->input('idpost');
        $coment = $request->input('coment');
     
        
        

        try {

            return Coment::create(
                [
                   
                    'iduser' => $iduser,
                    'idpost' => $idpost,
                    'coment' => $coment,
                    
                ]
            );

        } catch (QueryException $error) {
            echo"error";
            $codigoError = $error->errorInfo[1];

            if($codigoError){
                return "Error $codigoError";
            }
            
        }
}

    //SEARCH COMENT BY ID\\
    public function showcomentByID($id){


    try {
        $Coment = Coment::all()
        ->where('id', "=", $id);
        return $Coment;

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
        }
    }
    
}
    //SEARCH ALL COMENT\\
    public function showAllcoment(){
    
    try {
    return Coment::select("*")
    ->join("users","users.id","=","coments.iduser")
    ->get();

    } catch(QueryException $error) {
        return $error;
    }
}
    //DELETE COMENT BY ID\\
public function deletecoment($id){

    try {
        $arrayComent = Coment::all()
        ->where('id', '=', $id);

        $Coment = Coment::where('id', '=', $id);
        
        if (count($arrayComent) == 0) {
            return response()->json([
                "data" => $arrayComent,
                "message" => "Not found Coment"
            ]);
        }else{
            $Coment->delete();
            return response()->json([
                "data" => $arrayComent,
                "message" => "Coment deleted succesfully"
            ]);
        }

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
            }

        }
    }
}
