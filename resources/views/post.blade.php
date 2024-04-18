@extends('layout.main')

@section('container')

    <div class="container">
        <div class="row justify-content-start mb-5">
            <div class="col-md-8">
                <h1>{{ $pos->title }}</h1>
                <h5 class="text-muted mt-3">by <a href="/blog?author={{ $pos->author->username }}">{{ $pos->author->name }}</a> a <a href="/blog?category={{ $pos->category->slug }}">{{ $pos->category->name }}</a></h5>

                @if ($pos->image)
                <div style="max-height:350px; overflow:hidden;">
                    <img src="{{ asset('/storage/'.$pos->image) }}" class="card-img-top img-fluid" alt="...">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $pos->category->name }}" class="card-img-top" alt="...">
                @endif

                <article>
                 <p>{!! $pos->body !!}</p>
                <a href="/blog">back to Home</a>   
                </article>  
            </div>
        </div>
    </div>
  
@endsection