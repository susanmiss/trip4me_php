@extends('layouts.app')

@include('partials.meta_static')

@section('content')





<h1>Latest Blogs :)</h1> 

<hr/>

    @if(Session::has('blog_created_message'))
        <div class="alert alert-success">
            {{  Session::get('blog_created_message')}}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif

    @if(Session::has('contact_form_send'))
        <div class="alert alert-success">
            {{  Session::get('contact_form_send')}}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif

    <!-- <div class="jumbotron">
        {!! Form::open(['action' => 'App\Http\Controllers\BlogController@index', 'method' => 'GET', 'role' => 'search'
        ]) !!}
            <div class="input-group">
                {!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search Posts', 'id' => 'term']) !!}
                <span class="input-group-btn">
                    <button class="bnt btn-default" type="submit">Search
                    </button>
                </span>
            </div>

        {!! Form::close() !!}
    </div> -->

    @foreach ($blogs as $blog)
    <div class="col-md-8 offset-md-2 text-center">
        <h2 class="mt-5">
            <a href={{ route('blogs.show', [$blog->slug]) }} >
            {{ $blog->title }}
            </a>
         <h2>

         <div class="col-md-12">

                @if($blog->featured_image)
                    <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{$blog->title }}" class="img-responsive featured_image">
                @endif   

                <div class="lead">
                 <p>{!! $blog->body !!}</p>
                </div> 
             
         </div>
        

        <!-- Foreign key -->
        @if($blog->user)
            Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name}} </a> | Posted: {{ $blog->created_at->diffForHumans() }}
        @endif   

       
            <div>
                 <hr>
            </div> 
           
    </div>

  
    @endforeach

 
  

@endsection