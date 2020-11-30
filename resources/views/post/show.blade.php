@extends('post.index')

@section('main-content')
<div class="table">
    @if(Session::has('image_delete'))
        <div class="alert alert-success" role="alert">
        {{ Session::get('image_delete') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $image->title }}</td>
            <td> <img src="{{asset('public/images')}}/{{$image->image}}" alt="" style="max-width: 100px;"> </td>
            <td class="d-flex justify-content-start">
                <a href="{{ url('/view', $image->id) }}" class="btn btn-info m-1">View</a>
                <a href="{{ url('/edit', $image->id) }}" class="btn btn-warning m-1">Edit</a>
                <a href="{{ url('/delete', $image->id) }}" class="btn btn-danger m-1">Delete</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection