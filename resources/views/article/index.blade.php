<x-layout>

    <div class="container mt-5 mb-5 text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Articoli di <span class="text-danger text-uppercase">{{Auth::user()->name}}</span> </h1>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            @foreach ($user->articles as $article)
                <div class="col-12 col-md-4 my-4">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->titolo }}</h5>
                            <p class="card-text">{{ $article->descrizione }}</p>
                            <p class="card-text">{{ $article->prezzo }} €</p>
                            <p class="card-text"> Categoria: <span class="text-info text-uppercase">{{$article->category->name}}</span> </p>
                            <p class="card-text">Creato da: <span class="text-danger text-uppercase">{{$article->user->name}}</span> </p>
                            <small>data pubblicazione: {{$article->created_at->format('d/m/Y - H:i')}}</small>
                            <a href="{{ route('article.show', compact('article')) }}"
                                class="btn bg-orange">Dettaglio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>






</x-layout>
