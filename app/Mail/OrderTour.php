<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderTour extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;
    protected $tour;
    protected $hotel;
    protected $total;

    public function __construct($request, $tour, $hotel, $total)
    {
        $this->request = $request;
        $this->tour = $tour;
        $this->hotel = $hotel;
        $this->total = $total;
    }


    public function build()
    {
        return $this->from($this->request['email'])
            ->markdown('emails.orders.tour')
            ->with(
                [
                    'request' => $this->request,
                    'tour' => $this->tour,
                    'hotel' => $this->hotel,
                    'total' => $this->total,
                ]
            );
    }
}
