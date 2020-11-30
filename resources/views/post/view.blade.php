@extends('post.index')

@section('main-content')
<div class="table">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">Details</th>
            <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $image->title }}</td>
            <td>{{ $image->details }}</td>
            <td> <img src="{{asset('public/images')}}/{{$image->image}}" alt="" style="max-width: 100px;"> </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection