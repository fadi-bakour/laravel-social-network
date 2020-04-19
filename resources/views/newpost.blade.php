<section class="new_post">   
        <div class="container ">
            <div class="row">
                <div class="form-group  m-auto">

                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="body"></label>
                        <textarea name ="body" id="body" class=" form-control" rows="5" cols ="80" placeholder="whats on your mind!"></textarea>

                        <div class="ml-2 mt-1 float-left">
                            <label class="" for="image" > <img class="addimage" src="/img/Choose image.png" alt=""> </label>
                            <input class="custom-file-input " type="file" name="image" id="image">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right "> post </button>
                        
                        @error('body')
                            <p class="text-danger float-left" >{{ $message }}</p>
                        @enderror
                    </form>

                    
                </div>
            </div>
        </div>
</section>