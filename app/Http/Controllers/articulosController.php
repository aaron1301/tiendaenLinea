<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Categoria;
use DB;
use Illuminate\Support\Facades\Storage;


class articulosController extends Controller
{
    public function verArticulos($id){
    	$articulos = Articulo::where('categoria',$id)->get();
    	$categorias = Categoria::all();
    	return view('articulosCategoria',compact('articulos','categorias'));
    }

    public function articuloDetalle($codigo){
   		$articulo=Articulo::where('codigo',$codigo)->get();
   		$categorias = Categoria::all();
    	return view('articuloDetalle', compact('articulo','categorias'));
    }

    public function nuevoArticulo(Request $datos){
        $nuevo = new Articulo;
        $nuevo->nombre=$datos->input('nombre');
        $nuevo->precio=$datos->input('precio');
        $nuevo->descripcion=$datos->input('descripcion');
        $nuevo->costo=$datos->input('costo');
        $nuevo->categoria=$datos->input('categoria');
        $nuevo->save();

        return Redirect('administrar');
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

        return Redirect('configurarArticulos');                
    }

    public function generarArticulosCSV(Request $datos){
                    
        
    }
}
