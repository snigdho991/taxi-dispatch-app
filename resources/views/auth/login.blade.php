<!doctype html>

<html lang="en">

    
    <head>
        
        <meta charset="utf-8" />
        <title>Login - {{ config('app.name') }}</title>
        
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
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="{{ url('/') }}" class="d-block auth-logo">
                                            <img src="{{ config('core.image.default.logoadmin') }}" alt="" height="85" width="150" class="auth-logo-dark">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to <b style="font-weight: 550;">{{ config('app.name') }}</b>.</p>
                                        </div>
            
                                        <div class="mt-4">

                                            @if(count($errors) > 0)
                                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                                    <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            @if (session('status'))
                                                <div class="alert alert-dismissible fade show color-box bg-success bg-gradient p-4" role="alert">
                                                    <div class="mb-4 my-2 text-white">
                                                        {{ session('status') }}
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            @if (session('message'))
                                                <div class="alert alert-danger">{{ session('message') }}</div>
                                            @endif

                                            @if (Cookie::has('passwordcng'))
                                                <div class="alert alert-dismissible fade show color-box bg-info bg-gradient p-4" role="alert">
                                                    <div class="mb-2 my-2 text-white" style="font-weight: 500;">
                                                        {{ Cookie::get('passwordcng') }}
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <form action="{{ route('login') }}" method="POST">
                                                @csrf
                
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">{{ __('Email') }}</label>
                                                    <input type="email" class="form-control" id="username" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter {{ __('email') }}">
                                                </div>
                        
                                                <div class="mb-3">
                                                
                                                @if (Route::has('password.request'))
                                                    <div class="float-end">
                                                        <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                                    </div>
                                                @endif

                                                    <label class="form-label">{{ __('Password') }}</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Enter {{ __('password') }}" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                        
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check" name="remember">
                                                    <label class="form-check-label" for="remember-check">
                                                        {{ __('Remember me') }}
                                                    </label>
                                                </div>
                                                
                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                    
                                            </form>
                                            <div class="mt-5 text-center">
                                                <p>Don't have a driver account ? <a href="{{ route('register') }}" class="fw-medium text-primary"> Sign up now </a> </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }} <b>-</b>  Crafted with <i class="mdi mdi-heart text-danger"></i> by Snigdho</p>
                                    </div>
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

    </body>

</html>