<ul class="list-group list-group-flush border-0">
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Nome completo</div>
            <div class="col">{{ auth()->user()->nome }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Nome artístico</div>
            <div class="col">{{ auth()->user()->nome_artistico }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Cidade</div>
            <div class="col">{{ auth()->user()->cidade }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Estado</div>
            <div class="col">{{ auth()->user()->estado }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <span class="d-inline-block mb-2">Descrição</span>
        <p>{{ auth()->user()->descricao }}</p>
    </li>
</ul>