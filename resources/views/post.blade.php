@extends('layout.main')

@section('container')

    <div class="container">
        <div class="row justify-content-start mb-5">
            <div class="col-md-8">
                <h1>{{ $pos->title }}</h1>
                <h5 class="text-muted mt-3">by <a href="authors/{{ $pos->author->username }}">{{ $pos->author->name }}</a> a <a href="/categories/{{ $pos->category->slug }}">{{ $pos->category->name }}</a></h5>

                @if ($pos->image)
                <div style="max-height:350px; overflow:hidden;">
                    <a href="posts/{{ $pos->slug }}"><img src="{{ asset('/storage/'.$pos->image) }}" class="card-img-top img-fluid" alt="..."></a>
                </div>
                @else
                    <a href="posts/{{ $pos->slug }}"><img src="https://source.unsplash.com/300x200/?{{ $post->category->name }}" class="card-img-top" alt="..."></a>
                @endif

                <article>
                 <p>{!! $pos->body !!}</p>
                <a href="/blog">back to posts</a>   
                </article>  
            </div>
        </div>
    </div>
  
@endsection