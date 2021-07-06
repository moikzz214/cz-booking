<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function store(Request $request)
    {
        
        $arrDetail = array( 
            'name' => $request['name'],
            'phone' => $request['phone']);

        $item = Booking::create($arrDetail);
       
        return response()->json([ 
            'success'   => true,
            'message' => 'Booked Successfully!'
        ], 200);
    }

    public function fetch()
    {
        $booking = Booking::orderBy('created_at', 'desc')->get();

        return response()->json($booking, 200);
    }
    
}
