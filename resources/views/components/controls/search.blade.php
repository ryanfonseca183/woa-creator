<div {{ $attributes->merge(['class' => 'input-group input-group-search']) }}>
    <button class="btn dropdown-toggle btn-type" type="button" data-bs-toggle="dropdown" id="search_toggle"><span class="me-2 d-inline-block">Trabalhos</span></button>
    <ul class="dropdown-menu">
        <li class="dropdown-item">
          <x-controls.toggle type="radio" label="Trabalhos" name="search_type" id="type_trabalho" data-label="Trabalhos" value="trabalho" :checked="request('search_type') == 'trabalho'"/>
        </li>
        <li class="dropdown-item">
          <x-controls.toggle type="radio" label="Artistas" name="search_type" id="type_artista" data-label="Artistas" value="artista"  :checked="request('search_type') == 'artista'" />
        </li>
    </ul>
    <input type="text" name="search_text" class="form-control">
    <button class="btn btn-search"><i class="fas fa-search"></i></button>
</div>

@push('assets-body')
    <script>
        $(function(){
            $("#search_toggle > span").text($("[name='search_type']:checked").data('label'));
        })
        $("[name='search_type']").on('change', function(){
            $("#search_toggle > span").text($(this).data('label'));
        });
    </script>
@endpush