<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContacUs extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->from($this->request['email'])
            ->markdown('emails.contact')
            ->with(['request' => $this->request]);
    }
}
