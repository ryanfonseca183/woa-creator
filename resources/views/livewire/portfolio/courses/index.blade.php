<div>
    @if(auth()->user()->cursos->isNotEmpty() || $this->cursosPortfolio->isNotEmpty())
        @if(auth()->user()->cursos->isNotEmpty())
            {{-- FORMAÇÕES ACADEMICAS --}}
            <div class="card-body bg-light">
                <span class="fw-bold">Formações acadêmicas</span>
                <p class="mb-0">Selecione as formações acadêmicas que são relevantes para este portfólio</p>
            </div>
            <ul class="list-group list-group-flush">
                @foreach(auth()->user()->cursos as $curso)
                    <li class="list-group-item">
                        <label>
                            <div class="row g-0">
                                <div class="col-auto">
                                    <div class="p-4">
                                        <input wire:model="cursos" value="{{ $curso->id }}" type="checkbox" class="form-check-input">
                                    </div>
                                </div>
                                <div class="col">
                                    {{$curso->instituicao }} <br/>
                                    {{$curso->diploma ? $curso->diploma . ', ' : ""}} {{$curso->area}} <br/>
                                    {{$curso->inicio }} até {{$curso->termino }}
                                </div>
                            </div>
                        </label>
                    </li>
                @endforeach
            </ul>
        @endif
        {{-- CURSOS --}}
        <div class="card-body bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <span class="fw-bold">Cursos complementares</span>
                    <p class="mb-0">Informe os cursos extras relevantes a este portfólio</p>
                </div>
                <div class="col-auto">
                    <button class="btn btn-link" type="button" data-bs-toggle="modal" data-bs-target="#createCourse">
                        Criar curso
                    </button>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            @forelse($this->cursosPortfolio as $curso)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            {{$curso->instituicao }} <br/>
                            {{$curso->diploma ? $curso->diploma . ', ' : ""}} {{$curso->area}} <br/>
                            {{$curso->inicio }} até {{$curso->termino }}
                        </div>
                        <div class="col-auto">
                            <button class="btn-icon me-2" data-bs-toggle="modal" data-bs-target="#editCourse" data-course-id="{{ $curso->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-icon" wire:click="deleteCourse({{$curso->id}})">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </li>
            @empty 
                <li class="list-group-item">Nenhum curso cadastrado até o momento</li>
            @endforelse
        </ul>
    @else 
        <div class="card-body">Nenhum curso cadastrado até o momento</div>
    @endif
    
</div>
