<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use App\Articulo;
use App\User;
use App\Pedido;
use Illuminate\Support\Facades\Gate;
use DB;

class principalController extends Controller
{
    public function home(){
    	$categorias=Categoria::all();
        $articulos_populares=Articulo::join(DB::raw('(select articulo,avg(valor) as prom from calificacion group by articulo order by prom desc limit 10) as c'),'c.articulo','=','codigo')
        ->get();
    	return view('inicio',compact('categorias','articulos_populares'));
    }

    public function carritodeCompras(){
        $articulos=Articulo::join('carrito','codigo',"=",'carrito.articulo')
        ->where('usuario',Auth::id())
        ->get();
        $total=0;
        foreach ($articulos as $a) {
            $total=$total+($a->cantidad*$a->precio);
        }       

        return view('carritodeCompra',compact('articulos','total'));
    }

    public function administrar(){
    	return view('layouts.administrar');
    }

    public function nuevoArticulo(){
        $categorias=Categoria::all();
    	return view('nuevoArticulo',compact('categorias'));
    }

    public function importarCSV(){
        return view('configArticulosCSV');
    }

    public function nuevaCategoria(){
        return view('nuevaCategoria');
    }

    public function verPerfil($id){
        $usuario=User::find($id);
        $pedidos=Pedido::where('usuario',$id)->get();
        if (Gate::allows('ver_perfil', $id)){
           return view('perfil',compact('usuario','pedidos')); 
        }else{
           return view('accesoDenegado');
        }

        
    }
}
