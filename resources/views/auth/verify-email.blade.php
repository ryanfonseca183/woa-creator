@extends('layouts.app')

@section('title', 'Verificar e-mail')

@section('body')
    <x-auth-card>
        <div class="mb-4 text-sm text-light">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        <div class="mt-4 d-flex flex-v-center flex-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn btn-link">Reenviar link</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-primary">Sair</button>
            </form>
        </div>
    </x-auth-card>
@endsection
