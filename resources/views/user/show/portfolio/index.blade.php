@extends('layouts.user')

@section('title', 'Portfólios')

@section('content')
    <main>
        <div class="row">
            @foreach($usuario->portfolios as $portfolio) 
                <div class="col-lg-4">
                    <x-portfolio :portfolio="$portfolio" />
                </div>
            @endforeach
        </div>
    </main>
@endsection
