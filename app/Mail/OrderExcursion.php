<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderExcursion extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;
    protected $excursion;
    protected $total;
    protected $per_person;


    public function __construct($request, $excursion, $total, $per_person)
    {
        $this->request = $request;
        $this->excursion = $excursion;
        $this->total = $total;
        $this->per_person = $per_person;

    }


    public function build()
    {
        return $this->from($this->request['email'])
            ->markdown('emails.orders.excursion')
            ->with(
                [
                    'request' => $this->request,
                    'excursion' => $this->excursion,
                    'total' => $this->total,
                    'per_person' => $this->per_person,
                ]
            );
    }

}
