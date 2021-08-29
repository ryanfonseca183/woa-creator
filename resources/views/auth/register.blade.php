@extends('layouts.app')

@section('title', 'Cadastro')

@section('body')
    <x-auth-card>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- NOME --}}
            <x-controls.input label="Nome" name="nome" required autofocus />

            {{-- EMAIL --}}
            <x-controls.input type="email" label="E-mail" name="email" required />

            {{-- SENHA --}}
            <x-controls.input type="password" label="Senha" name="password" required autocomplete="new-password" />

            {{-- CONFIRMAR SENHA --}}
            <x-controls.input type="password" label="Confirmar senha" name="password_confirmation" required />

            <div class="d-flex flex-h-end flex-v-center">
                <a href="{{ route('login') }}" class="me-3">Já possui cadastro? </a>
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </x-auth-card>
@endsection
