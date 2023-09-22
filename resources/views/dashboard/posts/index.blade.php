@extends('dashboard.lay.dash')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>
  </div>

@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-md-8" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

  <div class="table-responsive col-md-8" >
    <a href="/dashboard/posts/create" class="btn btn-success mb-1"><span class="m-1" data-feather="plus-circle">Tambah Postingan</span></a>
    <table class="table table-striped table-sm mt-1">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Pekerjaan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td >
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin Untuk Menghapus?')"><span data-feather="trash-2"></span></button>
            </form>
        </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>

@endsection