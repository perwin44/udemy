@extends('layouts.master')

@section('content')
<main role="main" class="container">
{{-- <div class="row mt-5">
   @foreach ($posts as  $post)
     <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4>{{$user->name}}</h4>
                <p>{{$user->email}}</p>
                <p>{{$user->address->address}}</p>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4>{{$post->title}}</h4>
                <p>{{$post->description}}</p>
                <ul>
                @foreach ($post->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div> --}}

<img src="{{asset('/storage/images/new_image.jpg')}}">
<div class="col-md-4 mt-5">
    @if($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('upload_file')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Upload</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<a class="btn btn-primary mt-3" href="{{route('download')}}">Download Image</a>

</main>
@endsection