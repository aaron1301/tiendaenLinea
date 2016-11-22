<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Pedido;

class pedidosController extends Controller
{
    public function agregaraCarrito(Request $datos){
    	$articulo=Articulo::find($datos->input('articulo'));    	
    	$datos->session()->push('articulos',$articulo);    	
    	return Redirect('/carrito');    	
    }

    public function quitardelCarrito($pos,Request $datos){
        $articulos=session()->get('articulos');
        unset($articulos[$pos]);        
        $datos->session()->put('articulos',$articulos);                     
        return Redirect('/carrito');
    }

    public function completarPedido(Request $datos){
    	$articulos=session()->get('articulos');
    	foreach($articulos as $a){
    		$nuevo_pedido=new Pedido;
    		$nuevo_pedido->usuario=$datos->user()->id;
    		$nuevo_pedido->articulo=$a->codigo;
    		$nuevo_pedido->save();
    	}
        $datos->session()->flush();
        return view('pedidoExitoso'); 

    }

}
