@extends('layouts.master')
@section('title', 'Import Bookings')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Import Bookings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Import Bookings</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    
                    @if(count($errors) > 0)
                        <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                            <x-jet-validation-errors class="mb-4 my-2 text-white" />
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        
                </div>
            </div>

            
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box text-center">
                        <h4 class="mb-sm-0 font-size-18">IMPORT EXCEL FILE TO UPLOAD</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="text-center"><a href="#" onclick="exportExcel(this);" id="someID" class="btn btn-info btn-sm"><i class="bx bxs-download" style="position: relative;top: 1px;"></i> Download & Check this demo excel file's format for a successful upload</a></h6>

                            <form class="needs-validation" action="{{ route('import.files') }}" method="post" enctype="multipart/form-data" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02" class="form-label">Import File(.xlsx)</label>
                                            <input type="file" class="form-control" id="validationTooltip02" name="file" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select an excel(.xlsx) file to upload.
                                            </div>
                                        </div>
                                    </div>                                            
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <button class="btn btn-success" style="margin-top: 6px !important; width: 100% !important" type="submit">Upload List</button>
                                        
                                    </div>
                            
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection

@section('scripts')
    <script type="text/javascript">
        function exportExcel(el) {

            el.setAttribute("href", "{{ asset('assets/uploads/imported-files/demo-upload.xlsx') }}");
            el.setAttribute("download", "demo-upload.xlsx");
            
        }
    </script>
@endsection