@extends('layouts.frontend.index')
@section('content')
<!-- content start -->
  <main>
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area">
                <div class="breadcrumb-bg" data-background="{{ asset('frontend/img/images/breadcrumb_bg03.jpg') }}" ></div>
                <div class="breadcrumb-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="breadcrumb-content">
                                    <h2></h2>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $course->course_title }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            <!-- courses-details-area -->
            <section class="courses-details-area pt-150 pb-115">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="courses-details">
                                <div class="courses-details-info mb-40">
                                    <h2>{{ $course->course_title }}</h2>
                                    <div class="courses-avatar">
                                        <div class="courses-avatar-img">
                                            <img src="{{ asset('frontend/img/courses/courses_avatar.png') }}" alt="img">
                                        </div>
                                        <p>{{ $course->instructor->first_name.' '.$course->instructor->last_name }}</p>
                                    </div>
                                    <div class="courses-meta">
                                        <ul>
                                            <li class="courses-user"><i class="far fa-user"></i> 10,455</li>
                                            <li class="courses-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="courses-details-thumb mb-40">
                                    <img src="{{asset('frontend/img/courses/courses_details_img.jpg')}}" alt="img">
                                </div>
                                <div class="courses-details-tabs mb-30">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview"
                                                aria-selected="true"><i class="fas fa-list-ul"></i>Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="curriculum-tab" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum"
                                                aria-selected="false"><i class="far fa-copy"></i>Curriculum</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor"
                                                aria-selected="false"><i class="far fa-user"></i>Instructor</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                                aria-selected="false"><i class="far fa-comment-dots"></i>Reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                            <div class="courses-details-content">
                                                  {!! $course->overview !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                             @foreach($curriculum_sections as $curriculum_section => $curriculum_lectures)
                      <?php 
                        $section_split = explode('{#-#}', $curriculum_section);
                        $section_id = $section_split[0];
                        $section_name = $section_split[1];
                      ?>
                      <div class="card mb-2">
                        <div class="card-header" id="headingOne-{{ $section_id }}">
                          <h5 class="mb-0">
                            <button class="btn btn-acc-head" type="button" data-toggle="collapse" data-target="#collapseOne-{{ $section_id }}" aria-expanded="true" aria-controls="collapseOne-{{ $section_id }}">
                              <i class="fas @if($loop->first) fa-minus @else fa-plus @endif accordian-icon mr-2" ></i><span>{{ $section_name }}</span>
                            </button>
                          </h5>
                        </div>

                        <div id="collapseOne-{{ $section_id }}" class="collapse @if($loop->first) show @endif" aria-labelledby="headingOne-{{ $section_id }}" data-parent="#accordionExample">
                          <div class="container">
                            
                          @foreach($curriculum_lectures as $curriculum_lecture)
                            @php
                                switch ($curriculum_lecture->media_type) {
                                    case 0:
                                        $icon_class = 'fas fa-video';
                                        break;
                                    case 1:
                                        $icon_class = 'fas fa-headphones';
                                        break;
                                    case 2:
                                        $icon_class = 'far fa-file-pdf';
                                        break;
                                    case 3:
                                        $icon_class = 'far fa-file-alt';
                                        break;
                                    default:
                                        $icon_class = 'fas fa-video';
                                }
                            @endphp
                            <div class="row lecture-container">
                                <div class="col-8 my-auto ml-4">
                                    <i class="{{ $icon_class }} mr-2"></i>
                                    <span>{{ $curriculum_lecture->l_title }}</span>
                                </div>
                                <div class="col-3 my-auto">
                                    <article  class="preview-time">
                                        <span>
                                            @if($curriculum_lecture->media_type == 2)
                                                {{ $curriculum_lecture->f_duration.' Pages' }}
                                            @elseif($curriculum_lecture->media_type == 0 || $curriculum_lecture->media_type == 1)
                                                @if($curriculum_lecture->media_type == 0)
                                                    {{ $curriculum_lecture->v_duration }}
                                                @else
                                                    {{ $curriculum_lecture->f_duration }}
                                                @endif
                                            @endif
                                        </span>
                                    </article>
                                </div>
                            </div>
                          @endforeach  
                          </div>
                        </div>
                      </div>
                      @endforeach
                                        </div>
                                       
                                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                            <div class="courses-details-content">
                                                {!! $course->instructor->biography !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                            <div class="courses-details-content">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="sidebar-courses-enroll">
                                <h2>$100</h2>
                                 <h5><a href="{{ route('cart.store', $course) }}">Enroll Now</a></h5>
                                    
                            </div>
                            <div class="details-widget mb-30">
                                <div class="details-widget-title mb-15">
                                    <h4>Course Specifications</h4>
                                </div>
                                <div class="event-details-list sc-specifications">
                                    <ul>
                                        <li><i class="far fa-clock"></i>Duration : <span>3 Hours</span></li>
                                        <li><i class="fas fa-signal"></i>Difficulty : <span>Mid Level</span></li>
                                        <li><i class="fas fa-book"></i>Lectures : <span>45 Lectures</span></li>
                                        <li><i class="fas fa-university"></i>Certificate : <span>Yes</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details-widget mb-30">
                                <div class="details-widget-title mb-15">
                                    <h4>Related Courses</h4>
                                </div>
                                <div class="sidebar-popular-courses">
                                    <ul>
                                        <li>
                                            <div class="sp-courses-thumb">
                                                <a href="#"><img src="{{ asset('frontend/img/courses/sp_courses_thumb01.jpg') }}" alt="img"></a>
                                            </div>
                                            <div class="sp-courses-content">
                                                <h5><a href="#">Basic c++ from beginning</a></h5>
                                                <span>Free</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sp-courses-thumb">
                                                <a href="#"><img src="{{ asset('frontend/img/courses/sp_courses_thumb02.jpg') }}" alt="img"></a>
                                            </div>
                                            <div class="sp-courses-content">
                                                <h5><a href="#">Android from beginning</a></h5>
                                                <span>50$</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sp-courses-thumb">
                                                <a href="#"><img src="{{ asset('frontend/img/courses/sp_courses_thumb03.jpg') }}" alt="img"></a>
                                            </div>
                                            <div class="sp-courses-content">
                                                <h5><a href="#">Javascript from beginning</a></h5>
                                                <span>50$</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-courses-banner text-center mb-35">
                                <img src="{{ asset('frontend/img/courses/courses_banner.jpg') }}" alt="img">
                                <div class="sbanner-overlay-content">
                                    <h2>Save 30%</h2>
                                    <p>from all courses</p>
                                    <a href="#" class="btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- courses-details-area-end -->
        </main>

@endsection