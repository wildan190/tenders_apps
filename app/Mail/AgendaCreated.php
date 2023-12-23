<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\AgendaRapat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AgendaCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $agendaRapat; // Pastikan propertinya telah dideklarasikan

    public function __construct($agendaRapat)
    {
        $this->agendaRapat = $agendaRapat;
    }

    public function build()
    {
        return $this->view('emails.agenda-created')
            ->subject('Agenda Rapat Baru: ' . $this->agendaRapat->title)
            ->with(['agendaRapat' => $this->agendaRapat]);
    }
}
