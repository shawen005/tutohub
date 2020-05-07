@extends('layouts.frontend.index')
@section('content')

    <!-- main-area -->
        <main>
            <!-- slider-area -->

            <section class="slider-area slider-one-bg" data-background="{{ asset('frontend/img/slider/slider_bg01.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-10">
                            <div class="slider-content slider-content-p">
                                <h2 class="wow fadeInUp" data-wow-delay=".2s">Get skills from our top class courses</h2>
                                <p class="wow fadeInUp" data-wow-delay=".4s">Our on-demand videos and interactive code challenges are there for you when you need them.</p>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay=".6s">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider-area-end -->
            <!-- features-area -->
            <section class="features-area features-mt">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-features mb-30">
                                <div class="features-top">
                                    <div class="features-icon">

                                        <img src="{{asset('frontend/img/icon/features_icon01.png') }}" alt="icon">
                                    </div>
                                    <h3>Expert Instructor</h3>
                                </div>
                                <div class="features-content">
                                    <p>Online learning program threat designed to prepare you.</p>
                                </div>
                                <div class="features-check"><i class="fas fa-check"></i></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-features mb-30">
                                <div class="features-top">
                                    <div class="features-icon">
                                        <img src="{{ asset('frontend/img/icon/features_icon02.png') }}" alt="icon">
                                    </div>
                                    <h3>Unlimited Access</h3>
                                </div>
                                <div class="features-content">
                                    <p>Online learning program threat designed to prepare you.</p>
                                </div>
                                <div class="features-check"><i class="fas fa-check"></i></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-features mb-30">
                                <div class="features-top">
                                    <div class="features-icon">
                                        <img src="{{ asset('frontend/img/icon/features_icon03.png') }}" alt="icon">
                                    </div>
                                    <h3>3,10,109 Courses</h3>
                                </div>
                                <div class="features-content">
                                    <p>Online learning program threat designed to prepare you.</p>
                                </div>
                                <div class="features-check"><i class="fas fa-check"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
          
           
            <!-- courses-area -->
            <section class="courses-area gray-bg pt-137 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-35">
                                <h2>Popular Courses</h2>
                                <p>Online learning program designed to prepare you for a career</p>
                            </div>
                        </div>
                    </div>
                    <div class="row courses-active">
                       @foreach ($latestTab_courses as $course)
                       
                        <div class="col-xl-3">
                            <div class="single-courses mb-30">
                                <div class="courses-thumb">

                                    <img src="@if(Storage::exists($course->thumb_image)){{ Storage::url($course->thumb_image) }}@else{{ asset('backend/assets/images/course_detail_thumb.jpg') }}@endif" alt="img">
                                    <div class="courses-avatar">
                                        
                                        <p>{{ $course->first_name.' '.$course->last_name }}</p>
                                    </div>
                                </div>
                                <div class="courses-content p-relative">
                                    <p class="courses-price">₦{{ $course->price }} </p>
                                    <span><i class="far fa-bookmark"></i> Javascript</span>
                                    <h4><a href="{{ route('course.view', $course->course_slug) }}">{{ $course->course_title }}</a></h4>
                                    <div class="courses-meta">
                                        <ul>
                                            <li class="courses-user"><i class="far fa-user"></i> 10,455</li>
                                            <li class="courses-rating">
                                              
                                                  @for ($r=1;$r<=5;$r++)
                                                <i class="fas fa-star"></i>
                                                @endfor
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach

                    </div>
                </div>
            </section>
         
            <!-- testimonial-area-end -->
            <!-- brand-area -->
            <div class="brand-area brand-padding pt-145 pb-140">
                <div class="container">
                  
                </div>
            </div>
            <!-- brand-area-end -->
            <!-- courses-create -->
            <section class="courses-create courses-create-p">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-11">
                            <div class="section-title text-center mb-65">
                                <h2>Our powerful platform are easy <br> & useful for create courses</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-c-create mb-40">
                                <h4>Create Quizzes</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                            <div class="single-c-create mb-40">
                                <h4>Students Feedback</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                            <div class="single-c-create mb-40">
                                <h4>Multimedia Lectures</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                            <div class="single-c-create mb-40">
                                <h4>List Segmentation</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="c-create-img text-center">

                                <img src="{{asset('frontend/img/images/courses_create_img.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-c-create mb-40">
                                <h4>Promotions</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                            <div class="single-c-create mb-40">
                                <h4>Tools Integrations</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                            <div class="single-c-create mb-40">
                                <h4>Easy Builder</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                            <div class="single-c-create mb-40">
                                <h4>Page Editor</h4>
                                <p>Online learning program that is designed to prepare your courses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- courses-create-end -->
            <!-- instructor-area -->
           
            <!-- instructor-area-end -->
            <!-- cta-area -->
             <section class="instructor-area gray-bg pt-137">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-65">
                                <h2>Top Instructor</h2>
                                <p>Online learning program designed to prepare you for a career</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                          @foreach ($instructors as $instructor)
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-instructor text-center mb-30">
                                <div class="instructor-thumb">

                                    <a href="#"><img src="@if(Storage::exists($instructor->instructor_image)){{ Storage::url($instructor->instructor_image) }}@else{{ asset('backend/assets/images/course_detail_thumb.jpg') }}@endif" alt="img"></a>
                                </div>
                                <div class="instructor-content">
                                    <h4><a href="#">{{ $instructor->first_name.' '.$instructor->last_name }}</a></h4>
                                   
                                </div>
                            </div>
                        </div>
                           @endforeach
                       


                    </div>
                </div>
            </section>
            <section class="cta-area gray-bg pt-107 pb-150">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="section-title text-center mb-40">
                                <h2>Become An Instructor</h2>
                                <p>Online learning program designed to prepare you for a career that can change
                                your life from before. Register for instructor</p>
                            </div>
                            <div class="cta-btn text-center">
                                <a href="#" class="btn">Apply for An Instructor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta-area-end -->
        
            <!-- event-area-end -->
            <!-- enrolling-area -->

            <section class="enrolling-area enrolling-bg" data-background="{{asset('frontend/img/images/map_bg.png')}}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="section-title text-center mb-45">
                                <h2>Thousands of Students are enrolling in everyday</h2>
                            </div>
                            <div class="enrolling-btn text-center">
                                <a href="#" class="btn">Start A Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="enrolling-img mt-45">

                                <img src="{{asset('frontend/img/images/enrolling_img.png')}}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- enrolling-area-end -->
        </main>
@endsection