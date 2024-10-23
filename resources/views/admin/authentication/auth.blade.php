<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="{{ asset('logo/favicon.svg') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/feather.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/material.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style-preset.css">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main v1">
        <div class="auth-wrapper">
            <div class="auth-form">
                <div class="card my-5 ">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{asset('assets/images/authentication/img-auth-login.png')}}" alt="images" class="img-fluid mb-3" />
                        </div>
                        <form  action="{{ route('auth.login') }}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control
                                @error('email')
                                is-invalid
                                @enderror"
                                placeholder="Email Address" name="email" required>
                                @error('email')
                                    <span class="invalid-feedback" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control
                                @error('password')
                                is-invalid
                                @enderror" placeholder="Password" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger mt-4" role="alert">  {{ session('loginError') }} </div>
                         @endif
                        @if (session()->has('changePassword'))
                            <div class="alert alert-warning mt-4" role="alert">  {{ session('changePassword') }} </div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/plugins/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/fonts/custom-font.js"></script>
    <script src="{{ asset('assets') }}/js/pcoded.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/feather.min.js"></script>
    </div>
</body>
<!-- [Body] end -->

</html>
