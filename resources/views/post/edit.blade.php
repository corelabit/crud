@extends('post.index')

@section('main-content')
<div class="row">
    <dev class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Post</h5>
            </div>
            <div class="card-body">
                @if(Session::has('image_updated'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('image_updated') }}
                    </div>
                @endif
                <form method="post" action="{{ route('update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$image->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" value="{{$image->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Details</label>
                        
                        <textarea name="details" value="" class="form-control" id="exampleFormControlTextarea1">{{$image->details}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="previewFile(this)">
                        <img id="previewImg" src="{{asset('public/images')}}/{{$image->image}}" alt="" style="max-width: 200px; margin-top: 20px;">
                        <input type="hidden" name="old_image" value="{{ $image->image }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </dev>
</div>
<script>
function previewFile(input){
    let file = $("input[type=file]").get(0).files[0];
    if(file)
    {
        let reader = new FileReader();
        reader.onload = function(){
            $('#previewImg').attr("src",reader.result);
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection