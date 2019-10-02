<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class OrderTransport extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;
    protected $transport;
    protected $total;


    public function __construct($request, $transport, $total)
    {
        $this->request = $request;
        $this->transport = $transport;
        $this->total = $total;
    }

    public function build()
    {
        return $this->from($this->request['email'])
            ->markdown('emails.orders.transport')
            ->with(
                [
                    'request' => $this->request,
                    'transport' => $this->transport,
                    'total' => $this->total,
                ]
            );
    }
}
