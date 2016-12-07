<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pedido;
use App\PedidoDetalle;


class ConfirmacionPedido extends Mailable
{
    use Queueable, SerializesModels;
    public $pedido;
    public $detalle;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido=$pedido;
        $this->detalle=PedidoDetalle::join('articulo','articulo.codigo','=','articulo')
        ->where('pedido',$pedido->id)->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail');
    }
}
