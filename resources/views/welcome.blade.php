<x-layout>
    {{-- <form class="d-flex ms-auto" role="search" action="{{route('article.search')}}" method="GET">
        <div class="input-group">
            <input type="search" name="query" class="form-control" placeholder="search" aria-label='search'>
            <button type="submit" class="input-group-text btn btn-outline-danger" id='basic-addon2'>Search</button>
        </div>
    </form> --}}

    <x-headerSearch>
    </x-headerSearch>

    <div class="text-center d-flex flex-column justify-content-center align-items-center">
        <p class=" display-6 mt-5"> {{ __('ui.ourLatestArticles') }}</p>
        <hr class="w-50 mb-4">
    </div>

    <div class="container-fluid mt-3 mt-md-5">
        <div class="row justify-content-center align-items-center w-100">

            @foreach ($articles as $article)
                <div class="col-12 col-md-5 d-flex justify-content-center mt-5 m-4 p-0 shadow article bg-white">

                    <x-cards :$article />
                    {{-- <a href="{{ route('article.show', compact('article')) }}" class=" text-dark overflow-hidden object-fit-cover">
                        <div class="card-custom h-100 w-100">
                            <div class="w-100 me-3">
                                <img src="{{ $article->images->IsNotEmpty() ? $article->images->first()->getUrl(300,300) : 'https://picsum.photos/300' }}" class=" object-fit-cover img-fluid" alt="Immagine dell'articolo {{$article->titolo}}" width="600px" height="100%">
                            </div>
                            <div class="w-100 p-3 overflow-hidden">
                                <p class=" fw-bold fs-4 text-uppercase">{{ $article->titolo }}</p>
                                <p class=" text-truncate">{{ $article->descrizione }}</p>
                                <p class=" fw-bold fs-2">{{ $article->prezzo }} €</p>
                                <p> {{__('ui.category')}}: <a
                                        href="{{ route('article.category', ['category' => $article->category]) }}"> <span class=" text-uppercase">{{ $article->category->name }}</span> </a>
                                </p>
                                <small>{{__('ui.publicationdate')}}: {{ $article->created_at->format('d/m/Y - H:i') }}</small>
                            </div>
                        </div>
                    </a> --}}
                </div>
            @endforeach

        </div>
    </div>

    @if (session()->has('errorMessage'))
        <div class="alert alert-danger alert-custom-danger alert-dismissible" role="alert">
            {{ session('errorMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('message'))
        <div class="alert alert-success alert-custom alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('revisorAccepted'))
        <div class="alert alert-success alert-custom alert-dismissible" role="alert">
            {{ session('revisorAccepted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



</x-layout>
