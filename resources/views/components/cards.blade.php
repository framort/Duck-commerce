<a href="{{ route('article.show', compact('article')) }}" class=" text-dark overflow-hidden object-fit-cover">
    <div class="card-custom h-100 w-100">
        <div class="w-100 me-0 me-md-3">
            <img src="{{ $article->images->IsNotEmpty() ? $article->images->first()->getUrl(300, 300) : Storage::url('/img/noImage.png') }}"
                class=" object-fit-cover img-fluid" alt="Immagine dell'articolo {{ $article->titolo }}" width="600px"
                height="100%">
        </div>
        
        <div class="w-100 p-3 overflow-hidden">
            <p class=" fw-bold fs-6 fs-md-2 fs-lg-1 text-uppercase">{{ $article->titolo }}</p>
            <p class=" text-truncate">{{ $article->descrizione }}</p>
            <p class=" fw-bold fs-2">{{ $article->prezzo }} €</p>
            <p> {{ __('ui.category') }}: <a href="{{ route('article.category', ['category' => $article->category]) }}">
                <span class=" fs-5 fs-md-3 ">{{ $article->category->name }}</span> </a>
            </p>
            <div class="">
                <small>{{ __('ui.publicationdate') }}: {{ $article->created_at->format('d/m/Y - H:i') }}</small>
            </div>
        </div>
    </div>
</a>
