<?php

namespace App\Http\Controllers;

use App\ApiProviders\HotelBedsProvider;
use Illuminate\Http\Request;

class HotelSearchController extends Controller
{
    public function geolocation(Request $request) {
        $provider = new HotelBedsProvider();
        
        $provider->setCheckIn($request->get('check-in'));
        $provider->setCheckOut($request->get('check-out'));
        $lat = $request->get('lat');
        $lng = $request->get('lng');
        $provider->getHotelsByGeolocation($lat, $lng);
    }
    
    public function hotelsDetails($codes) {
        $codes = explode(',', $codes);
        $provider = new HotelBedsProvider();
        $provider->getHotelsDetailsByCode($codes);
    
    }
}
