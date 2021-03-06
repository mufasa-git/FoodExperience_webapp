@extends('layouts.app')

@section('title', 'Dashboard')
@section('css')
    <style>
        body {background-color: #F0F0F0;}
        .invalid-feedback {display: block;}
        .booking_detail p {font-weight: bold;}
        .booking_detail p span{font-weight: normal;}
    </style>
@endsection
@php
    $side_bar = session('side_bar');
    $user = auth()->user();
    
@endphp
@section('content')
<section>
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__tittle">
                <h1>@lang('messages.Once_Upon_a_house')</h1>
                <p> <span></span> </p>                
            </div>
        </div>
    </div>
</section>

<section class="user_dashboard mt-5 mb-5">
    <div class="container p-3">
        <div class="row">
            <div class="col-3 side_bar p-4">
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
            <div class="col-1"></div>
            <div class="col-8 user_content p-4">
                <h3 class="text-center">"{{ $booking->wajba->title }}"</h3>
                <div class="row booking_detail">
                    <div class="col-6 mt-4">
                        <p> @lang('messages.Booking_Date')<span>{{ $booking->date->date }} {{ $booking->wajba->time->fromTime }} ~ {{ $booking->wajba->time->toTime }}</span></p>
                        <p> @lang('messages.Number_of_males') <span>{{ $booking->numberOfMales }}</span></p>
                        <p>@lang('messages.Number_of_females'): <span>{{ $booking->numberOfFemales }}</span></p>
                        <p>@lang('messages.Number_of_childrens'): <span>{{ $booking->numberOfChildren }}</span></p>
                        <p>@lang('messages.Total_amount'): <span>{{ $booking->totalAmount }} SAR</span></p>
                    </div>
                    <div class="col-6 mt-4">
                        <p>@lang('messages.Host_name'): <span>{{ $booking->host->user->full_name }}</span></p>
                        <p>@lang('messages.Host_email'): <span>{{ $booking->host->user->email }}</span></p>
                        <p>@lang('messages.Host_Phone')  : <span>{{ $booking->host->user->mobile }}</span></p>
                        <p>@lang('messages.Host_gender')   : <span>{{ $booking->host->user->gender }}</span></p>
                        <p>@lang('messages.Booking_status')   : <span>{{ $booking->status->type }}</span></p>
                    </div>
                </div>
                
            </div>            
        </div>
    </div>
</section>

@endsection

@section('script')
    
@endsection