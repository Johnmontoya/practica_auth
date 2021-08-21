<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Image;

class ProductoController extends Controller
{
    public function index(){

        $productos = Producto::all();
 
        return view('productos.index', compact('productos'));
        
     }
 
    public function indexApi(){
 
         try{
 
             $productos = Producto::all();
 
             return response()->json([
                 'success' => true,
                 'productos' => $productos
             ]);
 
         } catch(Exception $e){
 
             return response()->json([
                 'error' => $e
             ]);
         }
 
    }

    public function show(){
 
        return view('productos.crear');
        
     }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required'
        ]); 

        $extension = $request->file('photo');
        $mime = Image::make($extension)->mime();
        $ext = substr($mime, 6);

        //Guardar
        $productos = new Producto();
        $productos->nombre = $request->get('nombre');
        $productos->descripcion = $request->get('descripcion');
        $productos->precio = $request->get('precio');
        $productos->photo = '.'.$ext;
        $productos->save();
        
        //Obtenemos el id del registro
        $id = $productos->id;

        //Generamos el nombre del archivo
        $file_name = $id.'.'.$ext;

        Image::make($request->file('photo'))
        ->resize(250, 250)
        ->save(public_path("img/productos/".$file_name));        

        return redirect()->route('productos.index')
            ->with('success', 'Producto guardado correctamente!');
    }

    public function storeApi(Request $request){

        try{

            $extension = $request->file('photo');
            $mime = Image::make($extension)->mime();
            $ext = substr($mime, 6);

            $productos = new Producto([
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'precio' => $request->get('precio'),
                'photo' => '.'.$ext
            ]);
    
            $productos->save();

            //Obtenemos el id del registro
            $id = $productos->id;

            //Generamos el nombre del archivo
            $file_name = $id.'.'.$ext;

            Image::make($request->file('photo'))
            ->resize(250, 250)
            ->save(public_path("img/productos/".$file_name));  
    
            return response()->json([
                'success' => true,
                'message' => 'El producto se guardo correctamente!',
                'registrado' => $productos
            ], 200);

        } catch(Exception $e){

            return response()->json([
                'error' => $e
            ]);

        }
        
    }

    public function edit($id){
        
        $productos = Producto::find($id);

        return view('productos.editar', compact('productos'));
        
    }

    public function update(Request $request, $id){        
        
        $extension = $request->file('photo');
        $mime = Image::make($extension)->mime();
        $ext = substr($mime, 6);

        //Generamos el nombre del archivo
        $file_name = $id.'.'.$ext;

        Image::make($request->file('photo'))
        ->resize(250, 250)
        ->save(public_path("img/productos/".$file_name)); 

        $productos = Producto::find($id); 
        $productos->nombre = $request->get('nombre');
        $productos->descripcion = $request->get('descripcion');
        $productos->precio = $request->get('precio');
        $productos->photo = '.'.$ext;

        $productos->update();

        return redirect()->route('productos.index')
            ->with('success', 'Producto guardado correctamente!');

    }

    public function updateApi(Request $request, $id){

        try{

            $productos = Producto::find($id);

            $extension = $request->file('photo');
            $mime = Image::make($extension)->mime();
            $ext = substr($mime, 6);

            //Generamos el nombre del archivo
            $file_name = $id.'.'.$ext;

            Image::make($request->file('photo'))
            ->resize(250, 250)
            ->save(public_path("img/productos/".$file_name));  

            $productos->nombre = $request->get('nombre');
            $productos->descripcion = $request->get('descripcion');
            $productos->precio = $request->get('precio');
            $productos->photo = '.'.$ext;    
            $productos->save();
    
            return response()->json([
                'success' => true,
                'message' => 'El producto se ha actualizado correctamente!',
                'actualizado' => $productos
            ], 200);

        } catch(Exception $e){

            return response()->json([
                'error' => $e
            ]);

        }

    }


    public function destroy($id){

        $productos = Producto::find($id);
        $productos->delete();

        return redirect()->route('productos.index')
        ->with('success', 'El producto eliminado corractemente!');
    }

    public function destroyApi($id){

        try{
            $productos = Producto::find($id);
            $productos->delete();

            return response()->json([
                'success' => true,
                'message' => 'El producto eliminado correctamente!'
            ]);

        } catch(Exception $e){

            return response()->json([
                'error' => $e
            ]);

        }

    }
}
