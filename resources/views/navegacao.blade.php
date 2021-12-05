@extends('layouts.app')

@section('title', 'Conheça o melhor do WoaCreator')

@section('body')
    <div class="container pt-5">
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-9 col-xl-8">
                <div class="text-center mb-4">
                    <p class="display-5 mb-0">Conheça o melhor do WoaCreator</p>
                    <p class="h4 text-muted ">Explore os projetos em destaque de nossos artistas</p>
                </div>
                {{-- FILTROS DE PESQUISA --}}
                <form action="{{ route('navegacao') }}" method="GET">
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        {{-- CAMPO DE BUSCA --}}
                        <input type="text" name="search_text" class="form-control form-control-lg bg-light" placeholder="Buscar" value="{{ request('search_text') }}">
                        {{-- TIPO DE BUSCA --}}
                        <select class="form-select w-auto" style="flex:unset;" name="search_type">
                            <option value="trabalho" @if($validated['search_type'] == 'trabalho') selected @endif>Trabalhos</option>
                            <option value="artista" @if($validated['search_type'] == 'artista') selected @endif>Artistas</option>
                        </select>
                    </div>
                    <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                        <div class="col-auto order-last order-md-first">
                            <span class="text-muted">{{$collection->total()}} resultado(s) encontrado(s)</span>
                        </div>
                        <div class="col-sm-auto">
                            <div class="row gx-2 gx-md-4">
                                {{-- ORDENAMENTO --}}
                                <div class="col-6 col-md-auto">
                                    <div class="row align-items-center gx-2">
                                        <div class="col-auto">
                                            <label class="col-form-label">Ordenar por </label>
                                        </div>
                                        <div class="col-sm">
                                            <select name="orderBy" class="form-select form-select-sm filter-control" aria-label=".form-select-lg example">
                                                @foreach($orderBy as $key => $order)
                                                    <option value="{{ $order[1] }}" @if($validated['orderBy'] == $order[1]) selected @endif>{{$order[0] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- ITEMS POR PAGINA --}}
                                <div class="col-6 col-md-auto">
                                    <div class="row align-items-center gx-2">
                                        <div class="col-auto">
                                            <label class="col-form-label">Exibir</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="input-group input-group-sm">
                                                <select name="itemsCount" class="form-select filter-control" aria-label=".form-select-lg example">
                                                    @foreach($itemsCount as $count)
                                                        <option value="{{$count}}" @if($validated['itemsCount'] == $count) selected @endif>{{$count}}</option>
                                                    @endforeach
                                                </select>
                                                <label class="input-group-text" for="inputGroupSelect02">itens</label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if($collection->isNotEmpty())
            @if($validated['search_type'] == "artista")
                {{-- ARTISTAS --}}
                @foreach($collection->chunk(2) as $row)
                    <ul class="list-group list-group-horizontal-md spad">
                        @foreach($row as $column)
                            <li class="list-group-item w-md-50">
                                <x-artista :object="$column" />
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            @else
                {{-- TRABALHOS--}}
                <hr class="mb-0">
                <div class="row gy-5 spad">
                    @foreach($collection as $object)
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <x-trabalho :object="$object"/>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- PAGINAÇÃO --}}
            <div class="d-flex justify-content-center">
                {{$collection->links()}}
            </div>
        @else 
            <div class="d-flex flex-column justify-content-center align-items-center spad">
                <img src="{{ asset('img/navigation-not-found.png') }}" width="225" class="mb-5" alt="Nenhum registro encontrado" />
                <h1 class="h2">Nenhum registro encontrado</h1>
                <p>Tente buscar por outros termos ou volte a página inicial</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Página inicial</a>
            </div>
        @endif
    </div>
@endsection

@push('assets-body')
    <script>
        $(".filter-control").on('change', function(){
            $(this).closest('form').submit();
        })
    </script>
@endpush
