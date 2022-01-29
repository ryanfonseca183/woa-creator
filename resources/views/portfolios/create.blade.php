@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <x-page-title title="Criar portfólio" >
            <x-back route="portfolios.index" />
        </x-page-title>

        <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-forms.portfolio.create />
        </form>
    </main>
@endsection
