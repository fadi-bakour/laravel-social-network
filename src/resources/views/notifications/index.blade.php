@extends('layouts.home')
@section('content')
<div class="mt-2 border">
    <div class="p-3">
        <h5>new notifications</h5>
        @foreach ($Notification as $Notification)
            <ul>
                <li>
                    you have a new follower <a href="/profile/{{ $Notification->data['follower'] }}">{{ $Notification->data['follower'] }}</a>
                </li>
            </ul>
        @endforeach
    </div>
</div>


<div class="mt-2 border">
    <div class="p-3">
        <h5>Read notifications</h5>
        @foreach ($readNotification as $readNotification)
            <ul>
                <li>
                    you have a new follower <a href="/profile/{{ $readNotification->data['follower'] }}">{{ $readNotification->data['follower'] }}</a>
                </li>
            </ul>
        @endforeach
    </div>
</div>

@endsection



readNotification