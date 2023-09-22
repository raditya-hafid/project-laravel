@extends('layout.main')

@section('container')
    <div class="mb-5">
        <h1>
            Post Category : {{ $title }}
        </h1>
    </div>

    @foreach ($authors as $author)
        <ul>
            <li>
                <h2><a href="/authors/{{ $author->username }}">{{ $author->name}}</a></h2>
            </li>
        </ul>
        
    @endforeach
@endsection