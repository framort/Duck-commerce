<x-layout>
    <div class="container-fluid">
        <h1 class="text-center mt-5 mb-5">{{ __('ui.detailArticle') }}</h1>
        <div class="row justify-content-center">
            <div class="col-8">
                {{-- carosello-slide --}}
                @if ($article->images->count() > 0)
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 h-50"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}"
                                        style="height:500px !important">
                                </div>
                            @endforeach
                            {{-- <div class="carousel-item active">
                            <img src="{{ $article->images->IsNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/300' }}" class="d-block w-100 h-50" alt="..."
                                style="height:500px !important">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $article->images->IsNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/300' }}" class="d-block w-100 h-50" alt="..."
                                style="height:500px !important">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $article->images->IsNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/300' }}" class="d-block w-100 h-50" alt="..."
                                style="height:500px !important">
                        </div> --}}
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="{{ Storage::url('img/noImage.png') }}" alt="Nessuna foto inserita dall'utente">
            </div>
            @endif
            {{-- Descrizione-Articolo --}}
            <div class="col-12 mt-5 mb-5 d-flex flex-column text-center">
                <h3>{{ $article->titolo }} </h3>
                <p>{{ $article->descrizione }}</p>
                <p>{{ $article->prezzo }} €</p>
                <p class="card-text">{{ __('ui.createdBy') }}: <span
                        class="text-danger text-uppercase">{{ $article->user->name }}</span> </p>
                <small>{{ __('ui.publicationdate') }}: {{ $article->created_at->format('d/m/Y - H:i') }}</small>
            </div>
        </div>
    </div>

</x-layout>
