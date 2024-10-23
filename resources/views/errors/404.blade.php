<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>404 | Halaman Tidak ditemukan</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Halaman Tidak ditemukan" />
    <meta name="author" content="bkdpsdm-lombokutara" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{asset('assets')}}/images/favicon.svg" type="image/x-icon" />
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/phosphor/duotone/style.css" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/style-preset.css" />

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

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
                <div class="error-card">
                    <div class="card-body">
                        <div class="error-image-block">
                            <img class="img-fluid" src="{{asset('assets')}}/images/pages/img-error-404.png" alt="img" />
                        </div>
                        <div class="text-center">
                            <h1 class="mt-2">Oops! Something Went wrong</h1>
                            <p class="mt-2 mb-4 text-muted f-20">We couldn’t find the page you were looking for. Why not
                                try back to the Homepage.</p>
                            <a class="btn btn-primary d-inline-flex align-items-center mb-3"
                                href="/"><i class="ph-duotone ph-house me-2"></i> Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Js -->
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
        preset_change('preset-1');
    </script>


</body>
<!-- [Body] end -->

</html>
