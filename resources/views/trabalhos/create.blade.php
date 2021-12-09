    @extends('layouts.profile')

    @section('title', 'Inicio')

    @section('content')
        <main>
            <form method="POST" action="{{ route('portfolios.ocupacoes.trabalhos.store', [$portfolio, $ocupacao]) }}" class="needs-validation mb-5" novalidate enctype="multipart/form-data">
                @csrf 
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
                    <x-controls.input label="Titulo" name="titulo" required />
            
                    <x-controls.textarea label="Descrição" name="descricao" rows="8" class="text-center" />
            
                    <x-controls.toggle label="Visível" name="visivel" value="1" checked />
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
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route("portfolios.ocupacoes.show", ['portfolio' => $portfolio, 'ocupacao' => $ocupacao]) }}" class="btn btn-outline-secondary btn-lg me-2">Cancelar</a>
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
            }
            const pond = FilePond.create({...config, ...labels_pt_BR});
            document.getElementById('midia').appendChild(pond.element);
        </script>
    @endpush