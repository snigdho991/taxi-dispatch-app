@extends('layouts.master')
@section('title', 'Combined Bookings')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Combined Bookings (<?php echo $combined_bookings->count(); ?>)</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Combined Bookings</li>
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
                            <h5><span class="text-danger"><b>Combined Bookings (<?php echo $combined_bookings->count(); ?>)</b></span></h5> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" action="{{ route('delete.all.combined') }}" method="post" novalidate="" style="margin-bottom: 10px; ">
                                @csrf
                                    <p style="text-align: center;">
                                        <button type="submit" onclick="return confirm('Are you sure to delete all the combined bookings permanently?')" class="btn btn-danger waves-effect waves-light btn-sm">
                                            <i class="bx bx-trash-alt bx-spin" style="position: relative; top: 1px;"></i> Delete All Rows
                                        </button>
                                    </p>
                                    
                            </form>

                            <h4 class="card-title">Please Notice -> </h4>
                            <p class="card-title-desc">Bookings will be automatically marked as <b class="text-success">Available</b> whenever you will add a price of a <b class="text-info">combined</b> booking. That means drivers will be able to see that particular combined booking and <b>accept</b>. Otherwise the booking will be <b class="text-danger">Not Available</b>.
                            </p>
                            
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Booking ID</th>
                                        <th>Name</th>
                                        <th>Date & Time</th>
                                        <th>Offer</th>
                                        <th style="text-align: center;">Insert Booking Price Action</th>
                                        
                                        <th>Flight Number</th>

                                        <th>Pass.</th>
                                        <th>Luggage</th>

                                        <th>From</th>
                                        <th>To</th>
                                        <th>Phone</th>
                                       
                                        <th>Car</th>

                                        <th style="text-align: center;">Map</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($combined_bookings as $key => $data)
                                        <tr>
                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                            <td>
                                                <span>{!! $data->booking_id !!}</span>

                                                @if($data->price != null)

                                                    <span class="CellWithComment">
                                                        <i class="mdi mdi-arrow-up-bold-circle-outline ms-1 text-success" style="position: relative; top: -4px; cursor: pointer; font-size: 18px; float: right;"></i>
                                                        <span class="CellCommentCom" style="background-color:#556ee6 !important;">Combined</span>
                                                        <span class="CellComment" style="background-color:#34c38f !important;">Available</span>
                                                    </span>

                                                @else

                                                    <span class="CellWithComment">
                                                        <i class="mdi mdi-arrow-down-bold-circle-outline ms-1 text-danger" style="position: relative; top: -4px; cursor: pointer; font-size: 18px; float: right;"></i>
                                                        <span class="CellCommentCom" style="background-color:#556ee6 !important;">Combined</span>
                                                        <span class="CellComment" style="background-color:#f46a6a !important;">Not Available</span>
                                                    </span>

                                                @endif
                                            </td>
                                            <td>{!! $data->name !!}</td>
                                            <td>{!! $data->arrival_date !!}</td>
                                            <td><span style="font-weight: 500;">${{ $data->projected_price }}</span></td>
                                            <td>
                                                @if($data->price)

                                                    <form class="needs-validation" action="{{ route('delete.price') }}" method="post" novalidate="">
                                                    @csrf
                                                        <input type="hidden" name="id" value="{{ $data->id }}">

                                                        <div class="row">
                                                            <div class="col-lg-9 col-sm-6" style="padding-right: 0;">
                                                                <input type="text" class="form-control form-control-sm" id="validationTooltip01" value="${{ $data->price }}" name="price" disabled="">
                                                            </div>

                                                            <div class="col-lg-3 col-sm-6">
                                                                <button type="submit" class="btn btn-danger editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                @else

                                                    <form class="needs-validation" action="{{ route('add.price') }}" method="post" novalidate="">
                                                    @csrf
                                                        <input type="hidden" name="id" value="{{ $data->id }}">

                                                        <div class="row">
                                                            <div class="col-lg-9" style="padding-right: 0;">
                                                                <input type="number" class="form-control form-control-sm" id="validationTooltip02" placeholder="Enter Booking Price" step="0.001" name="price" required="">
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                @endif
                                            </td>

                                            <td>{!! $data->flight_number !!}</td>

                                            <td>{!! $data->passenger_count !!}</td>
                                            <td>{!! $data->luggage_count !!}</td>
                                            
                                            <td>{!! $data->origin !!}</td>
                                            <td>{!! $data->destination !!}</td>
                                            <td>{!! $data->contact_number !!}</td>
                                            
                                            <td>{!! $data->car_type !!}</td>

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
                                                                <button type="submit" onclick="return confirm('Are you sure to delete this uber booking permanently?')" class="btn btn-danger editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
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
            margin-top: -14px !important;
        }

        .CellWithComment{
            position:relative;
        }

        .CellComment{
            display:none;
            position:absolute; 
            z-index:100;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            margin-left: 65px;
        }

        .CellCommentCom{
            display:none;
            position:absolute; 
            z-index:100;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
        }

        .CellWithComment:hover span.CellComment{
            display:block;
        }

        .CellWithComment:hover span.CellCommentCom{
            display:block;
        }

        .form-control:disabled, .form-control[readonly] {
            color: #000 !important;
            background: rgb(142 147 168 / 25%)!important;
        }
    </style>
@endsection