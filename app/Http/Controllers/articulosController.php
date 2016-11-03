<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Categoria;

class articulosController extends Controller
{
    public function verArticulos($id){
    	$articulos = Articulo::where('categoria',$id)->get();
    	$categorias = Categoria::all();
    	return view('articulosCategoria',compact('articulos','categorias'));
    }
}
