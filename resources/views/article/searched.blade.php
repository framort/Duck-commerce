<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center py-5 align-item-center text-center">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center text-center">
                <h1>Risultati per la ricerca "<span class="fst-italic">{{$query}}</span>"
                </h1>
                <h5> Totale annunci trovati {{$articles->count()}} </h5>
                <hr class="w-50">
            </div>
        </div>
        
        
        <div class="row justify-content-center align-items-center w-100">
            @forelse ($articles as $article)
                <div class="col-5 d-flex justify-content-center m-2 p-0 shadow article bg-white">


                    <x-cards :$article />
                    {{-- <div class="card shadow" style="width: 18rem;">
                        <img src="{{ $article->images->IsNotEmpty() ? $article->images->first()->getUrl(300,300) : 'https://picsum.photos/300' }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->titolo }}</h5>
                            <p class="card-text">{{ $article->descrizione }}</p>
                            <p class="card-text">{{ $article->prezzo }} €</p>
                            <p class="card-text"> {{__('ui.category')}}: <span class="text-info text-uppercase">{{$article->category->name}}</span> </p>
                            <p class="card-text">{{__('ui.createdBy')}}: <span class="text-danger text-uppercase">{{$article->user->name}}</span> </p>
                            <small>{{__('ui.publicationdate')}}: {{$article->created_at->format('d/m/Y - H:i')}}</small>
                            <a href="{{ route('article.show', compact('article')) }}"
                                class="btn bg-orange">{{__('ui.detail')}}</a>
                        </div>
                    </div> --}}
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="">
                        {{__('ui.noArticles')}} 
                    </h3>
                    <a href="{{ route('home') }}" class="mt-5 btn bg-orange">{{__('ui.backToHomepage')}}</a>
                </div>
            @endforelse
        </div>
    </div>
    {{-- <div class="d-flex justify-content-center">
        <div>
             {{ $articles->link() }}
        </div>     
    </div>  --}}
    
</x-layout>