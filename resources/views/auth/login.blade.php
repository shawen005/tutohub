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
                                    <h2>Login</h2>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Login</li>
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
                                  <form id="loginForm" class="form-horizontal" method="POST" action="{{ route('login') }}">
                                   {{ csrf_field() }}
            
                            <div class="form-group">
                                <label>Email ID</label>
                                <input name="email" type="text" class="form-control form-control-sm" placeholder="Email ID" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <label class="error" for="email">{{ $errors->first('email') }}</label>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control form-control-sm" placeholder="Password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                <label class="error" for="password">{{ $errors->first('password') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row m-0">
                                    <div class="custom-control custom-checkbox col-6">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">Remember me</label>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('password.request') }}" class="float-right forgot-text">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-block login-page-button">Login</button>
                            </div>


                            <div class="hr-container">
                               <hr class="hr-inline" align="left">
                               <span class="hr-text"> or </span>
                               <hr class="hr-inline" align="right">
                            </div>

                            <div class="form-group">
                                <a href="{{ url('login/facebook') }}" class="btn btn-lg btn-block social-btn facebook-btn">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fab fa-facebook-f float-right"></i>
                                        </div>
                                        <div class="col-9">
                                            <span>
                                            Login with Facebook
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="form-group">
                                <a href="{{ url('login/google') }}" class="btn btn-lg btn-block social-btn google-btn">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fab fa-google-plus-g float-right"></i>
                                        </div>
                                        <div class="col-9">
                                            <span>
                                            Login with Google plus
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                                    </form>
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
    $("#loginForm").validate({
            rules: {
                email:{
                    required: true,
                    email:true
                },
                password:{
                    required: true
                }
            },
            messages: {
                email: {
                    required: 'The email field is required.',
                    email: 'The email must be a valid email address.'
                },
                password: {
                    required: 'The password field is required.'
                }
            }
        });

});
</script>
@endsection