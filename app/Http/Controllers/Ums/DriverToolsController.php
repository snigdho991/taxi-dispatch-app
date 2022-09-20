<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\User;

use Session;
use Auth;

class DriverToolsController extends Controller
{
	public function __construct()
    {
        $this->middleware(['role:Driver']);
    }

    public function wait_approval()
    {
        return view('backend.driver.wait-approval');
    }

    public function driver_dashboard()
    {
    	$auth = Auth::user();
        
        $total = Booking::where([
            ['status', '=', 'Pending'],
            ['city', '=', $auth->city],
            ['price', '!=', null]
        ])->count();

        $my_bookings = Booking::where([
                ['status', '=', 'Accepted'],
                ['price', '!=', null],
                ['user_id', '=', $auth->id]
            ])->count();

        $book_sum = Booking::where('user_id', $auth->id)->sum('price');

    	return view('backend.driver.index', compact('total', 'my_bookings', 'book_sum'));
    }

    public function available_bookings()
    {
        $auth = Auth::user();
        $available_bookings = Booking::where([
                ['status', '=', 'Pending'],
                ['city', '=', $auth->city],
                ['price', '!=', null]
            ])->get();

        return view('backend.driver.bookings.available-bookings', compact('available_bookings'));
    }

    public function accept_booking(Request $request)
    {
    	$auth_id = Auth::user()->id;

    	$booking = Booking::where('id', $request->id)->update(['status' => 'Accepted', 'user_id' => $auth_id]);
        
        Session::flash('success', 'Booking Accepted Successfully !');
        return redirect()->back();
    }

    public function my_bookings()
    {
    	$auth = Auth::user();
        
        $my_bookings = Booking::where([
            ['status', '=', 'Accepted'],
            ['price', '!=', null],
            ['user_id', '=', $auth->id]
        ])->get();

        return view('backend.driver.bookings.my-bookings', compact('my_bookings'));
    }

    public function complete_booking(Request $request)
    {
        $auth_id = Auth::user()->id;

        $booking = Booking::where('id', $request->id)->update(['status' => 'Completed', 'user_id' => $auth_id]);
        
        Session::flash('info', 'Booking is marked as Completed Successfully !');
        return redirect()->back();
    }

    public function completed_bookings()
    {
        $auth = Auth::user();
        
        $completed_bookings = Booking::where([
            ['status', '=', 'Completed'],
            ['price', '!=', null],
            ['user_id', '=', $auth->id]
        ])->get();

        return view('backend.driver.bookings.completed-bookings', compact('completed_bookings'));
    }

}
