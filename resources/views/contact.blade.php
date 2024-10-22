{{-- <div>
    <h1>Contact</h1>
    <x-button />
    <x-forms.button />
    <x-input-field/>
</div> --}}
@extends('layouts.master')

@section('content')
    {{-- <div class="row">
        @foreach ($post as $post)
        <x-post.index :post="$post"/>
        @endforeach
       
    </div> --}}

    <div class="row">
        @foreach ($post as $post)
        <x-post.index>
            <x-slot name="title">
                {{$post->title}}
            </x-slot>
            <x-slot name="description">
                {{$post->description}}
            </x-slot>
        </x-post.index>

        @endforeach
       
    </div>

   {{-- <x-button>
         Submit 
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam, reprehenderit?</p>
    </x-button>--}}
@endsection