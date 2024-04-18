<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
      <a class="navbar-brand" href="/blog">InterPhoto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($title === "home") ? 'active' : ''  }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "about") ? 'active' : ''  }}" href="/about">About</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link {{ ($judul === "blog") ? 'active' : ''  }}" href="/blog">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($judul === "categories") ? 'active' : ''  }}" href="/categories">Categories</a>
          </li>
        </ul>



        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dash">Dasboard</a></li>
              <li><hr class="dropdown-divider"></li>

              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Sign out</button>
              </form>

            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($judul==='login')? 'active' : '' }}">Login</a>
          </li>
          @endauth
        </ul>


        
      </div>
    </div>
  </nav>