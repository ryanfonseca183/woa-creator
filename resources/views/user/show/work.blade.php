@extends('layouts.user')

@section('title', 'Inicio')

@section('content')
    <main>
        <div class="row">
            @foreach($usuario->trabalhos as $trabalho) 
                <div class="col-lg-4">
                    <x-trabalho :trabalho="$trabalho" />
                </div>
            @endforeach
        </div>
    </main>
@endsection
