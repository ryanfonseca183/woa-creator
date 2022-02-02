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
    <div class="container pt-4">
        <div class="row gy-5 justify-content-center">
            <div class="col-sm-8 col-lg-4 col-xl-3">
                <aside>
                    <div class="card card-body border-0 shadow-sm p-4" style="margin-top: -100px;">
                        <livewire:user.upload-avatar />
                        <h2 class="h5 text-center mb-4 mb-lg-5">{{ Str::before(auth()->user()->nome, ' ')  }}</h2>
                        <nav class="border-0">
                            @php $route = Route::getCurrentRoute()->getName(); @endphp
                            <ul class="list-group list-group-flush">
                                <a href="{{ route('user.profile') }}" class="list-group-item  border-0 @if($route == "user.profile") active rounded-pill @endif">
                                    <i class="far fa-user me-3"></i>
                                    Conta
                                </a>
                                <a href="{{ route('portfolios.index') }}" class="list-group-item border-0 @if(Route::is('portfolios.*')) active rounded-pill @endif">
                                    <i class="fas fa-stream me-3"></i>
                                    Meus portfólios
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="far fa-heart me-3"></i>
                                    Avaliações
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                  @csrf
                                  <button type="submit" class="list-group-item border-0">
                                    <i class="fas fa-sign-out-alt  me-3"></i>
                                    Sair
                                  </button>
                                </form>
                            </ul>
                        </nav>
                    </div>
                </aside>
            </div>
            <div class="col-12 col-lg-8 col-xl-9">
                <div class="profile-main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection