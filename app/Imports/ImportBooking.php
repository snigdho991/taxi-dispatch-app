<?php

namespace App\Imports;

use App\Models\Booking;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\Importable;
// use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

use Session;

class ImportBooking implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function startRow(): int
    {
        return 1;
    }

    public  function curl_get_contents($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 50000);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function model(array $row)
    {
        if ($row[0] === null || $row[1] === null) {
            return null;
        }

        $find_booking = Booking::where('booking_id', $row[1])->first();
        $add = rawurlencode($row[4]);
        $url = "https://maps.google.com/maps/api/geocode/json?sensor=false&key=AIzaSyD4OmxQMXLSUnvCBu4D46G-f4HqbKx75_c&address=".$add;
        $response = json_decode($this->curl_get_contents($url), true);

        global $d_city;

        foreach ($response['results'][0]['address_components'] as $address_componenets) {
            if ($address_componenets["types"][0] == "locality") {
                $d_city = $address_componenets["long_name"];
            }   
        }

        if ($find_booking) {
            Session::put('error', 'Any of the uploaded Booking ID already exists! File NOT uploaded.'); 
        } else {
            return new Booking([
                'arrival_date'    => $row[0],
                'booking_id'      => $row[1],
                'name'            => $row[2],
                'contact_number'  => $row[3],
                'origin'          => $row[4],
                'destination'     => $row[5],
                'job_time'        => $row[6],
                'passenger_count' => $row[7],
                'luggage_count'   => $row[8],
                'car_type'        => $row[9],
                'flight_number'   => $row[10],
                'projected_price' => $row[11],
                'city'            => $d_city,
            ]);
        }

        // return $booking;
    }

    /*public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            if ($row->filter()->isNotEmpty()) {
                return new Booking([
                    'arrival_date'    => $row[0],
                    'booking_id'      => $row[1],
                    'name'            => $row[2],
                    'contact_number'  => $row[3],
                    'origin'          => $row[4],
                    'destination'     => $row[5],
                    'job_time'        => $row[6],
                    'passenger_count' => $row[7],
                    'luggage_count'   => $row[8],
                    'car_type'        => $row[9],
                    'flight_number'   => $row[10],
                ]);
            }
        }   
    }*/

}
