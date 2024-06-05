<x-layout>
    <div class="container-fluid pt-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-8 text-center ">
                <h1 class="display-2">
                    {{ __('ui.revisorDashboard') }}
                </h1>
            </div>
            @if ($article_to_check)
                <div class="row justify-content-center pt-5 shadow rounded-4 mt-5">
                    @if ($article_to_check->images->count())
                        @foreach ($article_to_check->images as $key => $image)
                            <div class="col-6 bg-info">
                                <div class="card mb-3 ">
                                    <div class="row g-0 ">
                                        <div class="col-md-4">
                                            <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-start"
                                                alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->titolo }}'">
                                        </div>

                                        <div class="col-md-5 ps-3">
                                            <div class="card-body">
                                                <h5>Labels</h5>
                                                @if ($image->labels)
                                                    @foreach ($image->labels as $label)
                                                        #{{ $label }},
                                                    @endforeach
                                                @else
                                                    <p class="fst-italic">No labels</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-8 ps-3">
                                            <div class="card-body">
                                                <h5 class="">Ratings</h5>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->adult }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-10">adult</div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class=" text-center mx-auto {{ $image->violence }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-10">violence</div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class=" text-center mx-auto {{ $image->spoof }}"> </div>
                                                    </div>
                                                    <div class="col-10">spoof</div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class=" text-center mx-auto {{ $image->racy }}"> </div>
                                                    </div>
                                                    <div class="col-10">racy</div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class=" text-center mx-auto {{ $image->medical }}"> </div>
                                                    </div>
                                                    <div class="col-10">medical</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 col-md-6 mb-4">
                            <div class="row justify-content-center">
                                <img src="{{Storage::url('img/noImage.png')}}" alt="">
                            </div>
                        </div>
                    @endif
                    <div class="col-12 col-md-6 ps-4 d-flex flex-column justify-content-around text-center">
                        <div>
                            <h3 class="display-3 fw-bold my-5">{{ $article_to_check->titolo }}</h3>
                            <p class="text-muted fs-2 my-5">{{ $article_to_check->descrizione }}</p>
                            <p class="text-muted fs-3 mt-5">Category: <span class="text-warning">{{ $article_to_check->category->name }} </span> </p>
                            <p class="fs-3 text-muted mb-5">User: <span class=" text-primary text-uppercase">{{ $article_to_check->user->name }}</span> </p>
                            <p class="fs-2 text-muted mt-5">Price: <span class="text-dark fw-bold">{{ $article_to_check->prezzo }} €</span> </p>
                        </div>
                        <div class="d-flex pb-4 justify-content-around">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                            </form>
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-12">

                        <h4 class="fs-3 position-absolute translate-middle z-2" style="top: 400px;left: 50%">
                            {{ __('ui.noItemsToReview') }}
                        </h4>
                        <img src="{{Storage::url('img/noReview2.png')}}" class="rounded-5 img-fluid" style="filter: drop-shadow(20px 20px 4px black" alt="">
                        {{-- <a href="{{ route('home') }}" class="mt-5 btn bg-danger">{{ __('ui.backToHomepage') }}</a> --}}
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success position-absolute bottom-0 end-0 alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</x-layout>
