<div class="col-md-12">
    <ul>
        <li class="{{ $side_bar == 'profile' ? 'side_bar_active' : '' }}"><a href="{{ route('home') }}">@lang('messages.Profile')
</a></li>
        @if (auth()->user()->host()->exists())
            <li class="{{ $side_bar == 'get_host_booking' ? 'side_bar_active' : '' }}"><a href="{{ route('get_host_booking') }}">@lang('messages.Host_Booking')
</a></li>
            <li class="{{ $side_bar == 'get_guest_booking' ? 'side_bar_active' : '' }}"><a href="{{ route('get_guest_booking') }}">@lang('messages.Guest_Booking')  </a></li>
        @else
            <li class="{{ $side_bar == 'get_guest_booking' ? 'side_bar_active' : '' }}"><a href="{{ route('get_guest_booking') }}">@lang('messages.Guest_Booking')   </a></li>
        @endif
        {{-- <li class="{{ $side_bar == 'get_notify' ? 'side_bar_active' : '' }}"><a href="{{ route('get_notify') }}">@lang('messages.My_Notifications')</a></li> --}}
        @if ($user->role->type == 'host')
            @if ($user->host->status == 1)
                <li class="{{ $side_bar == 'get_experience' ? 'side_bar_active' : '' }}"><a href="{{ route('get_experience') }}">@lang('messages.My_Experiences')</a></li>
            @else
                <li style="background-color:#ccc;"><a href="javascript:void(0);"><span style="color:red;">(@lang('messages.Host_is_pending_now')...)</span></a></li>
            @endif  
        @endif
        
    </ul>
</div>