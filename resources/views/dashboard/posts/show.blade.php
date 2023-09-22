@extends('dashboard.lay.dash')

@section('container')
<div class="container">
    <div class="row justify-content-start mb-5">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <a href="/dashboard/posts" class="badge bg-success"><span data-feather="arrow-left-circle" ></span></a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin Untuk Menghapus?')"><span data-feather="trash-2"></span></button>
            </form>

            @if ($post->image)
            <div style="max-height:350px; overflow:hidden;">
                <img src="{{ asset('/storage/'.$post->image) }}" class="card-img-top img-fluid mt-3" alt="...">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="card-img-top img-fluid mt-3" alt="...">
            @endif
             
            
            <h6 class="text-muted text-end">by <a href="authors/{{ $post->author->username }}">{{ $post->author->name }}</a> a <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
            <article>
             <p>{!! $post->body !!}</p>
            <a href="/blog">back to posts</a>   
            </article>  
        </div>
    </div>
</div>
@endsection