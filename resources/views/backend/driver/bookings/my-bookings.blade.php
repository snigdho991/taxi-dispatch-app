@extends('layouts.master')
@section('title', 'My Bookings')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">My Bookings (<?php echo $my_bookings->count(); ?>)</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Bookings</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if(count($errors) > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <h5><span class="text-success"><b>My Bookings (<?php echo $my_bookings->count(); ?>)</b></span></h5> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($my_bookings as $key => $booking)
                    <div class="col-lg-6 col-sm-6">
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
                                    <span class="text-dark font-size-15"> @if($booking->origin) {!! \Illuminate\Support\Str::limit($booking->origin, 60) !!} @else N/A @endif</span>
                                </p>

                                <p class="mb-1">
                                    <span class="text-muted font-size-14" style="font-weight: 550;">To <i class="dripicons-arrow-right" style="position: relative; top: 3px; left: 2px; margin-right: 3px;"></i> </span> 
                                    <span class="text-dark font-size-15"> @if($booking->destination) {!! \Illuminate\Support\Str::limit($booking->destination, 60) !!} @else N/A @endif</span>
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

                            <p class="text-center" style="margin-bottom: 20px;"><a class="btn btn-dark btn-sm" href="{{ route('view.map', $booking->id) }}"><i class="bx bx-map-pin me-1" style="position: relative; top: 1px;"></i> View Map <i class="bx bxs-right-arrow" style="position: relative; top: 1.3px;"></i></a></p>

                            <span class="text-dark font-size-13 text-center mb-1"> Is the booking completed? </span>

                            <div class="card-footer bg-transparent border-top text-center">
                                
                                <form action="{{ route('complete.booking') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $booking->id }}">
                                    <button class="btn btn-info waves-effect btn-label waves-light" style="width: 100%; font-size: 15px;"> 
                                        <i class="bx bx-check-shield label-icon"></i> Mark As Completed
                                        <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i>
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div> <!-- end row -->

            <p style="text-align: center; margin-top: 10px;"><a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('admin.dashboard') }}"><i class="far fa-arrow-alt-circle-left"></i> Go To Dashboard </a></p>
            <br>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection