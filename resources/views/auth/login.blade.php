@extends('layouts.auth')

@section('title', 'Iniciar sessão')

@section('body')
<div class="container-fluid auth-container auth-login">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-md-10 col-xl-8 col-xxl-6">
            <div class="row g-0 shadow rounded overflow-hidden">
                <div class="col-sm">
                    <div class="p-4 p-md-5 border-0">
                        <div class="text-center">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid mb-4" style="max-height: 150px">
                            </a>
                            <h1 class="h3 mb-1 fw-bold">Bem vindo!</h1>
                            <p class="mb-4">Faça login para começar a navegar</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            {{-- EMAIL --}}
                            <x-controls.input label="E-mail" name="email" type="email" class="form-control-lg rounded-pill" required autofocus />

                            {{-- SENHA --}}
                            <x-controls.input label="Senha" name="password" type="password" class="form-control-lg rounded-pill" required autocomplete="current-password" />

                            <div class="text-center">
                                <button class="btn btn-lg app-btn-primary mx-auto w-100 mt-4 rounded-pill mb-2">Entrar</button>
                                <small><a href="{{ route('register') }}" class="btn btn-link btn-lg fs-6 rounded-pill w-100 text-decoration-none">Criar conta</a></small>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col set-bg" style="background-image: url({{ asset('img/background/auth/bg-auth-'. mt_rand(1, 5) .'.gif') }})" ></div>
            </div>
        </div>
    </div>
</div>
@endsection
