<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class principalController extends Controller
{
    public function home(){
    	$categorias=Categoria::all();
    	return view('inicio',compact('categorias'));
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
}
