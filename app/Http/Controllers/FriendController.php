<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use Illuminate\Database\QueryException;
class FriendController extends Controller
{
    //////CREATE NEW FRIEND
    public function newfriend (Request $request){

        
        $iduser1 = $request->input('iduser1');
        $iduser2 = $request->input('iduser2');
        
        

        try {

            return Friend::create(
                [
                   
                    'iduser1' => $iduser1,
                    'iduser2' => $iduser2,
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

    //SEARCH FRIEND BY ID
    public function showfriendByID($id){


    try {
        $Friend = Friend::all()
        ->where('id', "=", $id);
        return $Friend;

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
        }
    }
    
}
    //SEARCH ALL FRIEND
    public function showAllfriend(){
    
        try {
        return Friend::select("friends.*","users.nickname","users.name")
        ->join("users","users.id","=","friends.iduser2")
        ->get();

    } catch(QueryException $error) {
        return $error;
    }
}
    //DELETE FRIEND BY ID
public function deletefriend($id){

    try {
        $arrayFriend = Friend::all()
        ->where('id', '=', $id);

        $Friend = Friend::where('id', '=', $id);
        
        if (count($arrayFriend) == 0) {
            return response()->json([
                "data" => $arrayFriend,
                "message" => "Not found Friend"
            ]);
        }else{
            $Friend->delete();
            return response()->json([
                "data" => $arrayFriend,
                "message" => "Friend deleted succesfully"
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
