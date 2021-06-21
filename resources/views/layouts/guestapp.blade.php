<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kidzo</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{asset('userpage/css/bootstrap.min.css')}}" /> --}}
    <link rel="stylesheet" href="<?php echo url('/'); ?>/assets_u/css/bootstrap.min.css" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/assets_u/css/animate.css')}}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/assets_u/vendors/fontawesome/css/all.min.css')}}" />
    <!-- elegent icon CSS -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/assets_u/vendors/themefy_icon/themify-icons.css')}}" />
    <!-- nice select CSS -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/assets_u/vendors/niceselect/css/nice-select.css')}}" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/assets_u/vendors/owl_carousel/css/owl.carousel.css')}}" />
    <!-- magnify popup CSS -->
    <link rel="stylesheet" href="{{asset('userpage/vendors/magnify_popup/magnific-popup.css')}}" />
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('userpage/css/style.css')}}" />
</head>
<body>

<!-- Preloader  -->
<div class='preloder'>
    <div class='loader'>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--text'></div>
    </div>
</div>
<!-- End Preloader  -->
<!-- hearder part  -->
<header class="header_part">
    <div class="sub_header section_bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <div class="header_contact_info">
                        <a href="mailto:be.gizachew@gmail.com" target="_blank"><i
                                class="fas fa-envelope"></i>teret-tert@gmail.com</a>
                        <a href="tel:+4641468425"><i class="fas fa-phone"></i>+251910101010</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-4">
                    <div class="header_social_icon">
                        <p>{{__('string.follow')}}</p>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index-2.html"><img src="<?php echo url('/'); ?>/assets/img/logo-removebg-preview.png"
                                srcset="<?php echo url('/'); ?>/assets/img/ratina_logo.png 2x" alt="Kidzo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                            <ul class="navbar-nav">

                            <li class="nav-item">
                                    <a class="nav-link active" href="{{url(app()->getLocale().'/index')}}">{{__('string.home')}}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('string.category')}}
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="event.html">Respect</a>
                                        <a class="dropdown-item" href="event_details.html">Hard work</a>
                                        <a class="dropdown-item" href="teacher_list.html">Culture</a>
                                        <a class="dropdown-item" href="teacher_details.html">Smart thinking</a>
                                        <a class="dropdown-item" href="program_list.html">Maths</a>
                                        <a class="dropdown-item" href="readable.html">Reading skills</a>
                                        <a class="dropdown-item" href="narration.html">Narrations</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="jokes.html">
                                        {{__('string.jokes')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url(app()->getLocale().'/about')}}">{{__('string.about')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url(app()->getLocale().'/contact')}}">{{__('string.contact')}}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle cu_btn btn_1" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       {{__('string.language')}}
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{str_replace('/en/','/am/',url()->current())}}">አማርኛ</a>
                                        <a class="dropdown-item" href="{{str_replace('/am/','/en/',url()->current())}}">English</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header part end -->


    @yield('content')


  <!-- jquery slim -->
    <script src="{{asset('userpage/js/jquery-3.5.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('userpage/js/popper.min.js')}}"></script>
    <!-- bootstarp js -->
    <script src="{{asset('userpage/js/bootstrap.min.js')}}"></script>
    <!-- nice select -->
    <script src="{{asset('userpage/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>
    <!-- owl carousel js -->
    <script src="{{asset('userpage/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>
    <!-- parallax js -->
    <script src="{{asset('userpage/vendors/parallax/jquery.parallax-scroll.js')}}"></script>
    <script src="{{asset('userpage/vendors/parallax/parallax.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('userpage/vendors/wow/wow.min.js')}}"></script>
    <!-- isotop js -->
    <script src="{{asset('userpage/vendors/isotop/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('userpage/vendors/isotop/isotope.pkgd.js')}}"></script>
    <!-- magnify popup js -->
    <script src="{{asset('userpage/vendors/magnify_popup/jquery.magnific-popup.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('userpage/js/custom.js')}}"></script>
</body>
</html>
