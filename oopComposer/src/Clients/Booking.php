<?php

namespace HotelAbc\Clients;

use HotelAbc\Hotels\Room;

class Booking {
    private Client $client;
    private Room $room;
    private String $startDate;
    private String $endDate;
    private PaymentMethodEnum $paymentMethod;
    private int $bookingCode;
    
    public function __construct(
        $client = null,
        $room = null
    )
    {
        if($client){
            $this->client = $client;
        }
        if($room) {
            $this->room = $room;
        }
        
    }

    public function setRoom ($room) {
        $this->room = $room;
    }
    public function setClient ($client) {
        $this->client = $client;
    }
    public function setBookingDate($startDate, $endDate) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function setPaymentMethod(PaymentMethodEnum $paymentMethod ) {
        $this->paymentMethod = $paymentMethod;

    }

}
