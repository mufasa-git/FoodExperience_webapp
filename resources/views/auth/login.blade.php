<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LogIn | {{ config('app.name', 'Hihome') }}</title>

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('frontend/styles/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/spinkit.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/bracket.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/custom.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-gray-200 ht-100v">
        <img src="{{asset('frontend/images/login_banner.jpg')}}" class="wd-100p ht-100p object-fit-cover" alt="">
        <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
            <form action="{{ route('login') }}" method="post" id="login_submit">
                @csrf
                <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base animated zoomIn" id="login_form">
                    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><a href="{{ asset('/') }}"><img src="{{asset('img/logo.png')}}" width="75" alt="logo"></a></div>
                    <div class="tx-center mg-t-20 mg-b-10">@lang('messages.Please_enter_credentials')</div>

                    <div class="form-group">

                        {{-- <div class="d-md-flex pd-y-20 pd-md-y-0"> --}}
                            {{-- <input type="text" class="form-control wd-60 mg-r-5" name="phone_code" id="phone_code" value="+966" required> --}}
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required placeholder="@lang('messages.Enter_your_mobile')" id="mobile_input" autofocus autocomplete="off">
                            <label for="#" style="margin: 0;">@lang('messages.Example_+95555111111') 955511111111</label>
                        {{-- </div> --}}
                        @error('mobile')
                            <span class="invalid-feedback" style="display:block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="@lang('messages.Enter_your_password')" id="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- form-group -->
                    <button type="submit" class="btn btn-custom btn-block" id="login">@lang('messages.Sign_In')</button>
                    @if (Route::has('password.request'))
                        <a class="tx-info tx-12 d-block mg-t-10 text-center" href="{{ route('password.request') }}">
                            <!-- {{ __('Forgot Your Password?') }}  -->@lang('messages.Forget_Your_Password')
                        </a>
                    @endif
                    <a href="javascript:void(0);" class="tx-info tx-12 d-block mg-t-20 text-center" id="to_verify"> 
                     @lang('messages.Login_with_SMS')</a>

                    <div class="mg-t-30 tx-center">@lang('messages.Not_yet_a_member?') <a href="{{ route('register') }}" class="tx-info">@lang('messages.Sign_Up')</a></div>
                </div><!-- login-wrapper -->
            </form>

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base display_none animated zoomIn" id="verify_form">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><a href="{{ asset('/') }}"><img src="{{asset('img/logo.png')}}" width="75" alt="logo"></a></div>
                <div class="tx-center mg-t-20 mg-b-10">@lang('messages.Enter_your_mobile')</div>
                <div class="form-group">
                    <div class="d-md-flex pd-t-20 pd-md-y-0">
                        <input type="text" class="form-control wd-60 mg-r-5" id="phone_code" value="+966" required>
                        <input type="text" class="form-control" placeholder="Enter your mobile" id="mobile_verify" value="" required>
                        <div class="clearfix"></div>
                    </div>
                    <span class="custom-invalid-feedback display_none" id="not_mobile" role="alert">
                        <strong>@lang('messages.the_mobile_number_is_registered')</strong>
                    </span>
                    <span class="custom-invalid-feedback display_none" id="empty_mobile" role="alert">
                        <strong>@lang('messages.The_phone_number_or_password_you’ve_entered_doesn’t_match_any_account.')</strong>
                    </span>
                    <span class="custom-invalid-feedback display_none" id="many_mobile" role="alert">
                        <strong>Too many requests.</strong>
                    </span>
                </div><!-- form-group -->
                <button type="button" class="btn btn-custom btn-block" id="verify">@lang('messages.Sign_In') </button>
                <a href="javascript:void(0);" class="tx-info tx-12 d-block mg-t-30 text-center" id="to_login">Login with mobile and password</a>

                <div class="mg-t-20 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info"> @lang('messages.Sign_Up') </a></div>
            </div><!-- login-wrapper -->

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base display_none animated zoomIn" id="confirm_form">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><a href="{{ asset('/') }}"><img src="{{asset('img/logo.png')}}" width="75" alt="logo"></a></div>
                <div class="alert alert-success display_none" id="empty_alert">
                    <strong>Success!</strong> Resent code successfully.
                </div>
                <div class="tx-center mg-t-20 mg-b-10">Please enter your verification code</div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your code" id="code_confirm">
                    <span class="custom-invalid-feedback display_none" id="empty_code" role="alert">
                        <strong>Please enter confirm code.</strong>
                    </span>
                    <span class="custom-invalid-feedback display_none" id="invaild_code" role="alert">
                        <strong>The code you’ve entered is incorrect, please enter the correct code.</strong>
                    </span>
                </div><!-- form-group -->
                <a href="{{ route('login') }}" class="tx-info tx-12 d-block mg-t-30 text-center">Login with mobile and password</a>
                <button type="button" class="btn btn-info btn-block mg-t-20" id="confirm"> @lang('messages.Confirm')</button>
                <button type="button" class="btn btn-custom btn-block mg-t-20 display_none" id="resend">   @lang('messages.Resend')</button>
            </div><!-- login-wrapper -->
        </div>
    </div><!-- d-flex -->

    <div class="loader_container display_none">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1 bg-gray-800"></div>
            <div class="sk-child sk-bounce2 bg-gray-800"></div>
            <div class="sk-child sk-bounce3 bg-gray-800"></div>
        </div>
    </div>

    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('js/frontend/login.js') }}"></script>
  </body>
</html>
