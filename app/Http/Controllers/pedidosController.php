<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;

class pedidosController extends Controller
{
    public function agregaraCarrito(Request $datos){
    	$articulo=Articulo::find($datos->input('articulo'));    	
    	$datos->session()->push('articulos',$articulo);    	
    	return Redirect('/articuloDetalle/'.$articulo->codigo);    	
    }
}
