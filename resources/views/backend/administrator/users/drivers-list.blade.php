@extends('layouts.master')
@section('title', 'Drivers List')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Drivers List (<?php echo $drivers->count(); ?>)</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Drivers List</li>
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
                            <h5><span class="text-success"><b>Drivers List (<?php echo $drivers->count(); ?>)</b></span></h5> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Driver Name</th>
                                        <th>E-mail</th>
                                        <th>Booking ID</th>
                                        <th style="text-align: center;">Total</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($drivers as $key => $data)
                                        
                                        <tr>
                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                            <td><span style="font-weight: 500;">{{ $data->name }}</span></td>
                                            <td>{{ $data->email }}</td>

                                            <td>
                                                @php
                                                    $bookings = \App\Models\Booking::where('user_id', $data->id)->get();
                                                @endphp

                                                @foreach($bookings as $book)
                                                    <span style="font-weight: 500;">
                                                        @if($book->is_combine == 'Yes') ({!! $book->booking_id !!} <span class="badge badge-soft-info" style="position: relative; top: -1.65px;">Combined </span> ) @else {!! $book->booking_id !!} @endif 
                                                    </span><b>, </b>
                                                @endforeach
                                            </td>

                                            <td style="text-align: center;">
                                                <span style="font-weight: 500;">
                                                    {{ $bookings->count() }}
                                                </span>
                                            </td>

                                            <td style="text-align: center;">
                                                <form action="{{ route('delete.user') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="user_id" value="{{ $data->id }}">

                                                    @foreach($bookings as $book)
                                                        <input type="hidden" name="booking_id" value="{{ $book->id }}">
                                                    @endforeach

                                                    <button class="btn btn-danger btn-sm waves-effect btn-label waves-light"> 
                                                        <i class="bx bx-trash label-icon"></i> Delete
                                                    </button>
                                                </form>
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
    </style>
@endsection