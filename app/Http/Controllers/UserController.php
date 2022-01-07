<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\User;

class UserController extends Controller
{
    public function showAllUser(){

        try {
            
        return User::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
    ////////////////Crear Users////////////////
    // public function addUser(Request $request){//sin id y sin fecha

    //     $email = $request->input('name');
    //     $nombre = $request->input('role');
    //     $password = $request->input('age');
    //     $role = $request->input('surname');
    //     $tipo = $request->input('nickname');
    //     $raza = $request->input('favoritegame');
    //     $edad = $request->input('city');
    //     $localidad = $request->input('email');
    //     $password->input('password');
    //     $idpsn->input('idpsn');
    //     $idsteam->input('idsteam');
    //     $idxbox->input('idxbox');
    //     $idriotgames->input('idnintendo');
    //     $idepicgames->input('idepicgames');
    //     $idactivision->input('idactivision');
    //     $idblizzard->input('idblizzard');
    //     $idriotgames->input('idriotgames');
    //     $iduplay->input('iduplay');
    //     $idbattlenet->input('idbattlenet');
    //     $idbethesda->input('idbethesda');
    //     $table->timestamps();

    //     try {

    //         return User::create(
    //             [
    //                 'name' => $name,
    //                 'role' => $role,
    //                 'age' => $age,
    //                 'surname' => $surname,
    //                 'nickname' => $nickname,
    //                 'favoritegame' => $favoritegame,
    //                 'city' => $city,
    //                 'email' => $email,
    //                 'password' => $password,
    //                 'idpsn' => $idpsn,
    //                 'idsteam' => $idsteam,
    //                 'idxbox' => $idxbox,
    //                 'idnintendo' => $idnintendo,
    //                 'idepicgames' => $idepicgames,
    //                 'idactivision' => $idactivision,
    //                 'idblizzard' => $idblizzard,
    //                 'idnintendo' => $idriotgames,
    //                 'iduplay' => $iduplay,
    //                 'idbattlenet' => $idbattlenet,
    //                 'idbethesda' => $idbethesda,
                    
    //             ]
    //             );

    //     } catch (QueryException $error) {
    //         $codigoError = $error->errorInfo[1];

            
    //             return response()->json([
    //                 'error' => $codigoError
    //             ]);
            
    //     }
        
    // }
   ////////////////update Users////////////////
    public function UpdateUsers (Request $request){

        $id = $request->user()->id;
        $name = $request->input('name');
        $role = $request->input('role');
        $age = $request->input('age');
        $surname = $request->input('surname');
        $nickname = $request->input('nickname');
        $favoritegame = $request->input('favoritegame');
        $city = $request->input('city');
        $email = $request->input('email');
        $idpsn = $request->input('idpsn');
        $idsteam = $request->input('idsteam');
        $idxbox = $request->input('idxbox');
        $idnintendo = $request->input('idnintendo');
        $idepicgames = $request->input('idepicgames');
        $idactivision = $request->input('idactivision');
        $idblizzard = $request->input('idblizzard');
        $idriotgames = $request->input('idriotgames');
        $iduplay = $request->input('iduplay');
        $idbattlenet = $request->input('idbattlenet');
        $idbethesda = $request->input('idbethesda');


        try {

            $findUSer=User::where('id', '=', $id);

            $User = User::where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'role' => $role,
                    'age' => $age,
                    'surname' => $surname,
                    'nickname' => $nickname,
                    'favoritegame' => $favoritegame,
                    'city' => $city,
                    'email' => $email,
                    'idpsn' => $idpsn,
                    'idsteam' => $idsteam,
                    'idxbox' => $idxbox,
                    'idnintendo' => $idnintendo,
                    'idepicgames' => $idepicgames,
                    'idactivision' => $idactivision,
                    'idblizzard' => $idblizzard,
                    'idriotgames' => $idriotgames,
                    'iduplay' => $iduplay,
                    'idbattlenet' => $idbattlenet,
                    'idbethesda' => $idbethesda,
                ]
                );
                return User::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }
    ////////////////Search users by ID ////////////////
    
    public function UsersByID(Request $request){
        $id = $request->user()->id;
       
        try {
            $User = User::all()
            ->where('id', "=", $id);
            return $User;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }

    ////////////////Delete Users ////////////////
    public function DeleteUsers($id){

        

        try {
    ////////////////Delete user by ID////////////////
            $arrayUser = User::all()
            ->where('id', '=', $id);

            $User = User::where('id', '=', $id);
            
            if (count($arrayUser) == 0) {
                return response()->json([
                    "data" => $arrayUser,
                    "message" => "User not found"
                ]);
            }else{
                $User->delete();
                return response()->json([
                    "data" => $arrayUser,
                    "message" => "User deleted successfully"
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
