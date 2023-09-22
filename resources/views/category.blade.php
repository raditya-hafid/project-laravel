@extends('layout.main')

@section('container')
    <div class="mb-5">
        <h1>
            Post Category : {{ $category}}
        </h1>
    </div>

    @if ($posts->count())
        <div class="card mb-5" >
            <a href="posts/{{ $posts[0]->slug }}"><img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h2 class="card-text " ><a class="text-decoration-none text-dark" href="posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h2>
              <p class="card-text">{{ $posts[0]->exe}}</p>
              <small class="text-muted">
                <h5><a class="text-decoration-none text-dark" href="posts/{{ $posts[0]->slug }}">Selengkapnya...</a></h5>
                <h4>by <a href="authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> a <a href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></h4>
                <p class="">{{ $posts[0]->created_at->diffForHumans() }}</p> 
              </small>
            </div>
        </div>
    @else
        <p class="text-center fs-4">N.o post found</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <div class="position-absolute bg-light p-2"><a class="text-decoration-none text-dark" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                    <a href="posts/{{ $post->slug }}"><img src="https://source.unsplash.com/300x200/?{{ $post->category->name }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h3><a href="posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h3>
                      <p>{{ $post["exe"] }}</p>
                      <small class="text-muted">
                        <h6><a class="text-decoration-none text-dark" href="posts/{{ $post->slug }}">Selengkapnya...</a></h6>
                        <h5>by <a  href="authors/{{ $post->author->username }}">{{ $post->author->name }}</a></h5>
                      </small>
                      
                    </div>
                </div>
            </div>
             @endforeach   
        </div>   
    </div>
@endsection