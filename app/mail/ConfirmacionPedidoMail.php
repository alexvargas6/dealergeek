<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Paquete;

class ConfirmacionPedidoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $paquete;
    // Propiedades y métodos del Mailable

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Paquete $paquete)
    {
        $this->paquete = $paquete;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmacion_pedido')->subject(
            'Confirmación de pedido'
        );
    }
}
