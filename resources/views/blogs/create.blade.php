@extends('layouts.app')
@section('content')
@include('partials.tinymce')


<div class="container-fluid">
    <div class="jumbotron">
        <h1>Create a new Blog</h1>    
    </div>

    <div class="col-md-12">
        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">

            @include('partials.error-message')

            <div class="form-group">
                <lable for="title">Title</lable>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <lable for="body">Body</lable>
                <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
            </div>

     

             <div class="form-group form-check form-check-inline">
                @foreach($categories as $category)
                    <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                    <label class="form-check-label mr-3">{{$category->name}}</label>
                @endforeach
            </div> 

        
            <div class="form-group">
                <label class="btn-btn-default">
                <span class="btn btn-outline btn-sm btn-info">Upload Image </span>
                <input type="file" name="featured_image" class="form-controller" hidden>
                </label>
            </div>

            <div>
                <button class="btn btn-primary" type="submit">
                    Create a new Blog
                </button>
            </div>

            {{ csrf_field() }}
          
        </form>
    </div>

   
    
</div>

@endsection