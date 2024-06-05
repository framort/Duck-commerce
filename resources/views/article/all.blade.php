<x-layout>
    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible alert-custom" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex flex-column justify-content-center align-items-center mt-5">
        <h1 class="text-center display-2">{{__('ui.allArticles')}}</h1>
        <hr class="w-50">
    </div>
    {{-- <p class="text-center"> di tutti gli utenti</p> --}}

    <div class="container-fluid">
        <div class="row justify-content-center">


            @foreach ($articles as $article)
                <div class="col-12 col-md-5 d-flex justify-content-center m-5 p-0 shadow article bg-white">
                    
                    <x-cards :$article />
                    {{-- <a href="{{ route('article.show', compact('article')) }}" class=" text-dark">
                        <div class="card-custom">
                            <div class=" overflow-hidden me-3">
                                <img src="{{ $article->images->IsNotEmpty() ? $article->images->first()->getUrl(300,300) : 'https://picsum.photos/300' }}"
                                    class=" img-fluid" alt="..." width="600px" height="100%">
                            </div>
                            <div class="w-100 p-3 text-truncate">
                                <p class=" fw-bold fs-4 text-uppercase">{{ $article->titolo }}</p>
                                <p style="max-width: 80%">{{ $article->descrizione }}</p>
                                <p class=" fw-bold fs-2">{{ $article->prezzo }} €</p>
                                <p> {{__('ui.category')}}: <a
                                        href="{{ route('article.category', ['category' => $article->category]) }}">
                                        <span class=" text-uppercase">{{ $article->category->name }}</span> </a>
                                </p>
                                <small>{{__('ui.publicationdate')}}: {{ $article->created_at->format('d/m/Y - H:i') }}</small>
                            </div>
                        </div>
                    </a> --}}
                </div>
            @endforeach
            {{-- @foreach ($articles as $article)
            <div class="col-12 col-md-4 my-5">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/300/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->titolo}}</h5>
                            <p class="card-text">{{$article->descrizione}}</p>
                            <p class="card-text">{{$article->prezzo}} €</p>
                            <p class="card-text"> Categoria: <a href="{{ route('article.category', ['category' => $article->category])}}" class="text-info text-uppercase">{{$article->category->name}}</a> </p>
                            <p class="card-text">Creato da: <span class="text-danger text-uppercase">{{$article->user->name}}</span> </p>
                            <small>data pubblicazione: {{$article->created_at->format('d/m/Y - H:i')}}</small>
                        
                            <a href="{{ route('article.show', compact('article')) }}" class="btn bg-orange">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach --}}
            {{ $articles->links() }}
        </div>
    </div>



</x-layout>
