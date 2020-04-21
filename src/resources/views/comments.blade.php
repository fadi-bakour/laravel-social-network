@foreach ($post->comments as $comment)
@if ($comment->user->is(auth()->user()) | $post->user->is(auth()->user()) |auth()->user()->roles()->pluck('name')->contains('Manager') | auth()->user()->roles()->pluck('name')->contains('Admin') )        
    <div class="dropdown">
        <div class="btn-group float-right">
            <button type="button"  data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" style="padding: 0; border: none; background: none;">
            <h6>...</h6>
            </button>
            <div class="dropdown-menu dropdown-primary"  >
                <div class="dropdown-item">
                        <form action="/comment/{{ $comment->id }}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn"> delete </button>
                        </form>  
                </div>
            </div>
        </div>
    </div>
@endif 

    <ul class="pl-3">
        <a href="{{ route  ('profile', $comment->user->username)}}">
            <li class="float-left">
                <img src="/storage/{{ $comment->user->image }}" class="rounded-circle avatar_friend" alt="">
            </li>
        </a>
        <li>
            <ul class="ml-5" >
                <a href="{{ route  ('profile', $comment->user->username)}}">
                    <li class=" mb-n2">
                        {{ $comment->user->name}}
                    </li>
                </a>

                <li class="">
                    <small>{{ $comment->created_at }}</small> 
                </li>
            </ul>
        </li>

        <li class="pt-3 pl-2">
            <h6>{{$comment->body}}</h6>
        </li>
        

    </ul>
    <hr> 
@endforeach