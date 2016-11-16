<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentario;

class comentariosController extends Controller
{
     public function comentarArticulo($codigo, Request $datos){
        $coment = new Comentario;
        $coment->contenido=$datos->input('comentario');
        $coment->usuario=$datos->user()->id;
        $coment->articulo=$codigo;
        $coment->save();

        return Redirect('/articuloDetalle/'.$codigo);
    }

    public function moderarComentarios(){
        $comentario = Comentario::all();
        return view('moderarComentarios',compact('comentario'));
    }

    public function moderarComentario($id){
        $comentario = Comentario::find($id);
        return view('moderarComentario',compact('comentario'));
    }

    public function actualizarComentario($id, Request $datos){
        $comentario = Comentario::find($id);
        $comentario->contenido=$datos->input('comentario');
        $comentario->save();

        return Redirect('/moderarComentarios');
    }
}
