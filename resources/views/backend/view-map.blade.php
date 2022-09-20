@extends('layouts.master')
@section('title', 'View Booking Map')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View Booking Map</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="@if(Auth::user()->hasRole('Administrator')) {{ route('admin.dashboard') }} @elseif(Auth::user()->hasRole('Driver')) {{ route('driver.dashboard') }} @endif">Dashboard</a></li>
                                <li class="breadcrumb-item active">View Booking Map</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

                @if($booking->is_combine == 'Yes')
                    @if($booking->price != null)
                        <div class="alert bg-primary bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-bell-check-outline me-2"></i>
                            Booking is marked as Combined. Offer Price : <b>${{ $booking->projected_price }}</b>. Original Price : <b>${{ $booking->price }}</b>
                        </div>
                    @else()
                        <div class="alert bg-info bg-gradient text-white" style="text-align: center; font-weight: 550;" role="alert">
                            <i class="mdi mdi-bell-ring-outline me-2"></i>
                            Booking is marked as Combined. Offer Price : <b>${{ $booking->projected_price }}</b>. Set an original price so that booking will be available to the drivers.
                        </div>
                    @endif
                @endif

                @if($booking->is_combine == 'No')
                    <div class="row">
                        <div class="col-lg-7 col-sm-7" style="margin-bottom: 25px !important;">                    
                            <div id="map" data-origin="{{ $booking->origin }}" data-destination="{{ $booking->destination }}" style="height: 450px !important; border: 1px solid #bbb !important;" class="gmaps"></div> 
                        </div>
                    
                        <div class="col-lg-5 col-sm-5">
                            <div class="card">
                                <div class="card-header bg-transparent border-bottom text-muted text-center">
                                    <b class="text-primary text-center" style="font-size: 1rem; font-weight: 550;">Booking Details</b>
                                </div>

                                <div class="card-body">
                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Booking ID <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->booking_id) {!! $booking->booking_id !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Name <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->name) {!! $booking->name !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Phone <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->contact_number) {!! $booking->contact_number !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">From <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->origin) {!! $booking->origin !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">To <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->destination) {!! $booking->destination !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Date & Time <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->arrival_date) {!! $booking->arrival_date !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Flight Number <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->flight_number) {!! $booking->flight_number !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Passengers <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->passenger_count) {!! $booking->passenger_count !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Luggage <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->luggage_count) {!! $booking->luggage_count !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Car <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->car_type) {!! $booking->car_type !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Price <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking->price) <span style="font-weight: 550;">${!! $booking->price !!}</span> @else N/A @endif</span>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div> <!-- end row -->
                @elseif($booking->is_combine == 'Yes')
                    <?php
                        $booking_id = explode("<b>,</b>", $booking->booking_id);
                        $name = explode("<b>,</b>", $booking->name);
                        $contact_number = explode("<b>,</b>", $booking->contact_number);
                        $origin = explode("<b>,</b>", $booking->origin);
                        $destination = explode("<b>,</b>", $booking->destination);
                        $arrival_date = explode("<b>,</b>", $booking->arrival_date);
                        $flight_number = explode("<b>,</b>", $booking->flight_number);
                        $passenger_count = explode("<b>,</b>", $booking->passenger_count);
                        $luggage_count = explode("<b>,</b>", $booking->luggage_count);
                        $car_type = explode("<b>,</b>", $booking->car_type);
                    ?>

                    <div class="row" style="margin-bottom: 40px !important;">
                        <div class="col-lg-7 col-sm-7">                    
                            <div id="map" data-origin="{{ $origin[0] }}" data-destination="{{ $destination[0] }}" style="height: 350px !important; border: 1px solid #bbb !important;" class="gmaps"></div> 
                        </div>

                        <div class="col-lg-5 col-sm-5">
                            <div class="card">
                                <div class="card-header bg-transparent border-bottom text-muted text-center">
                                    <b class="text-primary text-center" style="font-size: 1rem; font-weight: 550;">Booking 'A'</b>
                                </div>

                                <div class="card-body">
                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Booking ID <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking_id) {!! $booking_id[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Name <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($name) {!! $name[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Phone <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($contact_number) {!! $contact_number[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">From <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($origin) {!! $origin[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">To <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($destination) {!! $destination[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Date & Time <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($arrival_date) {!! $arrival_date[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Flight Number <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($flight_number) {!! $flight_number[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Passengers <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($passenger_count) {!! $passenger_count[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Luggage <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($luggage_count) {!! $luggage_count[0] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Car <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($car_type) {!! $car_type[0] !!} @else N/A @endif</span>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 30px !important;">
                        <div class="col-lg-7 col-sm-7">                    
                            <div id="map_b" data-origin="{{ $origin[1] }}" data-destination="{{ $destination[1] }}" style="height: 350px !important; border: 1px solid #bbb !important;" class="gmaps"></div> 
                        </div>

                        <div class="col-lg-5 col-sm-5">
                            <div class="card">
                                <div class="card-header bg-transparent border-bottom text-muted text-center">
                                    <b class="text-primary text-center" style="font-size: 1rem; font-weight: 550;">Booking 'B'</b>
                                </div>

                                <div class="card-body">
                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Booking ID <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($booking_id) {!! $booking_id[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Name <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($name) {!! $name[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Phone <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($contact_number) {!! $contact_number[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">From <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($origin) {!! $origin[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">To <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($destination) {!! $destination[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Date & Time <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($arrival_date) {!! $arrival_date[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Flight Number <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($flight_number) {!! $flight_number[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Passengers <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($passenger_count) {!! $passenger_count[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Luggage <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($luggage_count) {!! $luggage_count[1] !!} @else N/A @endif</span>
                                    </p>

                                    <p class="mb-1">
                                        <span class="text-muted font-size-14" style="font-weight: 550;">Car <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                        <span class="text-dark font-size-15"> @if($car_type) {!! $car_type[1] !!} @else N/A @endif</span>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>
                @endif

            <p style="text-align: center; margin-top: 10px;"><a class="btn btn-primary btn-sm waves-effect waves-light" href="@if(Auth::user()->hasRole('Administrator')) {{ route('admin.dashboard') }} @elseif(Auth::user()->hasRole('Driver')) {{ route('driver.dashboard') }} @endif"><i class="far fa-arrow-alt-circle-left"></i> Go To Dashboard </a></p>
            <br>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection

@section('scripts')
    <script defer
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD4OmxQMXLSUnvCBu4D46G-f4HqbKx75_c"
            type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            var getmap, origin, destination, travel_mode, map;

            // add input listeners
            google.maps.event.addDomListener(window, 'load', function (listener) {
                displayRoute();
            });

            function displayRoute() {
                getmap = document.getElementById('map');
                origin = getmap.getAttribute('data-origin');
                destination = getmap.getAttribute('data-destination');
                travel_mode = 'DRIVING';

                var rendererOptions = {
                    map: getmap,
                    suppressMarkers: false,
                    polylineOptions: {
                      strokeColor: 'blue'
                    }
                };

                var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions, {'draggable': false});
                var directionsService = new google.maps.DirectionsService();

                map = new google.maps.Map(document.getElementById('map'));

                directionsService.route({
                    origin: origin,
                    destination: destination,
                    travelMode: travel_mode,
                    avoidTolls: true
                }, function (response, status) {
                    if (status === 'OK') {
                        directionsDisplay.setMap(map);
                        directionsDisplay.setDirections(response);
                    } else {
                        directionsDisplay.setMap(null);
                        directionsDisplay.setDirections(null);
                        alert('Could not display directions due to: ' + status);
                    }
                });
            }
        });

        $(function () {
            var getmap, origin, destination, travel_mode, map;

            // add input listeners
            google.maps.event.addDomListener(window, 'load', function (listener) {
                displayRoute();
            });

            function displayRoute() {
                getmap = document.getElementById('map_b');
                origin = getmap.getAttribute('data-origin');
                destination = getmap.getAttribute('data-destination');
                travel_mode = 'DRIVING';

                var rendererOptions = {
                    map: getmap,
                    suppressMarkers: false,
                    polylineOptions: {
                      strokeColor: 'blue'
                    }
                };

                var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions, {'draggable': false});
                var directionsService = new google.maps.DirectionsService();

                map = new google.maps.Map(document.getElementById('map_b'));

                directionsService.route({
                    origin: origin,
                    destination: destination,
                    travelMode: travel_mode,
                    avoidTolls: true
                }, function (response, status) {
                    if (status === 'OK') {
                        directionsDisplay.setMap(map);
                        directionsDisplay.setDirections(response);
                    } else {
                        directionsDisplay.setMap(null);
                        directionsDisplay.setDirections(null);
                        alert('Could not display directions due to: ' + status);
                    }
                });
            }
        });
    </script>
@endsection