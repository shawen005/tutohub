@extends('layouts.frontend.index')
@section('content')
<?php 
    $get = '';
    $link = Request::url();
    $i = $j = 0;
    // echo '<pre>';print_r($_GET);
    foreach ($_GET as $key => $value):
      if($key != 'sort_price' && $key != 'sort_rating')
      {
        if(is_array($value))
        {
            foreach ($value as $inner_value):
                $get .= ($i == 0) ? '?'.$key.'[]='.$inner_value : '&'.$key.'[]='.$inner_value;
            $i++;
            endforeach;
        }
        else
        {
            $get .= ($i == 0) ? '?'.$key.'='.$value : '&'.$key.'='.$value;    
        }
        
      }
        if(is_array($value))
        {
            foreach ($value as $inner_value):
                $link .= ($j == 0) ? '?'.$key.'[]='.$inner_value : '&'.$key.'[]='.$inner_value;
            $j++;
            endforeach;
        }
        else
        {
            $link .= ($j == 0) ? '?'.$key.'='.$value : '&'.$key.'='.$value;   
        }
      
    $i++;
    $j++;
    endforeach;
?>

        <!-- main-area -->
        <main>
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area">
                <div class="breadcrumb-bg" data-background="{{ asset('frontend/img/images/breadcrumb_bg03.jpg') }}"></div>
                <div class="breadcrumb-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="breadcrumb-content">
                                    <h2>Our Courses</h2>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Our Courses</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            <!-- courses-area -->

            <section class="courses-area pt-30 pb-10">
                <div class="container">
                      <div class="row mb-50">
                        
                        <div class="col-xl-8 col-md-9 col-sm-8">
                           
                            <div class="short-by d-none d-md-inline-block">
                                <form action="#">
                                    <select name="select" id="select">
                                        <option value="">Sort by</option>
                                       
                                        <option value="">low to high</option>
                                        <option value="">high to low</option>
                                       
                                    </select>
                                </form>
                            </div>
                            <div class="shop-search d-md-none d-block d-lg-inline-block">
                                <form action="#">
                                    <input type="text" placeholder="Search from here....">
                                    <button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="row">
                             
                               
                                
                                  @foreach($courses as $course)
                                <div class="col-xl-4 col-lg-6 col-sm-6">
                                    <div class="single-courses mb-30">
                                        <div class="courses-thumb">
                                            <img src="@if(Storage::exists($course->thumb_image)){{ Storage::url($course->thumb_image) }}@else{{ asset('backend/assets/images/course_detail_thumb.jpg') }}@endif" alt="img">
                                            <div class="courses-avatar">
                                                
                                                <p>{{ $course->first_name.' '.$course->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="courses-content p-relative">
                                            <p class="courses-price">$10</p>
                                          
                                            <h4><a href="{{ route('course.view', $course->course_slug) }}">{{ $course->course_title }}</a></h4>
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
                                    </div>
                                </div>
                               @endforeach
                               

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            
                            <div class="details-widget mb-30">
                                <div class="details-widget-title mb-15">
                                    <h4>Category</h4>
                                </div>
                                <div class="sidebar-courses-cat">
                                    <ul>
                                       
                                           @foreach ($categories as $category)
                                           
                                        <li><a href="{{ route('course.list','category_id[]='.$category->id) }}"></i>{{ $category->name }}</a></li>
                                       @endforeach 
                                    </ul>
                                </div>
                            </div>
                            <div class="details-widget mb-30">
                                <div class="details-widget-title mb-15">
                                    <h4>New Courses</h4>
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
                        </div>


                    </div>
                </div>
            </section>
            <!-- courses-area-end -->
        </main>
        <!-- main-area-end -->
    <!-- content end -->
@endsection

@section('javascript')
<script type="text/javascript">


$(document).ready(function()
{
    $('.filter-results').change(function()
    {
        $('#courseList').submit();
    });

    $('.sort-by').change(function()
    {
        var search = '{{ url("courses") }}';
        var get = '<?php echo $get;?>';
        var sort = $(this).val();
        var operand = '<?php echo empty($get) ? "?" : "&";?>';
        window.location = search + get + operand + sort;
    });

    $('.c-view').click(function()
    {
         var link = '{{ $link }}';
         var page_link = $(this).attr('href');
         $.ajax({
                type:  'get',
                cache:  false ,
                url:  '{{ route("course.breadcurmb") }}',
                data:  {link:link},
                success: function(data)
                {
                    window.location = page_link;
                }
            });
         return false;
    });
});
</script>
@endsection