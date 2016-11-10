<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class categoriasController extends Controller
{
    public function configCategorias(){
        $categorias = Categoria::all();
        return view('configCategorias',compact('categorias'));
    }

    public function configCategoria($id){
        $categoria = Categoria::find($id);
        return view('configCategoria',compact('categoria'));
    }

    public function actualizarCategoria($id, Request $datos){
        $categoria= Categoria::find($id);
        $categoria->nombre=$datos->input('nombre');
        $categoria->save();

        return Redirect('configurarCategorias'); 
    }

    public function nuevaCategoria(Request $datos){
        $nuevo = new Categoria;
        $nuevo->nombre=$datos->input('nombre');
        $nuevo->save();

        return Redirect('configurarCategorias');
    } 
}
