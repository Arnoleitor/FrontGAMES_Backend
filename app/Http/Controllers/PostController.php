<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\QueryException;
class PostController extends Controller
{
    ////////CREATE NEW POST
    public function newpost (Request $request){
    
        
        $iduser = $request->user()->id;
        $title = $request->input('title');
        $text = $request->input('text');
        $image = $request->input('image');
        
        

        try {

            return Post::create(
                [
                   
                    'iduser' => $iduser,
                    'title' => $title,
                    'text' => $text,
                    'image' => $image,
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

    //SEARCH POST BY ID
    public function showpostByID($id){


    try {
        $Post = Post::all()
        ->where('id', "=", $id);
        return $Post;

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
        }
    }
    
}
    //SEARCH ALL POSTS
    public function showAllpost(){
    
    try {
        
    return Post::all();

    } catch(QueryException $error) {
        return $error;
    }
}
    //DELETE POST BY ID
    public function deletepost($id, Request $request){
    $iduser = $request->user()->id;
    try {
        $arrayPost = Post::all()
        ->where('id', '=', $id);
       
        $Post = Post::where('id', "=", $id)
        ->where('iduser', '=', $iduser)->get();
        if (count($arrayPost) == 0) {
            return response()->json([
                "data" => $arrayPost,
                "message" => "Not found Post"
            ]);
        }
        else if(count($Post) == 0) 
        {
            return response()->json([
                'message' => 'unauthorized'
            ]);
        }
        else{
            $Post[0]->delete();
            return response()->json([
                "data" => $arrayPost,
                "message" => "Post deleted succesfully"
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
