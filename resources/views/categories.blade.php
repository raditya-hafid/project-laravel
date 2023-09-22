@extends('layout.main')

@section('container')
    <div class="mb-5">
        <h1>
            Post Category : Categories
        </h1>
    </div>

    

    
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <div class="position-absolute bg-light p-2"><a class="text-decoration-none text-dark" href="/categories/{{ $category->slug }}">{{ $category->name }}</a></div>
                <a href="/categories/{{ $category->slug }}"><img src="https://source.unsplash.com/500x500/?{{ $category->name }}" class="card-img-top" alt="..."></a>
            </div>
            
            @endforeach
        </div>
    </div>
    
@endsection