<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

use App\Models\User;

class AuthController extends Controller
{
    //USER SIGNUP
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function userRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required|min:4',
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'age' => $request->age,
            'surname' => $request->surname,
            'nickname' => $request->nickname,
            'favoritegame' => $request->favoritegame,
            'city' => $request->city,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'idpsn' => $request->idpsn,
            'idsteam' => $request->idsteam,
            'idxbox' => $request->idxbox,
            'idnintendo' => $request->idnintendo,
            'idepicgames' => $request->idepicgames,
            'idactivision' => $request->idactivision,
            'idblizzard' => $request->idblizzard,
            'idriotgames' => $request->idriotgames,
            'iduplay' => $request->iduplay,
            'idbattlenet' => $request->idbattlenet,
            'idbethesda' => $request->idbethesda,
           
         
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }

    //USER LOGIN
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function userLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
