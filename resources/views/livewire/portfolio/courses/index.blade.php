<div>
    @if(auth()->user()->cursos->isNotEmpty())
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
                                {{$curso->data_inicio}} – {{$curso->data_termino}}
                            </div>
                        </div>
                    </label>
                </li>
            @endforeach
        </ul>
    @endif
    <div class="card-body">
        <span class="fw-bold">Outras formações acadêmicas</span>
        @forelse($portfolio->cursos->whereNotIn('id', auth()->user()->cursos->pluck('id')->toArray()) as $curso)
            <div class="row align-items-center">
                <div class="col">
                    {{$curso->instituicao }} <br/>
                    {{$curso->diploma ? $curso->diploma . ', ' : ""}} {{$curso->area}} <br/>
                    {{$curso->data_inicio}} – {{$curso->data_termino}}
                </div>
                <div class="col-auto">
                    <button class="btn btn-link" class="me-2" data-bs-toggle="modal" data-bs-target="#editCourse" data-course-id="{{ $curso->id }}">Editar</button>
                    <button class="btn btn-link" wire:click="deleteCourse({{$curso->id}})">Excluir</button>
                </div>
            </div>
        @empty 
            <p class="mb-0">Nenhum registro cadastrado até o momento</p>
        @endforelse
    </div>
</div>
