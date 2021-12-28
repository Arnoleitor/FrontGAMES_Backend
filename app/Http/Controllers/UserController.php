<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function addUser(Request $request){//sin id y sin fecha

        $email = $request->input('name');
        $nombre = $request->input('role');
        $password = $request->input('age');
        $role = $request->input('surname');
        $tipo = $request->input('nickname');
        $raza = $request->input('favoritegame');
        $edad = $request->input('city');
        $localidad = $request->input('email');
        $password->input('password');
        $idpsn->input('idpsn');
        $idsteam->input('idsteam');
        $idxbox->input('idxbox');
        $idriotgames->input('idnintendo');
        $idepicgames->input('idepicgames');
        $idactivision->input('idactivision');
        $idblizzard->input('idblizzard');
        $idriotgames->input('idriotgames');
        $iduplay->input('iduplay');
        $idbattlenet->input('idbattlenet');
        $idbethesda->input('idbethesda');
        $table->timestamps();

        try {

            return User::create(
                [
                    'name' => $name,
                    'role' => $role,
                    'age' => $age,
                    'surname' => $surname,
                    'nickname' => $nickname,
                    'favoritegame' => $favoritegame,
                    'city' => $city,
                    'email' => $email,
                    'password' => $password,
                    'idpsn' => $idpsn,
                    'idsteam' => $idsteam,
                    'idxbox' => $idxbox,
                    'idnintendo' => $idnintendo,
                    'idepicgames' => $idepicgames,
                    'idactivision' => $idactivision,
                    'idblizzard' => $idblizzard,
                    'idnintendo' => $idriotgames,
                    'iduplay' => $iduplay,
                    'idbattlenet' => $idbattlenet,
                    'idbethesda' => $idbethesda,
                    
                ]
                );

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];

            
                return response()->json([
                    'error' => $codigoError
                ]);
            
        }
        
    }
   ////////////////Modificar Users////////////////
    public function UpdateUsers (Request $request,$id){

       
        $email = $request->input('email');
        $name = $request->input('name');
        $password = $request->input('password');
        $role = $request->input('role');
        $tipo = $request->input('nickname');
        $raza = $request->input('favoritegame');
        $edad = $request->input('city');
        $localidad = $request->input('email');
        $password->input('password',50);
        $idpsn->input('idpsn',20);
        $idsteam->input('idsteam',20);
        $idxbox->input('idxbox',20);
        $idriotgames->input('idnintendo',50);
        $idepicgames->input('idepicgames',50);
        $idactivision->input('idactivision',30);
        $idblizzard->input('idblizzard',30);
        $idriotgames->input('idriotgames',30);
        $iduplay->input('iduplay',30);
        $idbattlenet->input('idbattlenet',30);
        $idbethesda->input('idbethesda',30);
        $table->timestamps();


        try {

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
                    'password' => $password,
                    'idpsn' => $idpsn,
                    'idsteam' => $idsteam,
                    'idxbox' => $idxbox,
                    'idnintendo' => $idnintendo,
                    'idepicgames' => $idepicgames,
                    'idactivision' => $idactivision,
                    'idblizzard' => $idblizzard,
                    'idnintendo' => $idriotgames,
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
    ////////////////Busqueda por ID Users ////////////////

    public function UsersByID($id){


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

    ////////////////Borrar Users ////////////////
    public function DeleteUsers($id){

        

        try {
    ////////////////BUSCA EL PLAYER POR ID////////////////
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
