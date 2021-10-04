<div class="accordion accordion-flush" id="ocupacoes">
    {{-- OCUPAÇÕES --}}
    @foreach($this->portfolio->ocupacoes as $key => $ocupacao)
        <div class="accordion-item">
            <div class="accordion-header p-3">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h2 class="h6 mb-0">{{$ocupacao->nome}} @if(!$ocupacao->visivel) <span class="badge bg-danger ms-2">Invisível</span> @endif</h2>
                    <small>
                        {{-- EDITAR --}}
                        <button class="btn btn-link p-0 me-2" type="button" data-bs-toggle="modal" data-bs-target="#editOcupation" data-ocupation-id="{{ $ocupacao->id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        {{-- DELETAR --}}
                        <button class="btn btn-link p-0 me-2" wire:click="deleteOcupation({{$ocupacao->id}})">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        {{-- NOVO TRABALHO --}}
                        <a href="#" class="btn btn-link p-0 me-2">
                            <i class="fas fa-plus"></i>
                        </a>
                        {{-- EXPANDIR --}}
                        <button class="btn btn-link p-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}">
                            <i class="fas fa-chevron-down" ></i>
                        </button>
                    </small>
                </div>
            </div>
            <div id="flush-collapse{{$key}}" class="accordion-collapse collapse" data-bs-parent="#ocupacoes">
                <div class="accordion-body">
                    {{-- MIDIAS --}}
                    <div class="border bg-light rounded  mb-4">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('img/img1.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col">
                                <div class="p-3">
                                    <h3 class="h6"> Ipsum labore sit consectetur</h3>
                                    <hr>
                                    <div class="form-check form-switch form-check-inline mb-3">
                                        <input id="visivel" type="checkbox" class="form-check-input">
                                        <label class="form-check-label" for="visivel">Visivel</label>
                                    </div>
                                    <p>Magna ut amet id ut deserunt dolore Lorem irure magna magna laborum tempor quis. Aliquip anim veniam ullamco eiusmod nulla pariatur id sunt. Exercitation aliqua anim dolor consectetur mollit sit nostrud. Proident aute excepteur ea labore ullamco Lorem irure. Deserunt deserunt consectetur nulla et occaecat eu sint. Aliquip ut consectetur id ea ex nulla anim mollit nisi irure ea. Eiusmod nulla velit magna quis excepteur ad nostrud.</p>
                                    <small>
                                        created at: 20/09/2021 <br/>
                                        <a href="" class="me-2">Editar</a>
                                        <a href="">Excluir</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
