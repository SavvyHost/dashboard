<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;



class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::with('customer_details')->get();
        return view ('booking.booking-list',compact('booking'));
    }

















}
