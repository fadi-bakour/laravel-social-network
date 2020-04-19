<div class="container border-bottom border-top">
    <div class="row mt-2 mb-2">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center ">
            <form action="/posts/{{ $post->id }}/like" method="post">
            @csrf
            
            <button type="submit" style="padding: 0; border: none; background: none;" class="{{ $post->islikedby(auth()->user()) ? 'text-primary' : 'text-secondary' }}"><h6 >  Like</h6>
            <span>{{ $post->getTotalLikesAttribute() ?: 0 }}</span>
        </button>
            </form>
        </div>
    
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center ">
            <form action="/posts/{{ $post->id }}/like" method="post">
            @csrf
            @method('delete')
            <button type="submit" style="padding: 0; border: none; background: none;" class="{{ $post->isDislikedBy(auth()->user()) ? 'text-primary' : 'text-secondary' }}"><h6 >  DisLike</h6>
            <span>{{ $post->getTotaldisLikesAttribute() ?: 0 }}</span>
        </button>
            </form>
        </div>
    </div>
</div>