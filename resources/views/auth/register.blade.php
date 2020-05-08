@extends('layouts.frontend.index')

@section('content')


     <main>
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area">
                <div class="breadcrumb-bg" data-background="{{ asset('frontend/img/images/breadcrumb_bg02.jpg') }}"></div>
                <div class="breadcrumb-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="breadcrumb-content">
                                    <h2>Register</h2>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            <!-- contact-area -->
            <section class="contact-area contact-padding pt-30 pb-10">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-8">
                            <div class="contact-wrap mb-30">
                               
                                <div class="contact-form">
                                     <div class="rightRegisterForm">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="registerForm">
                        {{ csrf_field() }}
                        <div class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                      
                                        <input type="text" class="form-control form-control-sm" placeholder="First Name" value="@if(!empty($name)){{ $name }}@else{{ old('first_name') }}@endif" name="first_name"   >
                                        @if ($errors->has('first_name'))
                                        <label class="error" for="first_name">{{ $errors->first('first_name') }}</label>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        
                                        <input type="text" class="form-control form-control-sm" placeholder="Last Name" value="{{ old('last_name') }}" name="last_name">
                                        @if ($errors->has('last_name'))
                                        <label class="error" for="last_name">{{ $errors->first('last_name') }}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                               
                                <input type="text" class="form-control form-control-sm" placeholder="Email ID" value="@if(!empty($name)){{ $email }}@else{{ old('email') }}@endif" name="email">
                                @if ($errors->has('email'))
                                <label class="error" for="email">{{ $errors->first('email') }}</label>
                                @endif
                            </div>


                            <div class="form-group">
                               
                                <select  class="form-control form-control-sm"  name="role" >

                                <option>Select Role</option>
                                <option value='student'>student</option>
                                <option value='instructor'> instructor</option>
                                <option value='admin'> admin </option>
                                </select>
                            </div>

                            <div class="form-group">
                               
                                <input type="password" class="form-control form-control-sm" placeholder="Password" name="password" id="password">
                                @if ($errors->has('password'))
                                <label class="error" for="password">{{ $errors->first('password') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                               
                                <input type="password" class="form-control form-control-sm" placeholder="Confirm Password" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                <label class="error" for="password_confirmation">{{ $errors->first('password_confirmation') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="offer" name="offer" {{ old('offer') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="offer">Receive relevant offers & communications</label>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-lg btn-block login-page-button">Register</button>
                            </div>

                        </div>
                        </form>
                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
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
            <!-- contact-area-end -->
        </main>
        <!-- main-area-end -->



@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function()
{
    $("#registerForm").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email:{
                    required: true,
                    email:true,
                    remote: "{{ url('checkUserEmailExists') }}"
                },
                password:{
                    required: true,
                    minlength: 6
                },
                password_confirmation:{
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                first_name: {
                    required: 'The fname field is required.'
                },
                last_name: {
                    required: 'The lname field is required.'
                },
                email: {
                    required: 'The email field is required.',
                    email: 'The email must be a valid email address.',
                    remote: 'The email has already been taken.'
                },
                password: {
                    required: 'The password field is required.',
                    minlength: 'The password must be at least 6 characters.'
                },
                password_confirmation: {
                    required: 'The password confirmation field is required.',
                    equalTo: 'The password confirmation does not match.'
                }
            }
        });

});
</script>
@endsection