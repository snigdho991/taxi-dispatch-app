@extends('layouts.master')
@section('title', 'Accepted Bookings')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Accepted Bookings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Accepted Bookings (<?php echo $accepted->count(); ?>)</li>
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
                            <h5><span class="text-success"><b>Accepted Bookings (<?php echo $accepted->count(); ?>)</b></span></h5> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" action="{{ route('delete.all.accepted') }}" method="post" novalidate="" style="margin-bottom: 10px; ">
                                @csrf
                                    <p style="text-align: center;">
                                        <button type="submit" onclick="return confirm('Are you sure to delete all the accepted bookings permanently?')" class="btn btn-danger waves-effect waves-light btn-sm">
                                            <i class="bx bx-trash-alt bx-spin" style="position: relative; top: 1px;"></i> Delete All Rows
                                        </button>
                                    </p>
                                    
                            </form>

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Booking ID</th>
                                        <th>Name</th>
                                        
                                        <th>Date & Time</th>
                                        <th>Driver Name</th>
                                        <th>Offer</th>
                                        <th>Price</th>

                                        <th>Flight Number</th>

                                        <th>Passenger</th>
                                        <th>Luggage</th>

                                        <th>From</th>
                                        <th>To</th>

                                        <th>Phone</th>
                                        <th>Car</th>

                                        <th style="text-align: center;">Map</th>
                                        <th style="text-align: center;">Delete</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($accepted as $key => $data)
                                    <?php
                                        $driver = \App\Models\User::findOrFail($data->user_id);
                                    ?>
                                        <tr>
                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                            <td>{{ $data->booking_id }}</td>
                                            <td>{{ $data->name }}</td>
                                            
                                            <td>{{ $data->arrival_date }}</td>
                                            <td><b style="font-weight: 500;"> {{ $driver->name }} </b></td>
                                            <td><b style="font-weight: 500;"> ${{ $data->projected_price }} </b></td>
                                            <td><b style="font-weight: 500;"> ${{ $data->price }} </b></td>

                                            <td>{{ $data->flight_number }}</td>

                                            <td>{{ $data->passenger_count }}</td>
                                            <td>{{ $data->luggage_count }}</td>
                                            
                                            <td>{{ $data->origin }}</td>
                                            <td>{{ $data->destination }}</td>
                                            
                                            <td>{{ $data->contact_number }}</td>
                                            <td>{{ $data->car_type }}</td>

                                            <td style="text-align: center;">
                                                <a class="btn btn-light btn-sm" href="{{ route('view.map', $data->id) }}"><i class="bx bx-map-pin me-1" style="position: relative; top: 1px;"></i> View Map <i class="bx bxs-right-arrow" style="position: relative; top: 1.3px;"></i></a>
                                            </td>
                                            <td style="text-align: center;">
                                                <div style="display: inline-flex;">
                                                    <form class="needs-validation" action="{{ route('delete.booking') }}" method="post" novalidate="">
                                                    @csrf
                                                        <input type="hidden" name="id" value="{{ $data->id }}">

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <button type="submit" onclick="return confirm('Are you sure to delete this accepted booking permanently?')" class="btn btn-danger editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <p style="text-align: center; margin-top: 10px;"><a class="btn btn-primary waves-effect waves-light" href="{{ route('admin.dashboard') }}"><i class="far fa-arrow-alt-circle-left"></i> Go To Dashboard </a></p>
            <br>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection


@section('styles')
    <style type="text/css">
        .table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before {
            margin-top: -10px !important;
        }

        .form-control:disabled, .form-control[readonly] {
            color: #000 !important;
            background: rgb(142 147 168 / 25%)!important;
        }
    </style>
@endsection