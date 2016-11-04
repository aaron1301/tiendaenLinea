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
}
