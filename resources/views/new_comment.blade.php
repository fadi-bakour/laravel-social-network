<div class="mb-5 ">

    <form action="/comment/{{ $post->id }}" method="POST" >
        @csrf
        <label for="body"></label>
        <textarea name ="body" id="body" class=" form-control" rows="1" cols ="80" placeholder="comment!"></textarea>

        <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right "> Comment! </button>
        
        @error('body')
            <p class="text-danger float-left" >{{ $message }}</p>
        @enderror
    </form>

</div>

