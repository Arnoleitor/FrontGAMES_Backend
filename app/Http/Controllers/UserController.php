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
        $password->string('password',50);
        $idpsn->string('idpsn',20);
        $idsteam->string('idsteam',20);
        $idxbox->string('idxbox',20);
        $idriotgames->string('idnintendo',50);
        $idepicgames->string('idepicgames',50);
        $idactivision->string('idactivision',30);
        $idblizzard->string('idblizzard',30);
        $idriotgames->string('idriotgames',30);
        $iduplay->string('iduplay',30);
        $idbattlenet->string('idbattlenet',30);
        $idbethesda->string('idbethesda',30);
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

       
        $email = $request->input('name');
        $nombre = $request->input('role');
        $password = $request->input('age');
        $role = $request->input('surname');
        $tipo = $request->input('nickname');
        $raza = $request->input('favoritegame');
        $edad = $request->input('city');
        $localidad = $request->input('email');
        $password->string('password',50);
        $idpsn->string('idpsn',20);
        $idsteam->string('idsteam',20);
        $idxbox->string('idxbox',20);
        $idriotgames->string('idnintendo',50);
        $idepicgames->string('idepicgames',50);
        $idactivision->string('idactivision',30);
        $idblizzard->string('idblizzard',30);
        $idriotgames->string('idriotgames',30);
        $iduplay->string('iduplay',30);
        $idbattlenet->string('idbattlenet',30);
        $idbethesda->string('idbethesda',30);
        $table->timestamps();


        try {

            $Usuario = User::where('id', '=', $id)
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
            $Usuario = User::all()
            ->where('id', "=", $id);
            return $Usuario;

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
            $arrayUsuario = User::all()
            ->where('id', '=', $id);

            $Usuario = User::where('id', '=', $id);
            
            if (count($arrayUsuario) == 0) {
                return response()->json([
                    "data" => $arrayUsuario,
                    "message" => "User not found"
                ]);
            }else{
                $Usuario->delete();
                return response()->json([
                    "data" => $arrayUsuario,
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
