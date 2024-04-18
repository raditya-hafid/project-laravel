@extends('layout.main')

@section('container')
    <h1 class="mb-5 text-center">{{ $title }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="category">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="author">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="Cari" value="{{ request('Cari') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-5" >
            @if ($posts[0]->image)
            <div style="max-height:550px; overflow:hidden;">
                <a href="posts/{{ $posts[0]->slug }}"><img src="{{ asset('/storage/'.$posts[0]->image) }}" class="card-img-top img-fluid" alt="..."></a>
            </div>
            @else
            <a href="posts/{{ $posts[0]->slug }}"><img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="..."></a>
            @endif
            
            <div class="card-body">
              <h2 class="card-text " ><a class="text-decoration-none text-dark" href="posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h2>
              <p class="card-text">{{ $posts[0]->exe}}</p>
              <small class="text-muted">
                <h5><a class="text-decoration-none text-dark" href="posts/{{ $posts[0]->slug }}">More...</a></h5>
                <h4>by <a href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> a <a href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></h4>
                <p class="">{{ $posts[0]->created_at->diffForHumans() }}</p> 
              </small>
            </div>
        </div>
    

    <div class="container">
        <div class="row mb-5">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <div class="position-absolute bg-light p-2"><a class="text-decoration-none text-dark" href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                    
                    @if ($post->image)
                        <a href="posts/{{ $post->slug }}"><img src="{{ asset('/storage/'.$post->image) }}" class="card-img-top img-fluid" alt="..."></a>
                    @else
                        <a href="posts/{{ $post->slug }}"><img src="https://source.unsplash.com/300x200/?{{ $post->category->name }}" class="card-img-top" alt="..."></a>
                    @endif

                    <div class="card-body">
                      <h3><a href="posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h3>
                      <p>{{ $post["exe"] }}</p>
                      <small class="text-muted">
                        <h6><a class="text-decoration-none text-dark" href="posts/{{ $post->slug }}">More...</a></h6>
                        <h5>by <a  href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a></h5>
                      </small>
                      
                    </div>
                </div>
            </div>
             @endforeach 
              {{ $posts->links() }} 
        </div>   
    </div>

    @else
        <p class="text-center fs-4">N.o post found</p>
    @endif
    
@endsection