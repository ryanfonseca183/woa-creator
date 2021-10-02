@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h1 class="h4 mb-3">
            <a href="#" title="Voltar" class="text-decoration-none me-2">
                <i class="fas fa-long-arrow-alt-left" ></i>
            </a>
            Editar portfólio
        </h1>

        {{-- PORTFÓLIO --}}
        <form action="{{ route('portfolio.update', [$portfolio->id]) }}" method="POST">
            @csrf 
            @method('PUT')
            <div class="card card-body mb-5">
                <div class="row gx-3 align-items-center mb-4">
                    <div class="col-auto">
                        <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                            <i class="fs-5  fas fa-phone"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Portfólio</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                </div>
                <x-controls.input label="Nome do portfólio" name="nome" value="{{ $portfolio->nome }}" />

                <x-controls.toggle type="switch" label="Visível" name="visivel" value="1" :checked="$portfolio->visivel" />

                <button class="btn btn-primary align-self-end mt-3">Salvar</button>
            </div>
        </form>

        {{-- FORMAÇÃO ACADÊMICA --}}
        <div class="card mb-5">
            <div class="card-body">
                <div class="row gx-3 align-items-center mb-4">
                    <div class="col-auto">
                        <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                            <i class="fs-5  fas fa-phone"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Formação acadêmica</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#createCourse">
                            <i class="fas fa-plus me-2"></i>Novo
                        </button>
                    </div>
                </div>
                <span class="fw-bold">Formações vinculadas a conta</span>
                <p class="mb-0">Selecione as formações acadêmicas vinculadas a conta que são relevantes para este portfólio</p>
            </div>
            <livewire:portfolio.courses.index :portfolio="$portfolio" />
        </div>

        {{-- OCUPAÇÃO --}}
        <div class="card mb-5">
            <div class="card-body">
                <div class="row gx-3 align-items-center">
                    <div class="col-auto">
                        <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                            <i class="fs-5  fas fa-phone"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Ocupações</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <i class="fas fa-plus me-2"></i>Novo
                        </button>
                    </div>
                </div>
            </div> 
            <div class="accordion accordion-flush" id="ocupacoes">
                {{-- OCUPAÇÕES --}}
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span>Designer gráfico</span>
                            <small>
                                <a href="" class="me-2"><i class="fas fa-edit"></i></a>
                                <a href="" class="me-2"><i class="far fa-trash-alt"></i></a>
                                <a href="" class="me-2"><i class="fas fa-plus"></i></a>
                                
                            </small>
                        </div>
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#ocupacoes">
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
                                            created at: 20/09/2021 </br>
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
            </div>
        </div>
    </main>

    {{-- CADASTRAR FORMAÇÃO ACADÊMICA --}}
    <div class="modal fade" id="createCourse" tabindex="-1" aria-labelledby="editCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editCourseLabel">Cadastrar formação acadêmica</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:portfolio.courses.create :portfolio="$portfolio"/>
            </div>
          </div>
        </div>
    </div>

    {{-- ATUALIZAR FORMAÇÃO ACADÊMICA --}}
    <div class="modal fade" id="editCourse" tabindex="-1" aria-labelledby="createCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createCourseLabel">Editar formação acadêmica</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:portfolio.courses.edit :portfolio="$portfolio"/>
            </div>
          </div>
        </div>
    </div>

    {{-- CADASTRAR OCUPAÇÕES --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModal2Label">Cadastrar ocupação</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-controls.input label="Nome da ocupação" name="ocupacao" />

                <x-controls.toggle label="Visivel" name="visivel" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@push('assets-body')
    <script>
        const editCourseModal = document.getElementById('editCourse'), 
              createCourseModal = document.getElementById('createCourse');

        editCourseModal.addEventListener('show.bs.modal', function(e){
            Livewire.emit('modalUpdateOpened', e.relatedTarget.getAttribute('data-course-id'));
        });
    </script>
@endpush
