<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Database\QueryException;
class MessageController extends Controller
{
    //
    public function createmessage (Request $request){
        // $id = $request->message()->id;
       
        $idchat = $request->input('idchat');
        $idferiends = $request->input('idfriends');
        $message = $request->input('message');


        try {
            return Message::create(
                [
                   
                    'idchat' => $idchat,
                    'idfriends' => $idferiends,
                    'message' => $message,
                   
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

    public function showAllmessage(){
    
        try {
            return Post::select("messages.*","users.nickname","users.name")
        ->join("users","users.id","=","messages.iduser")
        ->get();
    
        } catch(QueryException $error) {
            return $error;
        }
    }

    public function deletemessage($id){

        try {
            $arrayMessage = Message::all()
            ->where('id', '=', $id);

            $Message = Message::where('id', '=', $id);
            
            if (count($arrayMessage) == 0) {
                return response()->json([
                    "data" => $arrayMessage,
                    "message" => "Message not found"
                ]);
            }else{
                $Message->delete();
                return response()->json([
                    "data" => $arrayMessage,
                    "message" => "Message deleted successfully"
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
