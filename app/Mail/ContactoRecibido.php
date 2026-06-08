<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    public function __construct($datos)
    {
        $this->datos = $datos; // Recibe: correo, asunto y mensaje
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->datos['correo']], // Para que al darle "Responder" le responda directo al cliente
            subject: 'CV Web Contacto: ' . $this->datos['asunto'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contacto', // La vista Blade del correo
        );
    }
}
