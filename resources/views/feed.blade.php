<section >
    @foreach ($post as $post)
        <ul class="border-bottom border-top border-primary mt-5">
            @if ($post->user->is(auth()->user()) | auth()->user()->roles()->pluck('name')->contains('Manager') | auth()->user()->roles()->pluck('name')->contains('Admin') )        
            
                <div class="btn-group float-right">
                    <button type="button"  data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" style="padding: 0; border: none; background: none;">
                    ...
                    </button>
                    <div class="dropdown-menu" >
                        <div class="dropdown-item">
                            <form action="/posts/{{ $post->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn "> delete </button>
                            </form>
                        </div>
                        <div class="dropdown-item">
                            <a href="/posts/{{ $post->id }}/edit"><button class="btn "> Edit </button> </a>
                        </div>
                    </div>
                </div>

            @endif

            <div class="m-3 ">
                <a href="{{ route  ('profile', $post->user->username)}}">
                    <li class="float-left">
                        <img src="/storage/{{ $post->user->image }}" class="rounded-circle avatar_friend" alt="">
                    </li>
                </a>
                <li>
                    <ul class="ml-5" >
                        <a href="{{ route  ('profile', $post->user->username)}}">
                            <li class=" mb-n2">
                                {{ $post->user->name}}
                            </li>
                        </a>

                        <li class="">
                            <small>{{ $post->created_at }}</small> 
                        </li>
                    </ul>
                </li>

                <li class="pt-3 pl-2">
                    <img src="/storage/{{ $post->image }}" class=" img-fluid "   alt="" >
                </li>

                <li class="pt-3 pl-2">
                    <h5>{{$post->body}}</h5>
                </li>
            </div>
            
            @include('likes')

            @include('new_comment')

            @include('comments')
            
        </ul>     
    @endforeach
</section>