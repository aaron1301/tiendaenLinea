<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Pedido;
use App\PedidoDetalle;

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
        $nuevo_pedido=new Pedido;
        $nuevo_pedido->usuario=$datos->user()->id;
        $nuevo_pedido->save();
    	foreach($articulos as $a){
            $nuevo_pedidoDetalle=new PedidoDetalle;
            $nuevo_pedidoDetalle->pedido=$nuevo_pedido->id;    		
    		$nuevo_pedidoDetalle->articulo=$a->codigo;
    		$nuevo_pedidoDetalle->save();
    	}
        $datos->session()->forget('articulos');
        return view('pedidoExitoso');
    }

    public function verPedidos(){
        $pedidos=Pedido::all();
        return view('verPedidos',compact('pedidos'));
    }

    public function verPedido($id){
        $pedidos=PedidoDetalle::where('pedido',$id)
        ->get();
        return view('verPedido',compact('pedidos'));
    }

}
