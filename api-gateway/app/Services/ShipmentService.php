<?php

namespace App\Services;

use App\Traits\CallExternalService;

class ShipmentService
{
    use CallExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.lunar_shipment.base_uri');
    }


    public function getShipmentTime($earth_time)
    {
        return $this->executeRequest('GET', '/get_lunar_shipment_time', array('earth_time' =>$earth_time));
    }
}