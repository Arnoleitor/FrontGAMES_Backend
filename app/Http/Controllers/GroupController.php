<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Database\QueryException;
class GroupController extends Controller
{
    ////CREATE NEW GROUP
    public function newgroup (Request $request){

        
        $name = $request->input('name');
        $iduser = $request->input('iduser');
        $idgroup = $request->input('idgroup');
        

        try {

            return Group::create(
                [
                    'name' => $name,
                    'iduser' => $iduser,
                    'idgroup' => $idgroup,
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

    //SEARCH GROUP BY ID
    public function showgroupByID($id){


    try {
        $Group = Group::all()
        ->where('id', "=", $id);
        return $Group;

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
        }
    }
    
}
    //SEARCH ALL GROUP
    public function showAllgroup(){
    
    try {
        
    return Group::all();

    } catch(QueryException $error) {
        return $error;
    }
}
    //DELETE GROUP BY ID
public function Deletegroup($id){

    try {
        $arrayGroup = Group::all()
        ->where('id', '=', $id);

        $Group = Group::where('id', '=', $id);
        
        if (count($arrayGroup) == 0) {
            return response()->json([
                "data" => $arrayGroup,
                "message" => "No se ha encontrado el Group"
            ]);
        }else{
            $Group->delete();
            return response()->json([
                "data" => $arrayGroup,
                "message" => "Group borrado correctamente"
            ]);
        }

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
            }

        }
    }
    //UPDATE GROUP BY ID
    public function Updatetegroup (Request $request,$id){

           
            
        $name = $request->input('name');
        $iduser = $request->input('iduser');
        $idgroup = $request->input('idgroup');
       


        try {
         
            $Group = Group::where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'iduser' => $iduser,
                    'idgroup' => $idgroup,
                   
                ]
                );
                return Group::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
         
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }
}
