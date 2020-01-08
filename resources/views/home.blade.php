@extends('layouts.app')

@section('title', 'Dashboard')
@section('css')
    <style>
        body {background-color: #F0F0F0;}
        .invalid-feedback {display: block;}
        .hint {margin: 0; font-size: 12px;color: #999;}
    </style>
@endsection
@php
    $side_bar = session('side_bar');
@endphp
@section('content')
<section>
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__tittle">
                @if ($user->role->type == 'host')
                    <h1>@lang('messages.Once_Upon_a_house')</h1>
                    <p> <span></span> </p>                    
                @else
                    <h1>@lang('messages.Once_Upon_a_house')</h1>
                    <p> <span></span> </p>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="user_dashboard mt-5 mb-5">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-3 col-12 side_bar p-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if ($user->photo()->exists())
                            <img src="{{ asset($user->photo->url) }}" class="custom_avatar_image" alt="User Photo" width="150" id="avatar" height="150" srcset="">
                        @else
                            <div class="custom_avatar_large m-auto">{{ $user->avatar }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mt-3 side_bar_content">
                    @include('side_for_home')
                </div>
            </div>
            <div class="col-md-1 col-12"></div>
            <div class="col-md-8 col-12 user_content p-4">
                <form action="{{ route('profile_edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="inline_ele">
                        <div>
                            <label for="first_name">@lang('messages.First_Name')</label>
                            <input type="text" name="firstName" id="first_name" value="{{ $user->firstName }}">
                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="last_name">@lang('messages.Last_Name')</label>
                            <input type="text" name="lastName" id="last_name" value="{{ $user->lastName }}">
                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="inline_ele">
                        <div>
                            <label for="email">@lang('messages.Email')</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="phone">@lang('messages.Phone')</label>
                            <input type="text" name="phone" id="phone" value="{{ $user->mobile }}" disabled readonly>
                        </div>
                    </div>
                    <div class="inline_ele">
                        <div>
                            <label for="gender" style="margin-bottom: 1rem;"> @lang('messages.Gender')</label>
                            <select name="gender" id="gender">
                                @if ($user->gender == 'Male')
                                    <option value="Male" selected>  @lang('messages.Male')</option>
                                    <option value="Female"> @lang('messages.Female')</option>
                                @else
                                    <option value="Male">@lang('messages.Male')</option>
                                    <option value="Female" selected>@lang('messages.Female')</option>
                                @endif
                            </select>
                        </div>
                        <div>
                            <label for="" style="margin-bottom: 0;"> @lang('messages.Photo')</label>
                            <label for="#" class="big_hint" style="display:block;">@lang('messages.If_your_image_is_more_than_1MB_you_can_compress_the_image_via_this_link') <a href="https://tinypng.com" target="blank">link</a>.</label>
                            <div class="custom-file">
                                <label for="photo" class="custom-file-label">@lang('messages.Choose_file')  </label>
                                <input type="file" class="custom-file-input" name="photo" id="photo">
                            </div>
                            <label for="#" class="hint"> @lang('messages.Hint:_Please_make_sure_the_image_size_is_less_than_1MB')</label>
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="{{$user->role->type == 'host' ? 'inline_ele' : ''}}">
                        <div>
                            <label for="city">@lang('messages.City')</label>
                            <input type="text" name="city" id="city" value="{{ $user->city }}">
                        </div>
                        @if ($user->role->type == 'host')
                            <div>
                                <label for="nameId"> @lang('messages.Nickname')</label>
                                <input type="text" name="nameId" id="name_id" value="{{ $user->host->nameId }}" disabled readonly>
                                @error('nameId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                            
                        @endif
                    </div>
                    @if ($user->role->type == 'host')
                        <div>
                            <label for="about_you">   @lang('messages.About_You')</label>
                            <textarea name="aboutYou" id="about_you"  cols="30" rows="5">{{ $user->host->aboutYou }}</textarea>
                            @error('aboutYou')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                        
                    @endif
                    <input class="footer-form__submit" type="submit" value="SAVE">
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#photo").change(function() {
                readURL(this);
            });
            $(".custom-file-input").on("change", function() {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        })



        function readURL(input) {
            if (input.files && input.files[0]) {
            let reader = new FileReader();
            
            reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
            }
        }

        if($('#success_message').val() != ''){
            toast_call('Success', $('#success_message').val(), false)
        }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ config('app.googlemap_key') }}&libraries=places"></script>
    <script defer>
        $(document).ready(function(){
            let city = document.getElementById('city')
            var autocomplete = new google.maps.places.Autocomplete(city, {componentRestrictions: {country: "sa"}});
            autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                // console.log(place.geometry.location.lat())
                // console.log(place.geometry.location.lng())    
            })
        })
    </script>
@endsection