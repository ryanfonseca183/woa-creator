    @extends('layouts.profile')

    @section('title', 'Inicio')

    @section('content')
        <main>
            <x-back route="{{ route('portfolios.ocupacoes.show', [$trabalho->ocupacao->portfolio_id, $trabalho->ocupacao->id]) }}" />
            
            <form method="POST" action="{{ route('trabalhos.update', $trabalho) }}" class="needs-validation mb-5" novalidate enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                {{-- DADOS GERAIS --}}
                <div class="card card-body mb-4">
                    <div class="row gx-3 align-items-center mb-4">
                        <div class="col-auto">
                            <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="h5 mb-0">Dados gerais</h3>
                            <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                        </div>
                    </div>
                    <x-controls.input label="Titulo" name="titulo" required value="{{ $trabalho->titulo }}" />
            
                    <x-controls.textarea label="Descrição" name="descricao" rows="8" class="text-center" maxlength="255">{{ $trabalho->descricao }}</x-controls.textarea>
            
                    <x-controls.toggle label="Visível" name="visivel" value="1" :checked="$trabalho->visivel == 1" />
                </div>
                {{-- MIDIA --}}
                <div class="card card-body mb-4" id="midia">
                    <div class="row gx-3 align-items-center mb-4">
                        <div class="col-auto">
                            <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                                <i class="fas fa-images"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="h5 mb-0">Midia</h3>
                            <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                        </div>
                    </div>
                    @error('midia')
                        <span class="invalid-feedback d-block">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route("portfolios.ocupacoes.show", ['portfolio' => $trabalho->ocupacao->portfolio_id, 'ocupacao' => $trabalho->ocupacao_id])}}" class="btn btn-outline-secondary btn-lg me-2">Cancelar</a>
                    <button class="btn btn-primary btn-lg">Salvar</button>
                </div>
            </form>
        </main>
    @endsection

    @push('assets-body')
        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);

            let config = {
                name: 'filepond[]',
                allowMultiple: true,
                maxFiles: 10,
                credits: '',
                storeAsFile: true,
                files: [
                    @foreach($trabalho->midias as $midia)
                    {
                        source: '{{ asset("storage/" . $midia->url_midia) }}',
                    },
                    @endforeach
                ]
            }
            const pond = FilePond.create({...config, ...labels_pt_BR});
            document.getElementById('midia').appendChild(pond.element);
        </script>
    @endpush