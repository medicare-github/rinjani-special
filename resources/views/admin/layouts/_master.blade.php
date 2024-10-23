<!doctype html>
<html lang="id-ID">

<head>
    <title>@yield('head')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="author" content="bkdpsdm-lombokutara" />
    <link rel="icon" href="{{ asset('assets') }}/images/favicon.svg" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/phosphor/duotone/style.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/tabler-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/feather.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/material.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style-preset.css" />
    @stack('style')

</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    {{-- Navbar --}}
    @include('admin.layouts._navbar')
    {{-- Header --}}
    @include('admin.layouts._header')

    {{-- Contents --}}
    @yield('contents')

    {{-- Footer --}}
    @include('admin.layouts._footer')

    <script src="{{asset('assets')}}/js/plugins/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/simplebar.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/fonts/custom-font.js"></script>
    <script src="{{asset('assets')}}/js/pcoded.js"></script>
    <script src="{{asset('assets')}}/js/plugins/feather.min.js"></script>
    <script>
        layout_change('light');
    </script>
    <script>
        layout_sidebar_change('light');
    </script>
    <script>
        change_box_container('false');
    </script>
    <script>
        layout_caption_change('true');
    </script>
    <script>
        layout_rtl_change('false');
    </script>
    <script>
        preset_change("preset-1");
    </script>
    @stack('js')
</body>

</html>
