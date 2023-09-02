<?php

namespace App\ApiResponses;

class HotelBedsResponse extends ApiHotelProviderResponse
{
    
    public static function getByGeolocation( $hotels )
    {
    
    }
    
    public static function getHotelsForMainPage( $hotels )
    {
        $hotels =  collect($hotels)->map(function ( $hotel) {
            return [
                'provider' => "hotelbeds",
                "code" => $hotel->code,
                "name" => $hotel->name,
                'star_rate' => $hotel->categoryName,
                'location' => $hotel->location,
                'min_rate' => $hotel->minRate,
                'images' => $hotel->images,
                'facilities' => $hotel->facilities
            ];
        })->toArray();
        
        dd($hotels['133705']['facilities']);
    }
}