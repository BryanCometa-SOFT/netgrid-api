<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class UserController extends Controller
{
    public function update(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|max:255',
        ],
        [
            'required' => 'El campo :attribute es requerido',
            'email' => 'El email :attribute ya está registrado'
        ]);

        if($validator->fails()){
            return response()->json(["mensaje" => "Los campos de nombre y email son obligatorios","data" => $validator->errors()], 400);
        }

        $validEmail = User::where('id', Auth::user()->id)
        ->where("email", $request->email)
        ->count();

        if($validEmail > 1){
            return response()->json(["mensaje" => "El correo ya está registrado"], 400);
        }

        $updateUser = User::where('id', Auth::user()->id)->update($request->all());

        return response()->json(["mensaje" => "Usuario actulizado con exito","data" => $updateUser ], 201);
    }
}
