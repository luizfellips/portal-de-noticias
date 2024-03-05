@props(['noticia', 'extraClasses'])

@php
    use Carbon\Carbon;

    $updatedAt = Carbon::parse($noticia->updated_at);
    $timeAgo = $updatedAt->locale('pt_BR')->diffForHumans();
    $image = file_exists(asset($noticia->imagem)) ? asset($noticia->imagem) : asset('img/placeholder.png');
@endphp

<div class="col-lg-6 col-md-8 col-sm-6 col-xs {{ $extraClasses ?? '' }}">
    <a href="{{ route('noticia.show', ['titulo' => Str::slug($noticia->titulo)]) }}"
        class="card mb-3 text-decoration-none" style="max-width: 540px;">
        <div class="row g-0">
            <div class="image col-md-5">
                <img src="{{ $image }}" class="img-fluid" alt="...">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title fs-5">{{ $noticia->titulo }}</h5>
                    <x-tags :tags="$noticia->tags" />
                    <p class="card-text"><small class="text-muted">Atualizado {{ $timeAgo }}</small>
                    </p>
                </div>
            </div>
        </div>
    </a>
</div>
