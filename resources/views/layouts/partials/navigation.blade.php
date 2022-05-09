<header>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ env('APP_NAME') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">

                </ul>

                <ul class="navbar-nav ml-auto">

                    @include('layouts.partials.navigations.'.\App\Models\User::navigation())

                   <li class="nav-item dropdown">
                       <a href="#"
                          class="nav-link dropdown-toggle"
                          id="navbarDropdownMenuLink"
                          data-toggle="dropdown" 
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                          aria-haspopup="true"
                       >
                           {{ __('Selecciona un idioma') }}
                       </a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <a href="{{ route('set_language', ['es']) }}" class="dropdown-item">
                               {{ __('Español') }}
                           </a>
                           <a href="{{ route('set_language', ['en']) }}" class="dropdown-item">
                               {{ __('Ingles') }}
                           </a>
                       </div>
                   </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
