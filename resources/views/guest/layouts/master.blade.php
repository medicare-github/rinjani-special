<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Title & SEO --}}
    <title>{{ $title ?? 'Rinjani Trekking Special - Guided Hiking Service on Mount Rinjani' }}</title>
    <meta name="description"
        content="{{ $description ?? 'At Rinjani Trekking Special, we specialize in providing multi-day hiking experiences to Rinjani Mountain and the volcano, one of the most beautiful and challenging treks in Indonesia. Our team of skilled and over 10 years of experienced local guides and porters from Seranu village will ensure that your trip is safe and enjoyable. We cater to all levels of hikers, from beginner to intermediate trekkers, and have a range of packages to suit your needs. We pride ourselves on providing hi-end adventures, so get in touch to start planning your expedition!' }}">
    <meta name="keywords"
        content="{{ $keywords ?? 'Rinjani trekking, Mount Rinjani tour, guided hiking Rinjani, Rinjani trekking package, Rinjani trekking guide, Rinjani volcano hike, Rinjani trekking Lombok, trekking Indonesia, Mount Rinjani trekking packages, Rinjani trekking company, beginner trekking Rinjani, advanced Rinjani trek, Seranu village guide, multi-day Rinjani trek, eco-friendly Rinjani trek, best Rinjani trekking, top trekking Indonesia, Rinjani tour package, Rinjani mountain tour, guided Rinjani hike' }}">
    <meta name="author" content="Rinjani Trekking Special">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title"
        content="{{ $title ?? 'Rinjani Trekking Special - Guided Hiking Service on Mount Rinjani' }}">
    <meta property="og:description"
        content="{{ $description ?? 'At Rinjani Trekking Special, we specialize in providing multi-day hiking experiences to Rinjani Mountain and the volcano, one of the most beautiful and challenging treks in Indonesia. Our team of skilled and over 10 years of experienced local guides and porters from Seranu village will ensure that your trip is safe and enjoyable. We cater to all levels of hikers, from beginner to intermediate trekkers, and have a range of packages to suit your needs. We pride ourselves on providing hi-end adventures, so get in touch to start planning your expedition!' }}">
    <meta property="og:image" content="{{ $image ?? asset('guest/images/default-image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title"
        content="{{ $title ?? 'Rinjani Trekking Special - Guided Hiking Service on Mount Rinjani' }}">
    <meta name="twitter:description"
        content="{{ $description ?? 'At Rinjani Trekking Special, we specialize in providing multi-day hiking experiences to Rinjani Mountain and the volcano, one of the most beautiful and challenging treks in Indonesia. Our team of skilled and over 10 years of experienced local guides and porters from Seranu village will ensure that your trip is safe and enjoyable. We cater to all levels of hikers, from beginner to intermediate trekkers, and have a range of packages to suit your needs. We pride ourselves on providing hi-end adventures, so get in touch to start planning your expedition!' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('guest/images/default-image.jpg') }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('guest/images/logo.webp') }}" type="image/x-icon">

    {{-- CSS --}}
    <link href="{{ asset('guest') }}/libs/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="{{ asset('guest') }}/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <link href="{{ asset('guest') }}/libs/js-datepicker/datepicker.min.css" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{ asset('guest') }}/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('guest') }}/css/tailwind.min.css" rel="stylesheet" type="text/css">
</head>

