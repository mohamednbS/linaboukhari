<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlerteContrat extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Données pour la vue 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("gmao5657@gmail.com") // L'expéditeur
        ->subject("Alerte Contrat") // Le sujet
        ->view('mail.AlerteContrat'); // La vue
       
    }
}
