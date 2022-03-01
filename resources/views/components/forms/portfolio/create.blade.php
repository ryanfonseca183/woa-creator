 @props(['portfolio' => ""])
 
 {{-- PORTFÓLIO --}}
<div class="card card-body mb-5">
    <div class="row gx-3 align-items-center mb-4">
        <div class="col-auto">
            <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                <i class="fs-5 fas fa-id-card"></i>
            </div>
        </div>
        <div class="col">
            <h3 class="h5 mb-0">Portfólio</h3>
            <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
        </div>
    </div>
    <label>
        <span class="mb-2 d-inline-block">Capa do portfólio</span>
        <div class="img-wrapper w-100 mb-3" style="height: 250px;">
            @if($portfolio) <img src="{{ asset('storage/' . $portfolio->capa) }}" class="img-preview"> @endif
        </div>
        <input type="file" name="capa" class="img-picker d-none">
    </label>
    @error('capa')
        <span class="invalid-feedback d-block">
            {{$message}}
        </span>
    @enderror
    <x-controls.input label="Nome do portfólio" name="nome" value="{{ $portfolio->nome ?? null}}" />

    <x-controls.toggle type="switch" label="Visível" name="visivel" value="1" :checked="$portfolio->visivel ?? false"  />
    <small class="text-muted">Recomenda-se manter o portfólio invisível até que esteja totalmente configurado</small>

    <button class="app-btn-primary btn align-self-start mt-3">Salvar</button>
</div>