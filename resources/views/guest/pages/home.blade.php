@extends('guest.layouts.master')
@section('contens')
    <!-- Start Hero -->
    <section class="swiper-slider-hero relative block h-screen" id="home">
        <div class="swiper-container absolute end-0 top-0 w-full h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex items-center overflow-hidden">
                    <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center;" data-background="{{asset('guest')}}/images/bg/2.jpg">
                        <div class="absolute inset-0 bg-black/70"></div>
                        <div class="container relative">
                            <div class="grid grid-cols-1">
                                <div class="text-center">
                                    <h2 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-6xl mb-6 mt-5">{{ $profile->nama }}</h2>
                                    <p class="text-white/70 text-xl max-w-xl mx-auto">
                                        we specialize in providing multi-day hiking experiences to Rinjani Mountain and the volcano, one of the most beautiful and challenging treks in Indonesia. Our team of skilled and over 10 years of experienced local guides and porters from Seranu village 
                                    </p>
                                    
                                    <div class="mt-6">
                                        <a href="#" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">See More</a>
                                    </div>
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
                    </div><!-- end slide-inner --> 
                </div> <!-- end swiper-slide -->

                <div class="swiper-slide flex items-center overflow-hidden">
                    <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center;" data-background="{{asset('guest')}}/images/bg/3.jpg">
                        <div class="absolute inset-0 bg-black/70"></div>
                        <div class="container relative">
                            <div class="grid grid-cols-1">
                                <div class="text-center">
                                    <img src="{{asset('guest')}}/images/map-plane.png" class="mx-auto w-[300px]" alt="">
                                    <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-6xl mb-6 mt-5">Find Next Best <br> Place To Visit</h1>
                                    <p class="text-white/70 text-xl max-w-xl mx-auto">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
                                    
                                    <div class="mt-6">
                                        <a href="#" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">See More</a>
                                    </div>
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
                    </div><!-- end slide-inner --> 
                </div> <!-- end swiper-slide -->
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-pagination"></div>
            <!-- <div class="swiper-button-next bg-transparent w-[35px] h-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-red-500 hover:border-red-500 rounded-full text-center"></div>
            <div class="swiper-button-prev bg-transparent w-[35px] h-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-red-500 hover:border-red-500 rounded-full text-center"></div> -->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="relative py-16 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <form class="p-6 bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-700">
                    <div class="registration-form text-dark text-start">
                        <div class="grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-4">
                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Search:</label>
                                <div class="relative mt-2">
                                    <i data-feather="search" class="size-[18px] absolute top-[10px] start-3"></i>
                                    <input name="name" type="text" id="job-keyword" class="w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Search">
                                </div>
                            </div>

                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Select Your Date:</label>
                                <div class="relative mt-2">
                                    <i data-feather="calendar" class="size-[18px] absolute top-[10px] start-3"></i>
                                    <input name="name" type="text" id="job-keyword" class="w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 start" placeholder="Select Your Date">
                                </div>
                            </div>

                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Select Your Date:</label>
                                <div class="relative mt-2">
                                    <i data-feather="calendar" class="size-[18px] absolute top-[10px] start-3"></i>
                                    <input name="name" type="text" id="job-keyword" class="w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 end" placeholder="Select Your Date">
                                </div>
                            </div>

                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">No. of person:</label>
                                <div class="relative mt-2">
                                    <i data-feather="users" class="size-[18px] absolute top-[10px] start-3"></i>
                                    <select class="form-select w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0">
                                        <option disabled selected>No. of person</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="lg:mt-[35px]">
                                <input type="submit" id="search-buy" name="search" class="py-1 px-5 h-10 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md w-full cursor-pointer" value="Search">
                            </div>
                        </div><!--end grid-->
                    </div><!--end container-->
                </form><!--end form-->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <!-- Start -->
    <section class="relative md:py-24 py-16 overflow-hidden">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                <div class="md:col-span-5">
                    <div class="relative">
                        <img src="{{asset('guest')}}/images/about.jpg" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        

                        <div class="absolute flex items-center bottom-16 md:-start-10 -start-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-56 m-3">
                            <div class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                                <i data-feather="users" class="size-6"></i>
                            </div>
                            <div class="flex-1">
                                <span class="text-slate-400">Visitor</span>
                                <p class="text-xl font-bold"><span class="counter-value" data-target="4589">2100</span></p>
                            </div>
                        </div>

                        <div class="absolute flex items-center top-16 md:-end-10 -end-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-60 m-3">
                            <div class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                                <i data-feather="globe" class="size-6"></i>
                            </div>
                            <div class="flex-1">
                                <span class="text-slate-400">Travel Packages</span>
                                <p class="text-xl font-bold"><span class="counter-value" data-target="50">1</span>+</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-7">
                    <div class="lg:ms-8">
                        <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">World Best Travel <br> Agency: Travosy</h3>

                        <p class="text-slate-400 max-w-xl mb-6">Get instant helpful resources about anything on the go, easily implement secure money transfer solutions, boost your daily efficiency, connect to other app users and create your own Travosy network, and much more with just a few taps. commodo consequat. Duis aute irure.</p>

                        <a href="#" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Read More <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                    </div>
                </div>

                <div class="absolute bottom-0 start-1/3 -z-1">
                    <img src="{{asset('guest')}}/images/map-plane-big.png" class="lg:w-[600px] w-96" alt="">
                </div>
            </div>
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Tours Packages</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-2 grid-cols-1 mt-6 gap-6">                    
                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/1.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">
                            <div class="absolute top-0 start-0 p-4">
                                <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">10% Off</span>
                            </div>

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>
                        
                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Dubai</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Cuba Sailing Adventure</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->

                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/2.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Italy</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Tour in New York</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/3.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Maldivas</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Discover Greece</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/4.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> USA</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Museum of Modern Art</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/5.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Bali</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Peek Mountain View</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/6.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">
                            <div class="absolute top-0 start-0 p-4">
                                <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">25% Off</span>
                            </div>

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Bangkok</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Hot Baloon Journey</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/7.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Singapore</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Orca Camp Kayaking Trip</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group rounded-md shadow dark:shadow-gray-700">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">
                            <img src="{{asset('guest')}}/images/listing/8.jpg" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">
                            <div class="absolute top-0 start-0 p-4">
                                <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">20% Off</span>
                            </div>

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Thailand</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">Caño Cristales River Trip</a>

                            <div class="flex items-center mt-2">
                                <span class="text-slate-400">Rating:</span>
                                <ul class="text-lg font-medium text-amber-400 list-none ms-2">
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                    <li class="inline text-black dark:text-white text-sm">5.0(30)</li>
                                </ul>
                            </div>
                            
                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">$ 58 / Day</h5>

                                <a href="#" class="text-slate-400 hover:text-red-500">Explore Now <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end content-->
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-6 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">What Our Users Say</h3>

                <p class="text-slate-400 max-w-xl mx-auto">This is just a simple text made for this unique and awesome template, you can replace it with any text.</p>
            </div><!--end grid-->

            <div class="grid grid-cols-1 mt-6">
                <div class="tiny-three-item">
                    <div class="tiny-slide text-center">
                        <div class="cursor-e-resize">
                            <div class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                                <i class="mdi mdi-format-quote-open mdi-48px text-red-500"></i>
                                <p class="text-slate-400">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. "</p>
                                <ul class="list-none mb-0 text-amber-400 mt-3">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </div>
                            
                            <div class="text-center mt-5">
                                <img src="{{asset('guest')}}/images/client/01.jpg" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                <h6 class="mt-2 font-semibold">Calvin Carlo</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="cursor-e-resize">
                            <div class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                                <i class="mdi mdi-format-quote-open mdi-48px text-red-500"></i>
                                <p class="text-slate-400">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                                <ul class="list-none mb-0 text-amber-400 mt-3">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </div>
                            
                            <div class="text-center mt-5">
                                <img src="{{asset('guest')}}/images/client/02.jpg" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                <h6 class="mt-2 font-semibold">Christa Smith</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="cursor-e-resize">
                            <div class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                                <i class="mdi mdi-format-quote-open mdi-48px text-red-500"></i>
                                <p class="text-slate-400">" One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others. "</p>
                                <ul class="list-none mb-0 text-amber-400 mt-3">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </div>
                            
                            <div class="text-center mt-5">
                                <img src="{{asset('guest')}}/images/client/03.jpg" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                <h6 class="mt-2 font-semibold">Jemina CLone</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="cursor-e-resize">
                            <div class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                                <i class="mdi mdi-format-quote-open mdi-48px text-red-500"></i>
                                <p class="text-slate-400">" Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts. "</p>
                                <ul class="list-none mb-0 text-amber-400 mt-3">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </div>
                            
                            <div class="text-center mt-5">
                                <img src="{{asset('guest')}}/images/client/04.jpg" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                <h6 class="mt-2 font-semibold">Smith Vodka</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="cursor-e-resize">
                            <div class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                                <i class="mdi mdi-format-quote-open mdi-48px text-red-500"></i>
                                <p class="text-slate-400">" There is now an abundance of readable dummy texts. These are usually used when a text is required. "</p>
                                <ul class="list-none mb-0 text-amber-400 mt-3">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </div>
                            
                            <div class="text-center mt-5">
                                <img src="{{asset('guest')}}/images/client/05.jpg" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                <h6 class="mt-2 font-semibold">Cristino Murfi</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="cursor-e-resize">
                            <div class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                                <i class="mdi mdi-format-quote-open mdi-48px text-red-500"></i>
                                <p class="text-slate-400">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero. "</p>
                                <ul class="list-none mb-0 text-amber-400 mt-3">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </div>
                            
                            <div class="text-center mt-5">
                                <img src="{{asset('guest')}}/images/client/06.jpg" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                <h6 class="mt-2 font-semibold">Cristino Murfi</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-6 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Travel Blogs</h3>

                <p class="text-slate-400 max-w-xl mx-auto">This is just a simple text made for this unique and awesome template, you can replace it with any text.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
                <div class="group relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-800">
                        <img src="{{asset('guest')}}/images/blog/1.jpg" class="group-hover:scale-110 group-hover:rotate-3 duration-500" alt="">
                        <div class="absolute top-0 start-0 p-4 opacity-0 group-hover:opacity-100 duration-500">
                            <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">Travel</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="flex mb-4">
                            <span class="flex items-center text-slate-400 text-sm"><i data-feather="clock" class="size-4 text-slate-900 dark:text-white me-1.5"></i>5 min read</span>
                            <span class="text-slate-400 text-sm ms-3">by <a href="#" class="text-slate-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">Travosy</a></span>
                        </div>

                        <a href="blog-detail.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">This Spanish city is a feast for the eyes: Travosy</a>
                        <p class="text-slate-400 mt-2">This is required when, for example, the final text is not yet available.</p>

                        <div class="mt-3">
                            <a href="blog-detail.html" class="hover:text-red-500 inline-flex items-center">Read More <i data-feather="chevron-right" class="size-4 ms-1"></i></a>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-800">
                        <img src="{{asset('guest')}}/images/blog/2.jpg" class="group-hover:scale-110 group-hover:rotate-3 duration-500" alt="">
                        <div class="absolute top-0 start-0 p-4 opacity-0 group-hover:opacity-100 duration-500">
                            <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">Tour</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="flex mb-4">
                            <span class="flex items-center text-slate-400 text-sm"><i data-feather="clock" class="size-4 text-slate-900 dark:text-white me-1.5"></i>5 min read</span>
                            <span class="text-slate-400 text-sm ms-3">by <a href="#" class="text-slate-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">Travosy</a></span>
                        </div>

                        <a href="blog-detail.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">New Zealand’s South Island brims with majestic</a>
                        <p class="text-slate-400 mt-2">This is required when, for example, the final text is not yet available.</p>

                        <div class="mt-3">
                            <a href="blog-detail.html" class="hover:text-red-500 inline-flex items-center">Read More <i data-feather="chevron-right" class="size-4 ms-1"></i></a>
                        </div>
                    </div>
                </div><!--end content-->
                
                <div class="group relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-800">
                        <img src="{{asset('guest')}}/images/blog/3.jpg" class="group-hover:scale-110 group-hover:rotate-3 duration-500" alt="">
                        <div class="absolute top-0 start-0 p-4 opacity-0 group-hover:opacity-100 duration-500">
                            <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">Tourist</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="flex mb-4">
                            <span class="flex items-center text-slate-400 text-sm"><i data-feather="clock" class="size-4 text-slate-900 dark:text-white me-1.5"></i>5 min read</span>
                            <span class="text-slate-400 text-sm ms-3">by <a href="#" class="text-slate-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">Travosy</a></span>
                        </div>

                        <a href="blog-detail.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">When you visit the Eternal Rome City: Travosy</a>
                        <p class="text-slate-400 mt-2">This is required when, for example, the final text is not yet available.</p>

                        <div class="mt-3">
                            <a href="blog-detail.html" class="hover:text-red-500 inline-flex items-center">Read More <i data-feather="chevron-right" class="size-4 ms-1"></i></a>
                        </div>
                    </div>
                </div><!--end content-->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection