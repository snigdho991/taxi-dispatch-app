<!doctype html>

<html lang="en">

    
    <head>
        
        <meta charset="utf-8" />
        <title>Register - {{ config('app.name') }}</title>
        
        @include('libs.meta-tags')
        
        @include('libs.styles')

        <style type="text/css">
            .auth-full-bg .bg-overlay {
                background: url({{ asset('/assets/images/bg-auth-overlay.png') }});
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>

    </head>

    <body class="auth-body-bg">
        
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
    
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">
                                                    
                                                    <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary">5k</span>+ Satisfied clients</h4>
                                                    
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">Abey Joles</h4>
                                                                        <p class="font-size-14 mb-0">- {{ config('app.name') }} Driver</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
    
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" If Every Vendor on Envato are as supportive as Themesbrand, Development with be a nice experience. You guys are Wonderful. Keep us the good work. "</p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                        <p class="font-size-14 mb-0">- {{ config('app.name') }} User</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-4 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-4">
                                        <a href="{{ url('/') }}" class="d-block auth-logo">
                                            <img src="{{ config('core.image.default.logoadmin') }}" alt="" height="85" width="150" class="auth-logo-dark">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-primary">Register as a Driver</h5>
                                            
                                        </div>

                                        <p class="text-muted" style="margin-top: -5px !important;">Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login</a> </p>

                                        <div class="mt-4">

                                            @if(count($errors) > 0)
                                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                                    <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <form class="needs-validation" novalidate="" action="{{ route('register') }}" method="post">
                                            @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter name">
                                                </div>
                        
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">{{ __('Email') }}</label>
                                                    <input type="email" class="form-control" id="username" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter {{ __('email') }}">
                                                </div>

                                                <div class="mb-3 position-relative">

                                                    <label for="from_places" class="form-label">City</label>

                                                    <input type="text" class="form-control" id="from_places" placeholder="Enter your driving city" required="">
                                                    <input id="origin" name="city" required="" type="hidden" />
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="validationTooltip07" class="form-label">Password</label>
                                                    
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" id="validationTooltip07" aria-label="Password" aria-describedby="password-addon-one" placeholder="Enter password" name="password" required="">

                                                        <button class="btn btn-light" type="button" id="password-addon-one" onclick="TogglePass()"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                 </div>   

                                                <div class="mb-3">
                                                    <label for="validationTooltip08" class="form-label">Confirm Password</label>
                                                    
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" id="validationTooltip08" placeholder="Re-type/Confirm Password" aria-label="Password" name="password_confirmation" aria-describedby="password-addon-two" onkeyup="matchPassword()" required="">

                                                        <button class="btn btn-light" type="button" id="password-addon-two" onclick="ToggleConfirmPass()"><i class="mdi mdi-eye-outline"></i></button>

                                                        <div class="valid-tooltip" id="matched" style="display: none;">
                                                            Password Matched!
                                                        </div>

                                                        <div class="invalid-tooltip" id="notmatched" style="display: none;">
                                                            Password not matched yet.
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div style="margin-top: 35px !important;">
                                                    <p class="mb-0">
                                                        <input class="form-check-input" type="checkbox" id="remember-check" name="terms" required=""> By registering you agree to the {{ config('app.name') }} 
                                                        <span class="text-dark" style="font-weight:500;">Terms of Use</span>
                                                    </p>
                                                </div>
                                                
                                                <div class="mt-2 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                                </div>

                                            </form>
                                            
                                            {{-- <div class="mt-5 text-center">
                                                <p>Already have an account ? <a href="auth-login-2.html" class="fw-medium text-primary"> Login</a> </p>
                                            </div> --}}
                                                   
                                        </div>
                                    </div>

                                    {{-- <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Snigdho</p>
                                    </div> --}}
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- JAVASCRIPT -->
        @include('libs.scripts')

        <script type="text/javascript">
            function TogglePass() {
                var temp = document.getElementById("validationTooltip07");
                if (temp.type === "password") {
                    temp.type = "input";
                }
                else {
                    temp.type = "password";
                }
            }

            function ToggleConfirmPass() {
                var tempconf = document.getElementById("validationTooltip08");
                if (tempconf.type === "password") {
                    tempconf.type = "input";
                }
                else {
                    tempconf.type = "password";
                }
            }
        </script>

        <script type="text/javascript">
            function matchPassword() {  
                var pw1 = document.getElementById("validationTooltip07").value;  
                var pw2 = document.getElementById("validationTooltip08").value;
                if($.trim(pw1) != ''){
                    if($.trim(pw2) != ''){
                        if(pw1 != pw2)  
                        { 
                            $('#matched').css('display', 'none');  
                            $('#notmatched').css('display', 'block');
                        } else { 
                            $('#notmatched').css('display', 'none');
                            $('#matched').css('display', 'block');
                        }
                    } else {
                        $('#notmatched').css('display', 'none');
                        $('#matched').css('display', 'none');
                    }
                }
            }
        </script>

        <script defer
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD4OmxQMXLSUnvCBu4D46G-f4HqbKx75_c"
            type="text/javascript"></script>

        <script type="text/javascript">
            $(function () {

                google.maps.event.addDomListener(window, 'load', setCity);

                function setCity() {
                    var options = {
                        types: ['(cities)'],
                        componentRestrictions: {country: "us"}
                    };

                    var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'), options);
                    
                    google.maps.event.addListener(from_places, 'place_changed', function () {
                        var from_place = from_places.getPlace();
                        //var from_address = from_place.formatted_address;

                        for(var i = 0; i < from_place.address_components.length; i += 1) {
                            var addressObj = from_place.address_components[i];
                                for(var j = 0; j < addressObj.types.length; j += 1) {
                                    if (addressObj.types[j] === 'locality') {
                                      $('#origin').val(addressObj.long_name);
                                    }
                                }
                        }
                    });
                }

            });
        </script>

    </body>

</html>