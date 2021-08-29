@extends('layouts.app')

@section('title', 'Login')

@section('body')
    <x-auth-card>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            {{-- EMAIL --}}
            <x-controls.input type="email" label="E-mail" name="email" required autofocus />

            {{-- SENHA --}}
            <x-controls.input type="password" label="Senha" name="password" required autocomplete="current-password" />
            
            {{-- REMEMBER --}}
            <x-controls.toggle type="checkbox" label="Manter conectado" name="remember" />
           
            <div class="d-flex flex-h-end flex-v-center mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="me-3">Esqueceu sua senha? </a>
                @endif
                <button class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </x-auth-card>
@endsection
