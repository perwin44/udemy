@extends('layouts.master')

@section('content')
   <div class="main-content mt-5">

    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif

    <div class="card">
        <div class="card-header">
        <div class="row">

        <div clas="col-md-6">
            <h4>Create Posts</h4>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <a class="btn btn-success mx-1" href="">Back</a>
        </div>

    </div>
        </div>

       

        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group" >
                <label class="form-label">Images</label>
                <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group" >
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group" >
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id">
                        <option>Select</option>
                       @foreach ($categories as $category)
                       <option value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                        
                    </select>
                </div>

                <div class="form-group" >
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="form-group mt-3" >
                    
                    <button class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
   </div>
@endsection