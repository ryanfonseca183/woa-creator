<ul class="list-group list-group-flush border-0">
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Facebook</div>
            <div class="col">
                <a target="_blank" href="{{ auth()->user()->url_facebook }}">{{ auth()->user()->url_facebook }}</a>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Instagram</div>
            <div class="col">
                <a target="_blank" href="{{ auth()->user()->url_instagram }}">{{ auth()->user()->url_instagram }}</a>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Twitter</div>
            <div class="col">
                <a target="_blank" href="{{ auth()->user()->url_twitter }}">{{ auth()->user()->url_twitter }}</a>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-2">Celular</div>
            <div class="col">{{ auth()->user()->celular }}</div>
        </div>
    </li>
</ul>