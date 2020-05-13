@extends('layouts.frontend.index')
@section('content')

    <!-- main-area -->
        <main>
            
           
            <!-- courses-area -->
            <section class="courses-area gray-bg pt-137 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-35">
                                <h2> Your COurses</h2>
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
         
            
    
            <!-- enrolling-area-end -->
        </main>
@endsection