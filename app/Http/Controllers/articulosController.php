<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Categoria;
use DB;

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
}
