<?php

namespace App\Http\Controllers\booking;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Tour;
use App\Models\Room;
use App\Models\RoomAttr;
use App\Models\RoomType;



class BookingController extends Controller
{


    public function my_booking(Request $request)
    {
        $my_id = auth()->user()->id;
        $booking = Booking::where('customer', $my_id)->get();
        return view('booking.my-booking-list', compact('booking'));
    }
    public function back_booking(Request $request)
    {
        // $booking = Booking::where('customer', $my_id)->get();

        $hotels = Hotel::with('rooms')->get();
        $users = User::all();


        return view('booking.back-booking-list', compact('users', 'hotels'));
    }




    public function my_booking_api(Request $request)
    {
        $my_id = auth()->user()->id;
        $booking = Booking::where('customer', $my_id)->get();
        return response()->json(['data'=>$booking]);
    }







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








public function store_api(Request $request , $roomId)
{
    $request->validate([
        // 'type' => 'required|in:tour,room',
        // 'room_id' => 'required|integer',
        // 'start_date' => 'required|date',
        // 'end_date' => 'required|date',
        // 'payment_method' => 'required|string',
    ]);


    $room = Room::findOrFail($roomId); // Assuming you have a Room model

    $booking = new Booking();
    $booking->type = '1'; // Assuming the type is always 'room' for this scenario
    $booking->title = $room->name; // Set the title from the room name
    $booking->start_date = $request->input('start_date');
    $booking->end_date = $request->input('end_date');
    $booking->order_date = now();
    $booking->status = 'Pending';
    $booking->customer = 3; // Assuming you want to assign the customer ID dynamically
    $booking->payment_method = 1/* $request->input('payment_method') */;

    $booking->price = $room->price; // Set the booking price from the room's price

    if ($booking->price === null) {
        return response()->json(['error' => 'Booking price not found'], 400);
    }

    $booking->total = 1;
    $booking->invoice_id = $this->generateInvoiceId();

    $booking->save();

    return response()->json(['booking' => $booking]);
}





public function store(Request $request, $id)
{
    $request->validate([
        'type' => 'required|in:tour,room',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'payment_method' => 'required|string',
    ]);

    $booking = new Booking();
    $booking->start_date = $request->input('start_date');
    $booking->end_date = $request->input('end_date');
    $booking->Object_id = $id;
    $booking->order_date = now();
    $booking->status = 'Pending';
    $booking->customer = auth()->user()->id;
    $booking->payment_method = 1;
    // $booking->payment_method = $request->input('payment_method');
    $booking->type = $request->input('type');

    // $type = 'room';
    // $id = $request->input('id');

    // Retrieve the title and price based on the type and ID
    // $title = 'ioioio';
    $title = $this->getTitleFromType($request->input('type'), $id);
    // $price = '10';
    $price = $this->getPriceFromType($request->input('type'), $id);
    if ($title === null || $price === null) {
        return redirect()->back()->with('error', 'Booking details not found');
    }

    // $booking->type = $type;
    $booking->title = $title;
    $booking->price = $price;

    $startDate = Carbon::parse($booking->start_date);
    $endDate = Carbon::parse($booking->end_date);
    $numberOfDays = $endDate->diffInDays($startDate);
    $booking->total = $numberOfDays * $price;
    $booking->invoice_id = $this->generateInvoiceId();

    $booking->save();

    return redirect()->back()->with('success', 'Booking created successfully');
}

private function getTitleFromType($type, $id)
{
    if ($type === 'tour') {
        $tour = Tour::find($id);
        return $tour ? $tour->title : null;
    } elseif ($type === 'room') {
        $room = Room::find($id);
        return $room ? $room->name : null;
    }

    return null;
}

private function getPriceFromType($type, $id)
{
    if ($type === 'tour') {
        $tour = Tour::find($id);
        return $tour ? $tour->price : null;
    } elseif ($type === 'room') {
        $room = Room::find($id);
        return $room ? $room->price : null;
    }

    return null;
}

private function generateInvoiceId()
{
    return date('YmdHis') .substr((string)microtime(true), -4) . rand(10, 9999);
}



private function generateConfrimId($invoiceId)
{
    return $invoiceId .  date('Ymd')  ;
}

public function confirm_booking($id)
{
    $book = Booking::find($id);

    if (!$book) {
        abort(404);
    }

    $book->status = 'Confirmed';
    $book->confirm_id = $this->generateConfrimId($book->invoice_id);
    // $book->confirmation_time = now();
    $book->save();

    return redirect()->back()->with('success', 'Booking created successfully');

}
public function confirm_booking_api($id)
{
    $book = Booking::find($id);

    if (!$book) {
        abort(404);
    }

    $book->status = 'Confirmed';
    $book->confirm_id = $this->generateConfrimId($book->invoice_id);
    // $book->confirmation_time = now();
    $book->save();

    return response()->json(['booking' => $book]);

}

public function reject_booking($id)
{
    $book = Booking::find($id);

    if (!$book) {
        abort(404);
    }

    $book->status = 'Rejected';
    $book->confirm_id = 'Rejected';
    // $book->confirmation_time = now();
    $book->save();

    return redirect()->back()->with('success', 'Booking Rejected successfully');

}
public function reject_booking_api($id)
{
    $book = Booking::find($id);

    if (!$book) {
        abort(404);
    }

    $book->status = 'Rejected';
    $book->confirm_id = 'Rejected';
    // $book->confirmation_time = now();
    $book->save();

    return response()->json(['booking' => $book]);

}



public function cancel_booking($id)
{
    $book = Booking::find($id);

    if (!$book || $book->status !== 'Pending') {
        return redirect()->back()->with('success', 'Booking Have Been Processed');
    }

    $book->delete();

    return redirect()->back()->with('success', 'Booking cancelled successfully');
}







}
