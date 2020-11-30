@extends('post.index')

@section('main-content')
<div class="row">
    <dev class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Post</h5>
            </div>
            <div class="card-body">
                @if(Session::has('image_added'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('image_added') }}
                    </div>
                @endif
                <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Details</label>
                        
                        <textarea name="details" class="form-control" id="exampleFormControlTextarea1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </dev>
</div>
@endsection
