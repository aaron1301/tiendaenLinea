<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\ConfirmacionPedido;
use App\Articulo;
use App\Pedido;
use App\PedidoDetalle;
use App\User;
use App\Carrito;
use PDF;

class pedidosController extends Controller
{
    public function agregaraCarrito(Request $datos){
        $nuevo=Carrito::updateOrCreate(['usuario'=>$datos->user()->id,'articulo'=>$datos->input('articulo')],
            ['cantidad'=>$datos->input('cantidad')]);
    	return Redirect('/carrito');    	
    }

    public function quitardelCarrito($id){
        $articulo=Carrito::find($id);
        $articulo->delete();                         
        return Redirect('/carrito');
    }

    public function finalizarCompra(Request $datos){
        $usuario=$datos->user();
        $total=$datos->input('total');
    	return view('pago',compact('usuario','total'));        
    }

    public function realizarPago(Request $datos){
        $usuario=$datos->user()->id;
        $direccion=$datos->input('direccion');
        $total=$datos->input('total');
        $pedido=$this->crearPedido($usuario,$direccion,$total);
        //Mail::to($datos->user())->send(new ConfirmacionPedido());        
        return view('pedidoExitoso',compact('pedido'));
    }

    public function crearPedido($usuario,$direccion,$total){
        $articulos=Carrito::where('usuario',$usuario)
        ->get();
        $nuevo_pedido=new Pedido;
        $nuevo_pedido->usuario=$usuario;
        $nuevo_pedido->direccion=$direccion;
        $nuevo_pedido->total=$total;
        $nuevo_pedido->save();
        foreach($articulos as $a){
            $nuevo_pedidoDetalle=new PedidoDetalle;
            $nuevo_pedidoDetalle->pedido=$nuevo_pedido->id;         
            $nuevo_pedidoDetalle->articulo=$a->articulo;
            $nuevo_pedidoDetalle->cantidad=$a->cantidad;
            $nuevo_pedidoDetalle->save();
            $a->delete();
        }
        return $nuevo_pedido;
    }

    public function generarComprobante($id){
        $pedido=Pedido::find($id);
        $detalle=PedidoDetalle::where('pedido',$id)->get();        
        $pdf = PDF::loadView('comprobante', compact('pedido','detalle'));
        return $pdf->stream('comprobante.pdf');        
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
