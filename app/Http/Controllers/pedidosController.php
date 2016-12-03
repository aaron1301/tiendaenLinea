<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Articulo;
use App\Pedido;
use App\PedidoDetalle;
use App\User;
use App\Carrito;

class pedidosController extends Controller
{
    public function agregaraCarrito(Request $datos){
        $nuevo= new Carrito;
        $nuevo->usuario=Auth::id();
        $nuevo->articulo=$datos->input('articulo');
        $nuevo->cantidad=$datos->input('cantidad');
        $nuevo->save();    	    	
    	return Redirect('/carrito');    	
    }

    public function quitardelCarrito($id){
        $articulo=Carrito::find($id);
        $articulo->delete();                         
        return Redirect('/carrito');
    }

    public function finalizarCompra(){
        $usuario=Auth::user();
    	return view('pago',compact('usuario'));        
    }

    public function realizarPago(Request $datos){
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
