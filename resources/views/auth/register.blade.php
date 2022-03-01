@extends('layouts.auth')

@section('title', 'Criar conta')

@section('body')
<div class="container-fluid auth-container auth-register">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-md-10 col-xl-8 col-xxl-6">
            <div class="row g-0 shadow rounded overflow-hidden">
                <div class="col set-bg" style="background-image: url({{ asset('img/background/auth/bg-auth-'. mt_rand(1, 5) .'.gif') }})" ></div>
                <div class="col-sm">
                    <div class="p-4 p-md-5 border-0">
                        <div class="text-center">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid mb-4" style="max-height: 150px">
                            </a>
                            <h1 class="h3 mb-1 fw-bold">Bem vindo!</h1>
                            <p class="mb-4">Crie seu portfólio gratuitamente</p>
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                            @csrf
                             {{-- NOME --}}
                            <x-controls.input label="Nome completo" name="nome" required autofocus class="form-control-lg rounded-pill" />

                            {{-- EMAIL --}}
                            <x-controls.input type="email" label="E-mail" name="email" required class="form-control-lg rounded-pill" />

                            <div class="row gx-2">
                                <div class="col-lg">
                                    {{-- SENHA --}}
                                    <x-controls.input type="password" label="Senha" name="password" required autocomplete="new-password" class="form-control-lg rounded-pill" />
                                </div>
                                <div class="col">
                                    {{-- CONFIRMAR SENHA --}}
                                    <x-controls.input type="password" label="Confirmar senha" name="password_confirmation" required class="form-control-lg rounded-pill"/>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button class="btn btn-lg app-btn-primary mx-auto w-100 mt-4 rounded-pill mb-2">Finalizar</button>
                                <small><a href="{{ route('login') }}" class="btn btn-link btn-lg fs-6 rounded-pill w-100 text-decoration-none">Iniciar sessão</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
