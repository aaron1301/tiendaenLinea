<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Categoria;
use App\Calificacion;
use App\Comentario;
use App\User;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;




class articulosController extends Controller
{
    public function verArticulos($id){
    	$articulos = Articulo::where('categoria',$id)->get();
    	$categorias = Categoria::all();
        $categoria=Categoria::find($id);        
    	return view('articulosCategoria',compact('articulos','categorias','categoria'));
    }

    public function articuloDetalle($codigo){
   		$articulo=Articulo::find($codigo);   		
        $categoria=Categoria::find($articulo->categoria);
        $comentarios=Comentario::where('articulo',$codigo)
        ->join('users','users.id','=','usuario')
        ->get();        
        try{
            $calificacion=Calificacion::where('usuario',Auth::id())->where('articulo',$codigo)->firstOrFail();
                   
        }catch(ModelNotFoundException $e){
            $calificacion=null;
            
        }
        
        try {
            $comentario_usuarioactual=Comentario::where('usuario',Auth::id())->where('articulo',$codigo)->firstOrFail();            
        } catch (ModelNotFoundException $e) {
            $comentario_usuarioactual=null;
        }
    	return view('articuloDetalle', compact('articulo','categoria','calificacion','comentarios','comentario_usuarioactual'));
    }

    public function nuevoArticulo(Request $datos){
        $nuevo = new Articulo;
        $nuevo->nombre=$datos->input('nombre');
        $nuevo->precio=$datos->input('precio');
        $nuevo->descripcion=$datos->input('descripcion');
        $nuevo->costo=$datos->input('costo');
        $nuevo->categoria=$datos->input('categoria');
        $nuevo->save();
        if($datos->file('imagen')!=null){
            $imagen = $datos->file('imagen')->StoreAs('imagenes/articulos',$nuevo->codigo.'.jpg');
        }
        
        return Redirect('configurarArticulos');
    } 

    public function configArticulos(){
        $articulos = Articulo::all();
        return view('configArticulos',compact('articulos'));
    }

    public function configArticulo($codigo){
        $articulo = Articulo::find($codigo);
        $categorias = Categoria::all();
        return view('configArticulo',compact('articulo','categorias'));
    }

    public function actualizarArticulo($codigo, Request $datos){
        $articulo= Articulo::find($codigo);
        $articulo->nombre=$datos->input('nombre');
        $articulo->precio=$datos->input('precio');
        $articulo->descripcion=$datos->input('descripcion');
        $articulo->costo=$datos->input('costo');
        $articulo->categoria=$datos->input('categoria');                       
        $articulo->save();
        if($datos->file('imagen')!=null){
            $imagen = $datos->file('imagen')->StoreAs('imagenes/articulos',$nuevo->codigo.'.jpg');
        }
        return Redirect('configurarArticulos');                
    }

    public function generarArticulosCSV(Request $datos){
        $archivo=$datos->file('archivo')->path();                 
        $articulos = array();
        $header = null;
        if (($handle = fopen($archivo, 'r')) !== false){
            while (($fila = fgetcsv($handle, 1000)) !== false){
                if (!$header)
                    $header = $fila;
                else
                    $articulos[] = array_combine($header, $fila);
            }
            fclose($handle);
        }
        foreach($articulos as $a){
            $nuevo = new Articulo;
            $nuevo->nombre=$a["nombre"];
            $nuevo->precio=$a["precio"]; 
            $nuevo->descripcion=$a["descripcion"];            
            $nuevo->costo=$a["costo"];
            $nuevo->categoria=$a["categoria"];
            $nuevo->save();
        }
        return Redirect('/configurarArticulos');
        
    }

    public function calificarArticulo($codigo,Request $datos){
        try{
            $calificacion=Calificacion::where('usuario',$datos->user()->id)->where('articulo',$codigo)->firstOrFail();
            $calificacion->valor=$datos->input('calificacion');
            $calificacion->save();            
        }catch(ModelNotFoundException $e){
            $nuevo = new Calificacion;
            $nuevo->valor=$datos->input('calificacion');
            $nuevo->usuario=$datos->user()->id;
            $nuevo->articulo=$codigo;
            $nuevo->save();
        }       

        return Redirect('/articuloDetalle/'.$codigo);
    }
}