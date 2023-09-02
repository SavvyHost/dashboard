<?php

namespace App\ApiProviders;

use App\ApiResponses\HotelBedsResponse;
use App\Models\ApiProvider as Provider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Http;

class HotelBedsProvider extends ApiHotelsProvider
{
    private $imagesPath = "http://photos.hotelbeds.com/giata/bigger/";
    public function __construct() {
        $provider = Provider::where('name', 'hotelbeds')->firstorFail();
        
        $this->api_key = $provider->api_key;
        $this->secret_key = $provider->secret_key;
        $this->url = "https://api.test.hotelbeds.com/";
    }
    
    public function getHotelsByGeolocation( $lat, $lng, $radius = 20, $unit = 'km' )
    {
        $data = [
            'stay' => [
                'checkIn' => $this->check_in,
                'checkOut' => $this->check_out,
            ],
            'geolocation' => [
                "latitude" => $lat,
                "longitude" => $lng,
                "radius" => $radius,
                "unit" => $unit
            ],
            'occupancies' => [
                [
                    'rooms' => 2,
                    'adults' => 2,
                    'children' => 0
                ]
            ],
        ];
        
        $response = $this->sendPost("hotel-api/1.0/hotels", $data);
        $hotels = $response->object()->hotels->hotels;
        $codes = array_map(function ($hotel) {
            return $hotel->code;
        }, $hotels);
        $hotelsDetails = $this->getHotelsDetailsByCode($codes);
        $hotels = collect($hotels)->keyBy('code');
        $hotels = $hotels->map( function ($hotel) use ($hotelsDetails) {
            $hotelDetails = collect($hotelsDetails)->firstWhere('code', $hotel->code);
            
            $hotel->location = $hotelDetails->address->content;
            $hotel->images = collect($hotelDetails->images)->reject(function ($image) {
                return $image->type->description->content == "Room";
            })->map(function ($image) {
                    return $this->imagesPath . $image->path;
            })->take(10);
    
            $hotel->facilities = collect($hotelDetails->facilities)->map(function ($facility) {
                return $facility;
            });
            
            return $hotel;
        
        } );
        HotelBedsResponse::getHotelsForMainPage($hotels);
    }
    
    public function getHotelsDetailsByCode( $codes )
    {
    
        $codes = implode(",", $codes);
        
        $response = $this->sendGet("hotel-content-api/1.0/hotels/$codes/details");
        
        return $response->object()->hotels;
    }
    
    public function sendGet($url)
    {
        $headers = $this->getHeaders();

        $url = $this->url . $url;
        return Http::withHeaders($headers)->get($url);    }
    
    public function sendPost($url, $data)
    {
        $headers = $this->getHeaders();
        $url = $this->url . $url;
        return Http::withHeaders($headers)->post($url, $data);
    }
    
    private function getHeaders() {
        $timestamp = time();
        $signature = hash("sha256", $this->api_key . $this->secret_key . $timestamp);
    
        return [
            'Api-Key' => $this->api_key,
            'X-Signature' => $signature,
            'X-Timestamp' => $timestamp,
        ];
    }
}