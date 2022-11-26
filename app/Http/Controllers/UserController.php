<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request,User $user)
    {
        $user->update($request->all());
        if(Auth::user()->id != $user->id ){
            if($request->rol != 0){
                $user->roles()->sync($request->rol);
            }else{
                $user->roles()->sync(null);
            }
        }
        return redirect()->route('admin.users.edit',$user)
            ->with('info', 'El usuario fue actualizado con exito');
    }
}
