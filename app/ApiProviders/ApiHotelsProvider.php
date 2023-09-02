<?php

namespace App\ApiProviders;

abstract class ApiHotelsProvider {
    protected $api_key;
    protected $secret_key;
    protected $url;
    protected $check_in;
    protected $check_out;

    public abstract function getHotelsDetailsByCode($codes);
    public abstract function getHotelsByGeolocation($lat, $lng, $radius = 20, $unit = 'km');
    public abstract function sendGet($url);
    public abstract function sendPost($url, $data);
    public function setCheckIn( $check_in ): void
    {
        $this->check_in = $check_in;
    }
    
    public function setCheckOut( $check_out ): void
    {
        $this->check_out = $check_out;
    }
    

}