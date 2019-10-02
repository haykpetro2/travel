<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderApartment extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;
    protected $apartment;
    protected $total;

    public function __construct($request, $apartment, $total)
    {
        $this->request = $request;
        $this->apartment = $apartment;
        $this->total = $total;
    }


    public function build()
    {
        return $this->from($this->request['email'])
            ->markdown('emails.orders.apartment')
            ->with(
                [
                    'request' => $this->request,
                    'apartment' => $this->apartment,
                    'total' => $this->total,
                ]
            );
    }
}
