<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\Articulo;
use App\User;
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
        if (session()->has('articulos')){
            $articulos=session()->get('articulos');                                     
        }else{
            $articulos=null;
        }             

        return view('carritodeCompra',compact('articulos'));
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
        if (Gate::allows('ver_perfil', $id)){
           return view('perfil',compact('usuario')); 
        }else{
            return view('accesoDenegado');
        }

        
    }
}
