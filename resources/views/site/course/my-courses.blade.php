@extends('layouts.frontend.index')
@section('content')

   @if (Cart::count() <  1)
     <section class="courses-area white-bg pt-37 pb-20">
                <div class="container">
                    <h3> My Courses</h3>
                    <div class="row courses-active">
                      @if(count($courses) > 0 )
            @foreach($courses as $course)
                       
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
                         @else
                         
                            <h3>Sorry! No courses added to your account</h3>
                            <a href="{{ route('course.list') }}" class="btn btn-ulearn-cview mt-3">Explore Courses</a>
                    
                          @endif         
                    </div>
                </div>

            </section>
                    
               @else

               <div class="container">
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:50%">Course</th>
              <th style="width:10%">Price</th>
    
              <th style="width:10%">Action</th>
            </tr>
          </thead>
          <tbody>
             @foreach (Cart::content() as $item)
             <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-10">
                    <h4 class="nomargin">{{ $item->model->course_title  }}</h4>
                    <div>{{ $item->model->details }} </div>
                  </div>
                </div>

                
              </td>


              <td data-th="Price">${{ $item->model->price }} </td>
              
              
              <td class="actions" data-th="">
               
               <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-warning">Remove</button>
                            </form>
     
              </td>
            </tr>
 @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
             
              <td class="hidden-xs text-center"><strong>Total ${{ Cart::subtotal() }}</strong></td>
                <form action="{{ route('payment.pay') }}" method="POST">
                                {{ csrf_field() }}
                                @foreach (Cart::content() as $item)
                                   <input name="id[]" value="{{ Auth::user()->id }}" type="hidden">
                                    <input name="course_id[]" value="{{  $item->model->id  }}" type="hidden">
                                      <input name="price[]" value="{{  $item->model->price  }}" type="hidden">

                                 @endforeach
                                     <input name="total" value="{{ Cart::subtotal() }}" type="hidden">
                           
              </td>

              <td><button type="submit" class="btn btn-success btn-block">Make payment </button>
                   </form>
     
              </td>
            </tr>
          </tfoot>
        </table>
</div>
@endif
                               
            
        <!-- course list end -->
@endsection