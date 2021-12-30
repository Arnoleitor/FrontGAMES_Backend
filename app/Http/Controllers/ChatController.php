<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Database\QueryException;
class ChatController extends Controller
{
    public function createChat(Request $request){

        $idfriends = $request->input('idfriends');


        

        try {

            return Chat::create(
                [
                    'idfriends' => $idfriends,
                

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
    //SEARCH CHATS BY ID
    public function ChatbyID($id){


        try {
            $Chat = Chat::all()
            ->where('id', "=", $id);
            return $Chat;
    
        } catch (QueryException $error) {
    
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }
    //DELETE ChatS BY ID
    public function deleteChat($id){

        try {
            $arrayChat = Chat::all()
            ->where('id', '=', $id);

            $Chat = Chat::where('id', '=', $id);
            
            if (count($arrayChat) == 0) {
                return response()->json([
                    "data" => $arrayChat,
                    "message" => "No se ha encontrado el Message"
                ]);
            }else{
                $Chat->delete();
                return response()->json([
                    "data" => $arrayChat,
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
        //SHOW ALL CHATS
        public function showAllChat(){
    
            try {
                
            return Chat::all();
    
            } catch(QueryException $error) {
                return $error;
            }
        }
    }

