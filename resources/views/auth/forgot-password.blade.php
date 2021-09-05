@extends('layouts.app')

@section('title', 'Esqueceu sua senha')

@section('body')
    <x-auth-card>
        <div class="mb-4 text-sm text-light">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            {{-- EMAIL --}}
            <x-controls.input type="email" label="E-mail" name="email" required autofocus/>

            <div class="d-flex flex-v-end">
                <button class="btn btn-primary">Enviar link</button>
            </div>
        </form>
    </x-auth-card>
@endsection
