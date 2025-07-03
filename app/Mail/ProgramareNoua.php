<?php

namespace App\Mail;

use App\Models\Programare;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProgramareNoua extends Mailable
{
    use Queueable, SerializesModels;

    public $programare;

    public function __construct(Programare $programare)
    {
        $this->programare = $programare;
    }

    public function build()
    {
        return $this->subject('Programare Nouă')->view('emails.programare_noua');
    }
}
