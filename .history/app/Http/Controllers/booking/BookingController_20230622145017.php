<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Tour;
use App\Models\Room;



class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::with('customer_details')->get();
        return view ('booking.booking-list',compact('booking'));
    }


    public function show($room_id)
    {
        $room = Room::find($room_id);
        $attrs = RoomAttr::all();
        $types = RoomType::get();

        return view('rooms.room-booking',compact('room','types','attrs'));
    }

    public function detail_4_booking($id)
    {
        $rooms = Room::with('meals', 'types')->find($id);

        if (!$rooms) {
            abort(404);
        }

        return view('rooms.room-booking', compact('rooms'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:tour,room',
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        $booking = new Booking();
        $booking->type = $request->input('type');
        $booking->title = $request->input('title');
        $booking->start_date = $request->input('start_date');
        $booking->end_date = $request->input('end_date');
        $booking->order_date = now();
        $booking->status = 'pending';
        $booking->customer = auth()->user()->id;
        $booking->payment_method = $request->input('payment_method');

        if ($booking->type === 'tour') {
            $tour = Tour::where('title', $booking->title)->first();

            if (!$tour) {
                return redirect()->back()->with('error', 'Tour not found');
            }

            $booking->booking_price = $tour->price;
        } elseif ($booking->type === 'room') {
            $room = Room::where('name', $booking->title)->first();

            if (!$room) {
                return redirect()->back()->with('error', 'Room not found');
            }

            $booking->booking_price = $room->price;
        }

        $booking->save();

        // return redirect()->route('booking.success')->with('success', 'Booking created successfully');
        return redirect()->back()->with('success', ' Added Successfully');
    }














}
