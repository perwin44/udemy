@extends('layouts.master')

@section('content')
   <div class="main-content mt-5">
    <div class="card">
        <div class="card-header">
        <div class="row">

        <div clas="col-md-6">
            <h4>Trashed Posts</h4>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <a class="btn btn-success mx-1" href="{{route('posts.create')}}">Create</a>
            <a class="btn btn-warning mx-1" href="">Trashed</a>
        </div>

    </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered border-dark">
                <thead style="background: #f2f2f2">
                  <tr >
                    <th  scope="col">#</th>
                    <th scope="col" style="width: 10%">Image</th>
                    <th scope="col" style="width: 20%">Title</th>
                    <th scope="col" style="width: 30%">Description</th>
                    <th scope="col" style="width: 10%">Category</th>
                    <th scope="col" style="width: 10%">Publish Date</th>
                    <th scope="col" style="width: 20%">Action</th>
                  </tr>
                </thead>
                <tbody >
                    @foreach ($posts as $post)
                        
                  <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>
                        <img src="{{asset($post->image)}}" style="width: 80px;">
                    </td>
                    <td>{{$post->title}}</td>
                    <td> {{$post->description}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{date('d-m-Y',strtotime($post->created_at))}}</td>
                    <td>

                      <div class="d-flex">
                        <a class="btn btn-success" href="{{route('posts.restore',$post->id)}}">Restore</a>
                       
                        <form action="{{route('posts.forceDelete',$post->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger">Delete</button>
                        </form>
                      </div>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
   </div>
@endsection