<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

       $usuarios = User::all();

       return view('usuarios.index', compact('usuarios'));
       
    }

    public function indexApi(){

        try{

            $usuarios = User::all();

            return response()->json([
                'success' => true,
                'usuarios' => $usuarios
            ]);

        } catch(Exception $e){

            return response()->json([
                'error' => $e
            ]);
        }

    }

    public function destroy($id){

        $borrar = User::find($id);
        $borrar->delete();

        return redirect()->route('usuarios.index')
        ->with('success', 'Usuario eliminado corractemente!');
    }

    public function destroyApi($id){

        try{
            $borrar = User::find($id);
            $borrar->delete();

            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado correctamente!'
            ]);

        } catch(Exception $e){

            return response()->json([
                'error' => $e
            ]);

        }

    }
}
