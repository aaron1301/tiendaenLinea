<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Categoria;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;



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
    	return view('articuloDetalle', compact('articulo','categoria'));
    }

    public function nuevoArticulo(Request $datos){
        $nuevo = new Articulo;
        $nuevo->nombre=$datos->input('nombre');
        $nuevo->precio=$datos->input('precio');
        $nuevo->descripcion=$datos->input('descripcion');
        $nuevo->costo=$datos->input('costo');
        $nuevo->categoria=$datos->input('categoria');
        $imagen = $datos->file('imagen')->StoreAs('imagenes/articulos', $codigo.'.jpg');
        $nuevo->save();
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
        $imagen = $datos->file('imagen')->StoreAs('imagenes/articulos', $codigo.'.jpg');                
        $articulo->save();

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
            $nuevo->costo=$a["costo"];
            $nuevo->categoria=$a["categoria"];
            $nuevo->save();
        }
        return Redirect('/configurarArticulos');
        
    }
}
