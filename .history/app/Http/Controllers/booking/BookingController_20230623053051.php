<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Tour;
use App\Models\Room;
use App\Models\RoomAttr;
use App\Models\RoomType;



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
        $room = Room::with('meals', 'types')->find($id);

        if (!$room) {
            abort(404);
        }

        return view('rooms.room-booking', compact('room'));
    }



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         // 'type' => 'required|in:tour,room',
    //         // 'title' => 'required|string',
    //         // 'start_date' => 'required|date',
    //         // 'end_date' => 'required|date',
    //         // 'payment_method' => 'required|string',
    //     ]);
    //     // $roomprice = Room::where('price')->find($id);

    //     $booking = new Booking();
    //     $booking->type = $request->input('type');
    //     // $booking->type = $request->input('type');
    //     $booking->title = $request->input('title');
    //     $booking->start_date = $request->input('start_date');
    //     $booking->end_date = $request->input('end_date');
    //     $booking->order_date = now();
    //     $booking->status = 'pending';
    //     // $booking->price = $roomprice;
    //     $booking->customer = auth()->user()->id;
    //     $booking->payment_method = $request->input('payment_method');

    //     if ($booking->type === 'tour') {
    //         $tour = Tour::where('title', $booking->title)->first();

    //         if (!$tour) {
    //             return redirect()->back()->with('error', 'Tour not found');
    //         }

    //         $booking->booking_price = $tour->price;
    //     } elseif ($booking->type === 'room') {
    //         $room = Room::where('name', $booking->title)->first();

    //         if (!$room) {
    //             return redirect()->back()->with('error', 'Room not found');
    //         }

    //         $booking->booking_price = $room->price;
    //     }
    //     $booking->total = 0;
    //     $booking->invoice_id =  date('YmdHis') . rand(10, 9999);


    //     $booking->save();

    //     return redirect()->back()->with('success', 'Booking created successfully');
    // }


    public function store(Request $request)
{
    $request->validate([
        // 'type' => 'required|in:tour,room',
        // 'title' => 'required|string',
        // 'start_date' => 'required|date',
        // 'end_date' => 'required|date',
        // 'payment_method' => 'required|string',
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

    $booking->booking_price = $this->getBookingPrice($booking->type, $booking->title);
    if ($booking->booking_price === null) {
        return redirect()->back()->with('error', 'Booking price not found');
    }

    $booking->total = 1;
    $booking->invoice_id = $this->generateInvoiceId();

    $booking->save();

    return redirect()->back()->with('success', 'Booking created successfully');
}

private function getBookingPrice($type, $title)
{
    if ($type === 'tour') {
        $tour = Tour::where('title', $title)->first();
        return $tour ? $tour->price : null;
    } elseif ($type === 'room') {
        $room = Room::where('name', $title)->first();
        return $room ? $room->price : null;
    }

    return null;
}

private function generateInvoiceId()
{
    return date('YmdHis') . rand(10, 9999);
}






public function store_api(Request $request)
{
    $request->validate([
        // 'type' => 'required|in:tour,room',
        // 'title' => 'required|string',
        // 'start_date' => 'required|date',
        // 'end_date' => 'required|date',
        // 'payment_method' => 'required|string',
    ]);

    $booking = new Booking();
    $booking->type = $request->input('type');
    $booking->title = $request->input('title');
    $booking->start_date = $request->input('start_date');
    $booking->end_date = $request->input('end_date');
    $booking->order_date = now();
    $booking->status = 'pending';
    $booking->customer = 1;
    $booking->payment_method = $request->input('payment_method');

    $booking->booking_price = $this->getBookingPrice($booking->type, $booking->title);
    if ($booking->booking_price === null) {
        return redirect()->back()->with('error', 'Booking price not found');
    }

    $booking->total = 1;
    $booking->invoice_id = $this->generateInvoiceId();

    $booking->save();

    return response()->json(['booking'=>$booking]);
}









}
