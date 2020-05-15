<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tutohub LMS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
        
        <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">

         <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.css') }}">
        
        <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
         <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
        
        <link rel="stylesheet" href="{{ asset('backend/fonts/web-icons/web-icons.min599c.css?v4.0.2') }}">
        <link rel="stylesheet" href="{{ asset('backend/vendor/toastr/toastr.min599c.css?v4.0.2') }}">
        
    </head>
    <body>
            <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header -->
        <header>
         
            <div id="header-sticky" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4">
                            <div class="logo">
                                <a href="index.html"><img src="{{asset('frontend/img/logo/logo.png')}}" alt="logo"></a>

                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 d-none d-md-block">
                            <div class="header-search-bar">
                                <form method="GET" action="{{ route('course.list') }}">
                                    <input type="text" name="keyword" placeholder="Search Courses .." >
                                    <button type="submit" ><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 text-right d-none d-lg-block">
                            <div class="main-menu d-inline-block">
                                <nav id="mobile-menu">
                                    <ul>
                                          <?php 
                                           $categories = SiteHelpers::active_categories();
                                           ?>
                                        <li class="menu-item-has-children"><a href="#">Categories</a>
                                            <ul class="submenu">
                                                 @foreach ($categories as $category)
                                                <li><a href="{{ route('course.list','category_id[]='.$category->id) }}"> {{ $category->name}}</a></li>
                                                  @endforeach
                                            </ul>
                                        </li>
                                    


                                    </ul>

                                </nav>
                            </div>
                            @guest
   <div class="header-sign-btn s-header-sign-btn d-none d-lg-inline-block">
                                <a href="/login">Log in</a>
                                <a href="/register">Sign Up</a>
                            </div>
                             @else
         <div class="header-sign-btn s-header-sign-btn d-none d-lg-inline-block">                     
   
        <a href="">My Account</a>
   
  
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
      </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest
                            <div class="shop-cart-icon d-none d-xl-inline-block">
                                <a href="/cart"><img src="{{asset('frontend/img/icon/shop_cart.png')}}" alt="icon"></a>
                                <span>{{ Cart::count() }}</span>
                            </div>


                        </div>
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->

       @yield('content')
        <!-- main-area-end -->

        <!-- footer -->
        <footer class="footer-area black-bg">
            <div class="footer-top-wrap pt-95 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-logo mb-15">

                                    <a href="index.html"><img src="{{asset('frontend/img/logo/w_logo.png')}}" alt="Logo"></a>
                                </div>
                                <div class="footer-text">
                                    <p>We provides universal access to the world’s best education, partnering with top universities and make with top students
                                    with great result.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 pr-50">
                            <div class="footer-widget mb-50">
                                <div class="fw-title mb-20">
                                    <h4>Useful Links</h4>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Home</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> About</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Courses</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Instructor</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-sm-6 pr-40">
                            <div class="footer-widget mb-50">
                                <div class="fw-title mb-20">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="fw-contact">
                                    <ul>
                                        <li><i class="fas fa-phone"></i> 545 - 123 - 467</li>
                                        <li><i class="far fa-envelope"></i> ourmail@infomail.com</li>
                                        <li><i class="fas fa-map-marker-alt"></i> Northern East, USA</li>
                                        <li><i class="fas fa-fax"></i> 123 456 789 0</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright-wrap">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="copyright-text">
                                <p>&copy; Copyrights 2019 TUTOHUB Designed By Love. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="copyright-social text-center text-md-right">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->



    
    <script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('frontend/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>

     <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
   

    <script>
    $(window).on("load", function (e){
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function()
        {   
            /* Delete record */
            $('.delete-record').click(function(event)
            {
                var url = $(this).attr('href');
                event.preventDefault();
                
                if(confirm('Are you sure want to delete this record?'))
                {
                    window.location.href = url;
                } else {
                    return false;
                }

            });

            /* Toastr messages */
            toastr.options.closeButton = true;
            toastr.options.timeOut = 5000;
            @if(session()->has('success'))
                toastr.success("{{ session('success') }}");
            @endif
            @if(session()->has('status'))
                toastr.success("{{ session('status') }}");
            @endif
            @if(session()->has('error'))
                toastr.error("{{ session('error') }}");
            @endif
            @if(session()->has('info'))
                toastr.info("{{ session('info') }}");
            @endif

            $('.mobile-nav').click(function()
            {
                $('#sidebar').toggleClass('active');
                
                $(this).toggleClass('fa-bars');
                $(this).toggleClass('fa-times');
            });

            $("#becomeInstructorForm").validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    contact_email:{
                        required: true,
                        email:true
                    },
                    telephone: {
                        required: true
                    },
                    paypal_id:{
                        required: true,
                        email:true
                    },
                    biography: {
                        required: true
                    },
                },
                messages: {
                    first_name: {
                        required: 'The first name field is required.'
                    },
                    last_name: {
                        required: 'The last name field is required.'
                    },
                    contact_email: {
                        required: 'The contact email field is required.',
                        email: 'The contact email must be a valid email address.'
                    },
                    telephone: {
                        required: 'The telephone field is required.'
                    },
                    paypal_id: {
                        required: 'The paypal id field is required.',
                        email: 'The paypal id must be a valid email address.'
                    },
                    biography: {
                        required: 'The biography field is required.'
                    },
                }
            });
        });
    </script>
    @yield('javascript')
    </body>
</html>