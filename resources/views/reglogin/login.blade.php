@extends('layout.main')

@section('container')


<div class="row justify-content-center">
    <div class="col-md-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('gagal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Sign in</h1>
            <form action="/login" method="POST">
              @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required>
                <label for="email">Email address</label>
                @error('email')
                <div class="invali-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>



              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>   
                @enderror
              </div>
          
              <div class="checkbox mb-3">
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
            <small class="text-muted d-block text-center pt-1">
                Klik <a href="/register">disini</a> untuk sign up!
            </small>
        </main>
    </div>
</div>
    


@endsection