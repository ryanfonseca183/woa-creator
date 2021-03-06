<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @hasSection('title')
            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://kit.fontawesome.com/64727a0967.js" crossorigin="anonymous"></script>
        
        {{-- BOOTSTRAP 5 --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        
        {{-- JQUERY 3 --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{  asset('plugins/toastr/toastr.min.css')}}">
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
 
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        @stack('assets-head')

        @livewireStyles
    </head>
    <body>
        {{-- HEADER --}}
        <header>
            <div class="container text-center h-100 py-3">
                <div class="d-flex align-items-center w-100 justify-content-between">
                    <h1 class="h2 mb-0 ">
                        <a href="{{ route('home') }}" class="d-flex align-items-center">
                            <span class="text-gradient me-2">Woa</span>
                            <span class="badge bg-app-gradient p-2">Creator</span>
                        </a>
                    </h1>
                    <ul class="nav ">
                        <li><a href="{{ route('home') }}" class="nav-link px-2">Inicio</a></li>
                        <li><a href="{{ route('navegacao', ['search_type' => 'artista']) }}" class="nav-link px-2">Artistas</a></li>
                        <li><a href="{{ route('navegacao', ['search_type' => 'trabalho']) }}" class="nav-link px-2">Trabalhos</a></li>
                    </ul>
                    @guest 
                        <div class="text-end">
                            <a href="{{ route('login') }}" class="btn link-primary"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                            <a href="{{ route('register') }}" class="btn link-primary "><i class="fas fa-user me-2"></i>Cadastro</a>
                        </div>
                    @else 
                        <div class="dropdown">
                            <button class="btn app-btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>
                                {{ Str::words(Auth::user()->nome, 1, ''); }}
                            </button>
                            <ul class="dropdown-menu" >
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Perfil</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.portfolios.index', Auth::id()) }}">Portfolios</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.avaliacoes') }}">Avalia????es</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </header>
        
        <div style="min-height: 10vh">
            @yield('body')
        </div>

        @livewireScripts
        <script src="{{ asset('js/filepond-translation-pt_BR.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

            @stack('assets-body')

        <footer class="bg-dark pt-5 pb-3">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="{{ asset('img/logo.png') }}" class="no-fit img-fluid mb-3" width="100">
                <p class="text-light w-25 mb-3">
                    Mollit consequat do cupidatat incididunt consequat aliqua. Deserunt consectetur magna velit nisi in Lorem.
                </p>
                <div class="social-media mb-4">
                    <div class="social-icon"><i class="fab fa-facebook-f"></i></div>
                    <div class="social-icon"><i class="fab fa-twitter"></i></div>
                    <div class="social-icon"><i class="fab fa-instagram"></i></div>
                </div>
            </div>
            <hr style="background-color: var(--bs-gray-700)">
            <p class="mb-0 text-center text-light">Copyright 2021 | Todos os direitos reservados</p>
        </footer>
    </body>
</html>
