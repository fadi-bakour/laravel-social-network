<section class="border border-primary" >
    <div class="pt-3 pl-3">
        <h5>Following</h5>
    </div>
    <div class="pl-3">
        @foreach (auth()->user()->follows as $user)
            <ul >
                <a href="{{ route  ('profile', $user)}}">
                    <li class ='float-left '><img src="/storage/{{ $user->image }}" class="rounded-circle avatar_friend" alt=""> </li>
                </a>
                <a href="{{ route  ('profile', $user)}}">
                    <li class ='float-left pl-2 pt-2'> {{ $user->name }}</li>
                </a>
                <br>
                <br>
            </ul>
        @endforeach
    </div>
</section>

