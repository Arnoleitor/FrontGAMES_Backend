<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function createMessage(Request $request){

        $iduser = $request->input('iduser1');
        $iduser = $request->input('iduser2');
        $idchat = $request->input('idchat');
        $message = $request->input('message');

        
        

        try {

            return Message::create(
                [
                    'iduser1' => $idusuario1,
                    'iduser2' => $idusuario2,
                    'idchat' => $idchat,
                    'message'=>$message,

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
    //SEARCH MESSAGES BY ID
    public function MessagebyID($id){


        try {
            $Message = Message::all()
            ->where('id', "=", $id);
            return $Message;
    
        } catch (QueryException $error) {
    
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }
    //DELETE MessageS BY ID
    public function deleteMessage($id){

        try {
            $arrayMessage = Message::all()
            ->where('id', '=', $id);

            $Message = Message::where('id', '=', $id);
            
            if (count($arrayMessage) == 0) {
                return response()->json([
                    "data" => $arrayMessage,
                    "message" => "No se ha encontrado el Message"
                ]);
            }else{
                $Message->delete();
                return response()->json([
                    "data" => $arrayMessage,
                    "message" => "Message borrado correctamente"
                ]);
            }

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
            }
        }
        //SHOW ALL MESSAGES
        public function showAllMessage(){
    
            try {
                
            return Message::all();
    
            } catch(QueryException $error) {
                return $error;
            }
        }
    }

