<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Modelos\ControlPiso\CP_PLANIFICACION;

class Produccion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $CP_PLANIFICACION;
    public $cp_planificacion2;

    public function __construct(CP_PLANIFICACION $CP_PLANIFICACION)
    {
       $this->CP_PLANIFICACION=$CP_PLANIFICACION;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.OrdenProducion');
    }
}
