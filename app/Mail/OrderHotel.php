<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderHotel extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;
    protected $hotel;
    protected $room;
    protected $total;


    public function __construct($request, $hotel, $room, $total)
    {
        $this->request = $request;
        $this->hotel = $hotel;
        $this->room = $room;
        $this->total = $total;
    }

    public function build()
    {
        return $this->from($this->request['email'])
            ->markdown('emails.orders.hotel')
            ->with(
                [
                    'request' => $this->request,
                    'hotel' => $this->hotel,
                    'room' => $this->room,
                    'total' => $this->total
                ]
            );
    }
}
