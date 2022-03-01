    <ul class="list-group list-group-flush">
        @forelse(auth()->user()->cursos as $curso)
            <li class="list-group-item">
                <div class="row align-items-center">
                    <div class="col">
                        {{$curso->instituicao }} <br/>
                        {{$curso->diploma ? $curso->diploma . ', ' : ""}} {{$curso->area}} <br/>
                        {{$curso->inicio }} até {{$curso->termino}}
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
            <li class="list-group-item">Nenhuma formação acadêmica cadastrada até o momento</li>
        @endforelse
    </ul>