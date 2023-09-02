<?php

namespace App\ApiResponses;

abstract class ApiHotelProviderResponse
{
    abstract public static function getHotelsForMainPage( $hotels );
    abstract public static function getByGeolocation($hotels);
    
}