@extends('layouts.app')

@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('date/css/bootstrap-datepicker.standalone.min.css')}}">
<link rel="stylesheet" href="{{asset('datepicker/build/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('select2/css/select2.min.css')}}">
    <style>
        body {background-color: #F0F0F0;}
        .invalid-feedback {display: block;}
        .select2 {
            margin-top: 18px;
        }
        .select2-container .select2-selection--single {height: 40px;padding-top: 5px;width: 100%;}
        label {color: #999;}
        .custom-img {width: 100px; position: relative; cursor: pointer;display: inline-block;}
        .custom-img img {border-radius: 5px;}
        .custom-img:hover img {opacity: .5;}
        .custom-img i {display: none; position: absolute; right: 5px; top: 5px; color: #a7662f;}
        .custom-img:hover i {display: block;}

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
                <h1>Once Upon a house</h1>
                <p><span></span></p>
            </div>
        </div>
    </div>
</section>

<section class="user_dashboard mt-3 mb-3">
    <div class="container p-3">
        <form action="{{ route('edit_hihome') }}" method="post" id="exp_form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="wajba_id" value="{{ $wajba->id }}">
            <div class="row user_content">
                <div class="col-6 p-4">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $wajba->title }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="description">About Your Experience</label>
                        <textarea name="description" id="description" cols="30" placeholder="Please write down what should the guest expects from your hosting experience" rows="5">{{ $wajba->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <select name="place_category" id="place_category" class="form-control mt-3">
                            <option value="">Place Type</option>
                            @foreach ($place as $item)
                                @if ($item->id == $wajba->place_category_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('place_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <select name="food_category" id="food_category" class="form-control mt-3">
                            <option value="">Food Type</option>
                            @foreach ($food as $item)
                                @if ($item->id == $wajba->food_category_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('food_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <select name="door_type" id="door_type" class="form-control mt-3">
                            <option value="">Door Type</option>
                            @if ($wajba->door_type == 'in_door')
                                <option value="in_door" selected>Indoor</option>
                                <option value="out_door">Outdoor</option>
                            @endif
                            @if ($wajba->door_type == 'out_door')
                                <option value="in_door">Indoor</option>
                                <option value="out_door" selected>Outdoor</option>
                            @endif
                        </select>
                        @error('door_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="city">Location</label>
                        <input type="text" name="city" id="city" value="{{ $wajba->city }}">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="inline_ele mb-1">
                        <div class="mt-1">
                            <label for="lat">Latitude</label>
                            <input type="text" name="lat" id="lat" value="{{ $wajba->latitude }}" readonly>
                            @error('lat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-1">
                            <label for="lot">Longitude</label>
                            <input type="text" name="lot" id="lot" value="{{ $wajba->longitude }}" readonly>
                            @error('lot')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="city">City Name</label>
                        <input type="text" name="city_name" id="city_name" value="{{ $wajba->city_name }}">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="inline_ele mb-1">
                        <div class="mt-1">
                            <label for="price">Price (SAR)</label>
                            <input type="number" name="price" id="price" value="{{ $wajba->price }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-1">
                            <label for="seat">Available Seats</label>
                            <input type="number" name="seat" id="seat" value="{{ $wajba->baseNumberOfSeats }}">
                            @error('seat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                </div>
                <div class="col-6 p-4">
                    <div>
                        <label for="health">Special Requests</label>
                        <textarea name="health" id="health" placeholder="Please write down any special requests that you would like the gusts to follow such as: I accept female only or no smoking inside the house" cols="30" rows="5">{{ $wajba->healthConditionsAndWarnings }}</textarea>
                        @error('health')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="inline_ele mb-1">
                        <div>
                            <label for="time">From time</label>
                            <input type="text" name="from_time" id="from_time" class="datetimepicker-input"  data-toggle="datetimepicker" data-target="#from_time">
                            @error('from_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="to_time">To time</label>
                            <input type="text" name="to_time" id="to_time" class="datetimepicker-input"  data-toggle="datetimepicker" data-target="#to_time">
                            @error('to_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @php
                        $dates = '';
                        if ($wajba->dates()->whereDate('date', '>=', date('Y-m-d'))->exists()) {
                            $dates = implode(',', $wajba->dates()->whereDate('date', '>=', date('Y-m-d'))->pluck('date')->toArray());
                        }
                    @endphp
                    <div>
                        <label for="days">Available Days</label>
                        <input type="text" name="days" value="{{ $dates }}" id="days">
                    </div>
                    @error('days')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="#" class="big_hint">If your image is more than 1MB you can compress the image via this <a href="https://tinypng.com" target="blank">link</a>.</label>
                    <div class="">
                        @php
                            $home_photo = $wajba->photos()->where('type', 0)->first();
                        @endphp
                        <div class="mt-1">
                            <img src="{{ asset($home_photo->url) }}" width="100" alt="Gallery1" style="border-radius: 5px;">
                        </div>
                    </div>
                    <div class="custom-file mt-1">
                        <input type="file" name="experience_image" class="custom-file-input" id="home_file">
                        <label class="custom-file-label" for="home_file">Experience image</label>
                    </div>
                    <label for="#" class="hint">Hint: Please make sure the image size is less than 1MB</label>
                    @error('experience_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    {{-- <div class="mt-3">
                        @php
                            $banner_photo = $wajba->photos()->where('type', 1)->first();
                        @endphp
                        <div class="mt-1">
                            <img src="{{ asset($banner_photo->url) }}" width="100" alt="Gallery1" style="border-radius: 5px;">
                        </div>
                    </div>
                    <div class="custom-file mt-1">
                        <input type="file" name="banner_file" class="custom-file-input" id="banner_file">
                        <label class="custom-file-label" for="banner_file">Photo for banner</label>
                    </div>
                    <label for="#" class="hint">Hint: Please make sure the image size is less than 1MB</label>
                    @error('banner_file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                    {{-- <label for="#">(Recomended dimention 1920*800)</label> --}}

                    <div class="mt-3">
                        @php
                            $photos = $wajba->photos()->where('type', 2)->get();
                        @endphp
                        @foreach ($photos as $item)
                            <div class="custom-img mt-1">
                                <img src="{{ asset($item->url) }}" width="100" alt="Gallery1" data-id="{{ $item->id }}" srcset="">
                                <i class="fas fa-trash" data-id="{{ $item->id }}"></i>
                            </div>
                        @endforeach
                    </div>
                    <div class="custom-file mt-1">
                        <input type="file" name="gallery_files[]" class="custom-file-input" id="gallery_files" multiple>
                        <label class="custom-file-label" for="gallery_files">Multiple Photos for Your Experience Gallery</label>
                    </div>
                    <label for="#" class="hint">Hint: Please make sure the image size is less than 1MB</label>
                    @error('gallery_files.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br><br>
                    <button class="btn btn-custom mt-2 w-100" id="create_exp" type="submit">Update</button>
                </div>

            </div>
        </form>
    </div>
</section>
<input type="hidden" name="" id="from" value="{{ $wajba->time->fromTime }}">
<input type="hidden" name="" id="to" value="{{ $wajba->time->toTime }}">
@endsection

@section('script')
<script src="{{asset('moment/moment.min.js')}}"></script>
<script src="{{asset('datepicker/build/js/tempusdominus-bootstrap-4.js')}}"></script>
<script src="{{asset('date/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('select2/js/select2.min.js')}}"></script>
    <script>
            $(".custom-file-input").on("change", function() {
                console.log($(this).val())
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $("#place_category").select2({
                placeholder: 'Place Type'
            });
            $("#food_category").select2({
                placeholder: 'Food Type'
            });

        $('#from_time').datetimepicker({
            format: 'HH:mm'
        });
        $('#to_time').datetimepicker({
            useCurrent: false,
            format: 'HH:mm'
        });
        $('#from_time').val($('#from').val());
        $('#to_time').val($('#to').val());
        $('#days').datepicker({
            format: 'yyyy-mm-dd',
            multidate:true,
            todayHighlight: true,
            orientation: "bottom left",
            clearBtn: true,
            startDate: new Date(),
        });

        $("#from_time").on("change.datetimepicker", function (e) {
            $('#to_time').datetimepicker('minDate', e.date);
        });

        $(document).ready(function(){
            $('#create_exp').click(function(){
                $(this).attr('disabled', 'disabled')
                $('#exp_form').submit();
            })

            $('.custom-img img, .custom-img .fa-trash').click(function(){
                let photo_id = $(this).attr('data-id');
                let _current = $(this)
                $.ajax({
                    url: '/gallery_delete',
                    type: 'get',
                    data: {id: photo_id},
                    success: function(data){
                        _current.parent('.custom-img').remove()
                    }
                })
            })
            // $('.custom-img .fa-trash').click(function(){
            //     let photo_id = $(this).attr('data-id');
            //     let _current = $(this)
            //     $.ajax({
            //         url: '/gallery_delete',
            //         type: 'get', s
            //         data: {id: photo_id},
            //         success: function(data){
            //             _current.parent('.custom-img').remove()
            //         }
            //     })
            // })

        })

        if($('#success_message').val() != ''){
            toast_call('Error', $('#success_message').val(), false, 'error', '#a94442')
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
                city.focus()
                return;
            }
            let lat = document.getElementById('lat');
            let lot = document.getElementById('lot');
            let city_name = document.getElementById('city_name');
            lat.value = place.geometry.location.lat()
            lot.value = place.geometry.location.lng()
            city_name.value = place.name
            // console.log(place.geometry.location.lat())
            // console.log(place.geometry.location.lng())
        })
        google.maps.event.addDomListener(city, 'keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
        });
    })
</script>
@endsection
