<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\User;

use App\Imports\ImportBooking;
use Maatwebsite\Excel\Facades\Excel;

use Session;

class AdminToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Administrator']);
    }

    public function admin_dashboard()
    {
        $total = Booking::all()->count();
        $pending = Booking::where('status', 'Pending')->count();
        $available_bookings = Booking::where([
                ['status', '=', 'Pending'],
                ['price', '!=', null]
            ])->count();
        $not_available_bookings = Booking::where([
                ['status', '=', 'Pending'],
                ['price', '=', null]
            ])->count();
        $accepted = Booking::where('status', 'Accepted')->count();
        $sum = Booking::sum('price');
        $uber = Booking::where('status', 'Uber')->count();

        $users  = User::all()->count();
        $admin  = User::where('role', 'Administrator')->count();
        $driver = User::where('role', 'Driver')->count();

    	return view('backend.administrator.index', compact('total', 'pending', 'available_bookings', 'not_available_bookings', 'accepted', 'sum', 'uber', 'users', 'admin', 'driver'));
    }

    public function import_bookings()
    {
    	return view('backend.administrator.import');
    }

    public function import_files(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        $file = $request->file('file');

        $fileSize = $file->getSize();
        $extension = $file->getClientOriginalExtension();

        $valid_extension = array("csv", "xlsx");

        if(in_array(strtolower($extension), $valid_extension)) {
            if($fileSize <= 2097152) {

                Excel::import(new ImportBooking, $file);

                if (Session::has('error')) {
                    Session::flash('error', 'Any of the uploaded Booking ID already exists! File NOT uploaded.');
                } else {
                    Session::flash('success', 'Bookings Imported Successfully !');
                }

                return redirect()->route('import.bookings');

            } else {
                Session::flash('error', 'File too large. File must be less than 2MB.');
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Invalid Format !');
            return redirect()->back();
        }
    }

    public function pending_bookings()
    {
        $pending = Booking::where(['status' => 'Pending'])->get();
        return view('backend.administrator.bookings.pending', compact('pending'));
    }

    public function accepted_bookings()
    {
        $accepted = Booking::where(['status' => 'Accepted', 'is_uber' => 'no'])->get();
        return view('backend.administrator.bookings.accepted', compact('accepted'));
    }

    public function add_price(Request $request)
    {
        $this->validate($request, [
            'price' => 'required',
        ]);

        $booking = Booking::findOrFail($request->id);
        $booking->price = $request->price;
        $booking->save();

        Session::flash('success', 'Price Added & Booking Added to Available Successfully !');
        return redirect()->back();
    }

    public function delete_price(Request $request)
    {
        $booking = Booking::findOrFail($request->id);
        $booking->price = null;
        $booking->is_uber = 'no';
        $booking->save();

        Session::flash('error', 'Price Deleted & Booking Added to Not Available Successfully !');
        return redirect()->back();
    }

    public function pending_available_bookings()
    {
        $available_bookings = Booking::where([
                ['status', '=', 'Pending'],
                ['price', '!=', null],
                ['is_combine', '=', 'No']
            ])->get();

        return view('backend.administrator.bookings.pending-available-bookings', compact('available_bookings'));
    }

    public function pending_not_available_bookings()
    {
        $not_available_bookings = Booking::where([
                ['status', '=', 'Pending'],
                ['price', '=', null],
                ['is_combine', '=', 'No']
            ])->get();

        return view('backend.administrator.bookings.pending-notavailable-bookings', compact('not_available_bookings'));
    }

    public function delete_booking(Request $request)
    {
        $booking = Booking::findOrFail($request->id);
        $booking->delete();

        Session::flash('error', 'Booking Deleted Permanently !');
        return redirect()->back();
    }

    public function mark_uber(Request $request)
    {
        $booking = Booking::where('id', $request->id)->update(['status' => 'Uber', 'is_uber' => 'yes']);
        
        Session::flash('success', 'Booking is added to Uber list Successfully !');
        return redirect()->back();
    }

    public function uber_list()
    {
        $uber_list = Booking::where([
            ['status', '=', 'Uber'],
            ['price', '!=', null],
            ['is_uber', '=', 'yes']
        ])->get();

        return view('backend.administrator.bookings.uber-bookings', compact('uber_list'));
    }

    public function unmark_uber(Request $request)
    {
        $booking = Booking::where('id', $request->id)->update(['status' => 'Pending', 'is_uber' => 'no']);
        
        Session::flash('success', 'Booking is removed from Uber list and added to Available list Successfully !');
        return redirect()->back();
    }

    public function drivers_list()
    {
        $drivers = User::where([
                ['approved_at', '!=', null],
                ['role', '=', 'Driver']
            ])->get();
        
        return view('backend.administrator.users.drivers-list', compact('drivers'));
    }

    public function delete_all_uber()
    {
        $deletedRows = Booking::where(['status' => 'Uber', 'is_uber' => 'yes'])->delete();

        Session::flash('error', 'All Uber Bookings Deleted Permanently !');
        return redirect()->back();
    }

    public function delete_all_accepted()
    {
        $deletedRows = Booking::where(['status' => 'Accepted', 'is_uber' => 'no'])->delete();

        Session::flash('error', 'All Uber Bookings Deleted Permanently !');
        return redirect()->back();
    }

    public function delete_all_notavailable()
    {
        $deletedRows = Booking::where([
                ['status', '=', 'Pending'],
                ['price', '=', null],
                ['is_combine', '=', 'No']
            ])->delete();

        Session::flash('error', 'All Not Available Bookings Deleted Permanently !');
        return redirect()->back();
    }

    public function delete_all_combined()
    {
        $deletedRows = Booking::where([
                ['status', '=', 'Pending'],
                ['price', '=', null],
                ['is_combine', '=', 'Yes']
            ])->delete();

        Session::flash('error', 'All Combined Bookings Deleted Permanently !');
        return redirect()->back();
    }

    public function delete_all_available()
    {
        $deletedRows = Booking::where([
                ['status', '=', 'Pending'],
                ['price', '!=', null]
            ])->delete();

        Session::flash('error', 'All Available Bookings Deleted Permanently !');
        return redirect()->back();
    }

    public function delete_all_pending()
    {
        $deletedRows = Booking::where(['status' => 'Pending', 'is_uber' => 'no'])->delete();

        Session::flash('error', 'All Pending Bookings Deleted Permanently !');
        return redirect()->back();
    }

    public function approval_list()
    {
        $need_approval = User::where(['approved_at' => null, 'role' => 'Driver'])->get();

        return view('backend.administrator.users.approval-list', compact('need_approval'));
    }

    public function approve_driver(Request $request)
    {
        $approve = User::where(['id' => $request->id, 'role' => 'Driver'])->update(['approved_at' => now()]);

        Session::flash('success', 'Driver Approved and Added to Drivers List Successfully !');
        return redirect()->back();
    }

    public function decline_driver(Request $request)
    {
        $decline = User::where(['id' => $request->id, 'role' => 'Driver'])->first();

        $decline->delete();

        Session::flash('error', 'Driver Declined and Deleted Permanently !');
        return redirect()->back();
    }

    public  function curl_get_contents($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function combine_bookings(Request $request, $frombooking)
    {
        $firstway = Booking::where('booking_id', $frombooking)->first();
        $secway   = Booking::where('booking_id', $request->tobooking)->first();

        $add = rawurlencode($firstway->city);
        $url = "https://maps.google.com/maps/api/geocode/json?sensor=false&key=AIzaSyD4OmxQMXLSUnvCBu4D46G-f4HqbKx75_c&address=".$add;
        $response = json_decode($this->curl_get_contents($url), true);

        global $d_city;

        foreach ($response['results'][0]['address_components'] as $address_componenets) {
            if ($address_componenets["types"][0] == "locality") {
                $d_city = $address_componenets["long_name"];
            }   
        }

        $combined_booking = new Booking();

        $combined_booking->arrival_date    = $firstway->arrival_date .' <b>,</b> '. $secway->arrival_date;
        $combined_booking->booking_id      = $firstway->booking_id .' <b>,</b> '. $secway->booking_id;
        $combined_booking->name            = $firstway->name .' <b>,</b> '. $secway->name;
        $combined_booking->contact_number  = $firstway->contact_number .' <b>,</b> '. $secway->contact_number;
        $combined_booking->origin          = $firstway->origin .' <b>,</b> '. $secway->origin;
        $combined_booking->destination     = $firstway->destination .' <b>,</b> '. $secway->destination;
        $combined_booking->job_time        = $firstway->job_time .' <b>,</b> '. $secway->job_time;
        $combined_booking->passenger_count = $firstway->passenger_count .' <b>,</b> '. $secway->passenger_count;
        $combined_booking->luggage_count   = $firstway->luggage_count .' <b>,</b> '. $secway->luggage_count;
        $combined_booking->car_type        = $firstway->car_type .' <b>,</b> '. $secway->car_type;
        $combined_booking->flight_number   = $firstway->flight_number .' <b>,</b> '. $secway->flight_number;
        $combined_booking->projected_price = $firstway->projected_price + $secway->projected_price;
        $combined_booking->is_combine      = 'Yes';
        $combined_booking->city            = $d_city;

        $combined_booking->save();
        $firstway->delete();
        $secway->delete();

        Session::flash('success', 'Both bookings have been combined !');
        return redirect()->back();
    }

    public function combined_bookings()
    {
        $combined_bookings = Booking::where([
                ['status', '=', 'Pending'],
                ['is_combine', '=', 'Yes']
            ])->get();

        return view('backend.administrator.bookings.combined-bookings', compact('combined_bookings'));
    }

    public function delete_user(Request $request)
    {
        $user = User::where(['id' => $request->user_id, 'role' => 'Driver'])->first();

        $booking = Booking::where(['id' => $request->booking_id, 'user_id' => $request->user_id])->first();
        $booking->user_id = null;
        $booking->status = 'Pending';

        $booking->save();
        $user->delete();

        Session::flash('error', 'Driver Deleted Permanently !');
        return redirect()->back();
    }
}