<body class="dark:bg-slate-900">
    <div class="tagline bg-slate-900">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="flex items-center justify-between">
                    <ul class="list-none">
                        <li class="inline-flex items-center">
                            <i data-feather="clock" class="text-red-500 size-4"></i>
                            <span class="ms-2 text-slate-300">Mon-Sat: 9am to 10pm</span>
                        </li>
                        <li class="inline-flex items-center ms-2">
                            <i data-feather="map-pin" class="text-red-500 size-4"></i>
                            <span class="ms-2 text-slate-300">North Lombok, 83354</span>
                        </li>
                    </ul>

                    <ul class="list-none">
                        <li class="inline-flex items-center">
                            <i data-feather="mail" class="text-red-500 size-4"></i>
                            <a href="mailto:{{ $profile->email }}"
                                class="ms-2 text-slate-300 hover:text-slate-200">{{ $profile->email }}</a>
                        </li>
                        <li class="inline-flex items-center ms-2">
                            <ul class="list-none">
                                <li class="inline-flex mb-0"><a href="https://www.facebook.com/{{ $profile->fb }}"
                                        target="_blank" class="text-slate-300 hover:text-red-500"><i
                                            data-feather="facebook" class="size-4 align-middle"
                                            title="facebook"></i></a></li>
                                <li class="inline-flex ms-2 mb-0"><a
                                        href="https://www.instagram.com/{{ $profile->ig }}" target="_blank"
                                        class="text-slate-300 hover:text-red-500"><i data-feather="instagram"
                                            class="size-4 align-middle" title="instagram"></i></a></li>
                                <li class="inline-flex ms-2 mb-0"><a href="tel:{{ $profile->wa }}"
                                        class="text-slate-300 hover:text-red-500"><i data-feather="phone"
                                            class="size-4 align-middle" title="phone"></i></a></li>
                            </ul><!--end icon-->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav id="topnav" class="defaultscroll is-sticky tagline-height">
        <div class="container relative">
            <a class="logo" href="/">
                <span class="inline-block dark:hidden">
                    <img src="{{ asset('guest') }}/images/logo-dark.png" class="h-7 l-dark" alt="">
                    <img src="{{ asset('guest') }}/images/logo-light.png" class="h-7 l-light" alt="">
                </span>
                <img src="{{ asset('guest') }}/images/logo-white.png" class="hidden dark:inline-block"
                    alt="">
            </a>
            <div class="menu-extras">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="buy-button list-none mb-0">
                <li class="dropdown inline-block relative pe-1">
                    <button data-dropdown-toggle="dropdown"
                        class="dropdown-toggle align-middle inline-flex search-dropdown" type="button">
                        <i data-feather="search" class="size-5 dark-icon"></i>
                        <i data-feather="search" class="size-5 white-icon text-white"></i>
                    </button>
                    <div class="dropdown-menu absolute overflow-hidden end-0 m-0 mt-5 z-10 md:w-52 w-48 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <div class="relative">
                            <i data-feather="search" class="size-4 absolute top-[9px] end-3"></i>
                            <input type="text" class="h-9 px-3 pe-10 w-full border-0 focus:ring-0 outline-none"
                                name="s" id="searchItem" placeholder="Search...">
                        </div>
                    </div>
                </li>
            </ul>
            <div id="navigation">
                <ul class="navigation-menu justify-end nav-light">
                    <li><a href="/" class="sub-menu-item">Home</a></li>
                    <li><a href="/about" class="sub-menu-item">About</a></li>
                    <li><a href="/gallery" class="sub-menu-item">Gallery</a></li>
                    <li><a href="/tour-packages" class="sub-menu-item"></a></li>
                    <li class="has-submenu parent-menu-item">
                        <a href="javascript:void(0)">Tour packages</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            @foreach (paket_wisatas() as $tour_package)
                                <li><a href="/tour-packages/{{ $tour_package->slug }}"
                                        class="sub-menu-item">{{ $tour_package->nama }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/get-quote" class="sub-menu-item">Get Quote</a></li>
                    <li><a href="/contact-us" class="sub-menu-item">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('contens')
    <footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">
        <div class="container relative">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="py-[60px] px-0">
                        <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                            <div class="lg:col-span-3 md:col-span-12">
                                <a href="#" class="text-[22px] focus:outline-none">
                                    <img src="{{ asset('guest') }}/images/logo-light.png" alt="">
                                </a>
                                <p class="mt-6 text-gray-300">Experience an unforgettable journey with Rinjani Trekking
                                    Special, offering professional guided hikes on Mount Rinjani, with breathtaking
                                    views and expert support.</p>
                                <ul class="list-none mt-6">

                                    <li class="inline"><a href="https://www.facebook.com/{{ $profile->fb }}"
                                            target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                data-feather="facebook" class="size-4 align-middle"
                                                title="facebook"></i></a></li>
                                    <li class="inline"><a href="https://www.instagram.com/{{ $profile->ig }}"
                                            target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                data-feather="instagram" class="size-4 align-middle"
                                                title="instagram"></i></a></li>
                                    <li class="inline"><a href="mailto:/{{ $profile->email }}" target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                data-feather="mail" class="size-4 align-middle"
                                                title="mail"></i></a></li>
                                    <li class="inline"><a href="tel:{{ $profile->wa }}" target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                data-feather="phone" class="size-4 align-middle"
                                                title="whatsapp"></i></a></li>

                                </ul><!--end icon-->
                            </div>
                            <div class="lg:col-span-3 md:col-span-4">
                                <div class="lg:ms-8">
                                    <h5 class="tracking-[1px] text-gray-100 font-semibold">Office</h5>
                                    <h5 class="tracking-[1px] text-gray-100 mt-6">{{ $profile->name }}</h5>

                                    <div class="flex mt-4">
                                        <i data-feather="map-pin" class="size-4 text-red-500 me-2 mt-1"></i>
                                        <div class="">
                                            <h6 class="text-gray-300">Tumpang Sari, <br> Bayan 83354, <br> Noth Lombok,
                                                NTB Indonesia</h6>
                                        </div>
                                    </div>

                                    <div class="flex mt-4">
                                        <i data-feather="mail" class="size-4 text-red-500 me-2 mt-1"></i>
                                        <div class="">
                                            <a href="mailto:{{ $profile->email }}"
                                                class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">{{ $profile->email }}</a>
                                        </div>
                                    </div>

                                    <div class="flex mt-4">
                                        <i data-feather="phone" class="size-4 text-red-500 me-2 mt-1"></i>
                                        <div class="">
                                            <a href="tel:+152534-468-854"
                                                class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">+152
                                                534-468-854</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-3 md:col-span-4">
                                <div class="lg:ms-8">
                                    <h5 class="tracking-[1px] text-gray-100 font-semibold">Company</h5>
                                    <ul class="list-none footer-list mt-6">
                                        <li><a href="/about-us"
                                                class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> About us</a></li>
                                        <li class="mt-[10px]"><a href="/team"
                                                class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Team</a></li>
                                        <li class="mt-[10px]"><a href="/tour-packages"
                                                class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Tour Packages</a></li>
                                        <li class="mt-[10px]"><a href="/blog"
                                                class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Blog</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="lg:col-span-3 md:col-span-4">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>
                                <p class="mt-6">Sign up and receive the latest tips via email.</p>
                                <form action="{{ route('subscribe') }}" method="post" id="submitsubscribeForm">
                                    @csrf
                                    <div class="grid grid-cols-1">
                                        <div class="my-3">
                                            <label class="form-label">Write your email <span
                                                    class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                                <input type="email"
                                                    class="ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200 outline-none"
                                                    placeholder="Email" name="email" required="">
                                            </div>
                                        </div>
                                        <button class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md" type="submit" >Subscribe</button>
                                        @if(session()->has('success'))
                                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                                            <strong class="font-bold">Success!</strong>
                                            <span class="block sm:inline">{{ session()->get('success') }}</span>
                                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                              <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M14.348 14.849a1 1 0 01-1.415 0L10 11.415l-2.933 2.934a1 1 0 01-1.415-1.415l2.934-2.933L5.637 6.637a1 1 0 111.415-1.415L10 8.585l2.933-2.934a1 1 0 111.415 1.415L11.415 10l2.933 2.933a1 1 0 010 1.415z"/>
                                              </svg>
                                            </span>
                                        </div>
                                        @elseif(session()->has('error'))
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                                            <strong class="font-bold">failed!</strong>
                                            <span class="block sm:inline">{{ session()->get('error') }}</span>
                                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                              <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M14.348 14.849a1 1 0 01-1.415 0L10 11.415l-2.933 2.934a1 1 0 01-1.415-1.415l2.934-2.933L5.637 6.637a1 1 0 111.415-1.415L10 8.585l2.933-2.934a1 1 0 111.415 1.415L11.415 10l2.933 2.933a1 1 0 010 1.415z"/>
                                              </svg>
                                            </span>
                                         </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-[30px] px-0 border-t border-slate-800">
            <div class="container relative text-center">
                <div class="grid grid-cols-1">
                    <div class="text-center">
                        <p class="mb-0">©2024 - Rinjani Trekking Special
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="fixed top-1/4 -left-2 z-50">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
            <label
                class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                for="chk">
                <i data-feather="moon" class="w-[18px] h-[18px] text-yellow-500"></i>
                <i data-feather="sun" class="w-[18px] h-[18px] text-yellow-500"></i>
                <span
                    class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
            </label>
        </span>
    </div>

    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-md z-10 bottom-5 end-5 size-8 text-center bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white justify-center items-center"><i
            class="mdi mdi-arrow-up"></i></a>

    <script src="{{ asset('guest') }}/libs/swiper/js/swiper.min.js"></script>
    <script src="{{ asset('guest') }}/libs/tiny-slider/min/tiny-slider.js"></script>
    <script src="{{ asset('guest') }}/libs/js-datepicker/datepicker.min.js"></script>
    <script src="{{ asset('guest') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('guest') }}/js/plugins.init.js"></script>
    <script src="{{ asset('guest') }}/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>

</html>
