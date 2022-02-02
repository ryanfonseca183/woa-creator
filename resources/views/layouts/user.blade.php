@extends('layouts.app')

@push('assets-head')
    <style>
        .banner {
            height: 200px;
            background-image: url('{{asset("img/hero.jpg")}}');
            background-size:cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
@endpush 

@section('body')
    <div class="banner"></div>
    <div class="container pt-4 mb-5">
        <div class="row gy-5 justify-content-center">
            <div class="col-sm-8 col-lg-4 col-xl-3">
                <aside>
                    <div class="card card-body border-0 shadow-sm p-4" style="margin-top: -100px;">
                        <div class="avatar">
                            <img src="{{  asset($usuario->avatar ? 'storage/'. $usuario->avatar : 'img/user.png') }}" class="img-thumbnail rounded-circle">
                        </div>
                        <h2 class="h5 text-center mb-4 mb-lg-5">{{ Str::before($usuario->nome, ' ')  }}</h2>
                        <div class="mb-3 d-flex flex-column">
                            <span class="mb-1">
                                <i class="fas fa-map-marker-alt me-2 text-purple"></i>
                                @if(!$usuario->cidade || !$usuario->estado) Localização desconhecida @else {{ $usuario->cidade }}, {{ $usuario->estado }} @endif
                            </span>
                            <span class="mb-1">
                                <i class="fas fa-phone me-2 text-purple"></i>
                                {{ $usuario->celular ?: "Não informado" }}
                            </span>
                            <span>
                                <i class="fas fa-at me-2 text-purple"></i>
                                <a href="mailto:{{$usuario->email}}">{{$usuario->email}}</a>
                            </span>
                        </div>
                        @php $trabalhos = $usuario->trabalhos()->withCount('curtidas', 'visualizacoes')->get() @endphp
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                Visualizações
                                <span class="d-block float-end fw-bold">{{ $trabalhos->sum('visualizacoes_count') }}</span>
                            </li>
                            <li>
                                Curtidas
                                <span class="d-block float-end fw-bold">{{ $trabalhos->sum('curtidas_count') }}</span>
                            </li>
                        </ul>
                        <h3 class="h6 fw-bold mt-4 mb-3">Sobre</h3>
                        <small>{!! $usuario->descricao ?: "Este usuário não cadastrou uma descrição" !!}</small>
                        <h3 class="h6 fw-bold mt-4 mb-3">Mídias sociais</h3>
                        <div class="d-flex h4">
                            <a href="{{ $usuario->url_facebook }}" class="me-2">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="{{ $usuario->url_twitter }}" class="me-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="{{ $usuario->url_instagram }}">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-12 col-lg-8 col-xl-9">
                <div class="profile-main-content">
                    @php $route = Route::getCurrentRoute()->getName(); @endphp
                    <ul class="nav nav-pills mb-5">
                        <li class="nav-item">
                          <a class="nav-link @if($route == "user.profile") active @endif" @if($route == "user.profile") aria-current="page" @endif href="{{ route('user.profile', $usuario->id) }}">Trabalhos</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link @if(in_array($route, ["user.portfolios.index", "user.portfolios.show"])) active @endif" @if($route == "user.profile") aria-current="page" @endif href="{{ route('user.portfolios.index', $usuario->id) }}">Portfólios</a>
                        </li>
                    </ul>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection