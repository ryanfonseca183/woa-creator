@extends('layouts.app')

@section('title', 'Confirmar senha')

@section('body')
    <x-auth-card>
        <div class="mb-4 text-sm text-light">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            {{-- SENHA --}}
            <x-controls.input type="password" label="Senha" name="password" required autocomplete="current-password" />

            <div class="d-flex flex-v-end">
                <button class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </x-auth-card>
@endsection
