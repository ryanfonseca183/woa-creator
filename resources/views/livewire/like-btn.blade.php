@php 
    $curtidasCount = $trabalho->curtidas()->count();
    $curtidas =  '<span>'. ($curtidasCount > 0 ? $curtidasCount .' curtida(s)' : 'Nenhuma curtida') . '</span>';
@endphp

@if(Auth::check()) 
    @if(!$this->trabalho->curtidas()->where('user_id', Auth::id())->exists())
        <button class="btn app-btn-outline-primary like-btn mb-3" wire:click="like">
            <i class="far fa-heart"></i>
            {!! $curtidas !!}
        </button>
    @else 
        <button class="btn app-btn-primary like-btn mb-3" wire:click="deslike">
            <i class="far fa-heart"></i>
            {!! $curtidas !!}
        </button>
    @endif
@else 
    <a class="btn app-btn-primary  mb-3" href="{{ route('login') }}">
        <i class="far fa-heart me-2"></i>
        Curtir 
    </a>
@endif

