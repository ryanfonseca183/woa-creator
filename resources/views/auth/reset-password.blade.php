@extends('layouts.app')

@section('title', 'Redefinir senha')

@section('body')
    <x-auth-card>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            {{-- RESET TOKEN --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- EMAIL --}}
            <x-controls.input type="email" label="E-mail" name="email" :value="old('email', $request->email)" required autofocus/>

            {{-- SENHA --}}
            <x-controls.input type="password" label="Senha" name="password" required autocomplete="new-password" />

            {{-- CONFIRMAR SENHA --}}
            <x-controls.input type="password" label="Confirmar senha" name="password_confirmation" required />

            <div class="d-flex flex-v-end">
                <button class="btn btn-primary">Resetar senha</button>
            </div>
        </form>
    </x-auth-card>
@endsection
