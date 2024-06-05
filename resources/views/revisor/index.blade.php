<x-layout>
    @if (session()->has('message'))
        <div class="alert alert-success alert-custom alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid pt-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-8 text-center ">
                <h1 class="display-2">
                    {{ __('ui.revisorDashboard') }}
                </h1>
            </div>
            @if ($article_to_check)
                @if ($article_to_check->images->count()>0)
                    <div class="row justify-content-center align-items-center pt-5 mt-5 w-100">
                        <div class="col-12 col-md-5">
                            <div id="carouselindex" class="carousel slide">
                                <div class="carousel-indicators">
                                    @foreach ($article_to_check->images as $key => $image)
                                        <button type="button" data-bs-target="#carouselindex"
                                            data-bs-slide-to="{{$loop->index}}" class="bg-dark @if($loop->first) active @endif" aria-current="true"
                                            aria-label="Slide 1"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach ($article_to_check->images as $image)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-start d-block"
                                                width="100%"
                                                alt="Immagine {{ $loop->index }} dell'articolo '{{ $article_to_check->titolo }}'">
                                        </div>
                                    @endforeach
                                </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselindex" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselindex" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                {{-- </div> --}}
                            </div>

                            <div class="row justify-content-center text-center mt-2">
                                <h5>Ratings</h5>
                                <div class="col-4 d-flex justify-content-center">
                                    <p class="{{ $image->adult }} my-0 mx-1"> adult</p>
                                    <p class="{{ $image->violence }} m-0 mx-1"> violence</p>
                                    <p class="{{ $image->spoof }} m-0 mx-1"> spoof</p>
                                    <p class="{{ $image->racy }} m-0 mx-1"> racy</p>
                                    <p class="{{ $image->medical }} m-0 mx-1"> medical</p>
                                </div>
                                <div class="col-12">
                                    <h5 class="">Labels</h5>
                                    @if ($image->labels)
                                        @foreach ($image->labels as $label)
                                            #{{ $label }},
                                        @endforeach
                                    @else
                                        <p class="fst-italic">No labels</p>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-5 ps-4 d-flex flex-column justify-content-around text-center">
                            <div>
                                <h3 class="display-3 fw-bold my-5">{{ $article_to_check->titolo }}</h3>
                                <p class="text-muted fs-2 my-5">{{ $article_to_check->descrizione }}</p>
                                <p class="text-muted fs-3 mt-5">Category: <span
                                        class="text-warning">{{ $article_to_check->category->name }} </span> </p>
                                <p class="fs-3 text-muted mb-5">User: <span
                                        class=" text-primary text-uppercase">{{ $article_to_check->user->name }}</span>
                                </p>
                                <p class="fs-2 text-muted mt-5">Price: <span
                                        class="text-dark fw-bold">{{ $article_to_check->prezzo }} €</span> </p>
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




                    {{-- 
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 bg-info">
                                    <div class="card mb-3 ">
                                        <div class="row g-0 ">
                                            <div class="col-md-4">
                                                <img src="{{ $image->getUrl(300, 300) }}"
                                                    class="img-fluid rounded-start"
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
                                                            <div class=" text-center mx-auto {{ $image->spoof }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">spoof</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class=" text-center mx-auto {{ $image->racy }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">racy</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class=" text-center mx-auto {{ $image->medical }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">medical</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                    {{-- @endforeach --}}
                @else
                    <div class="row w-100">
                        <div class="col-12 col-md-5 mb-4 d-flex justify-content-center">
                            {{-- <div class="row justify-content-center"> --}}
                            <img src="{{ Storage::url('img/noImage.png') }}" alt="" width="500px">
                            {{-- </div> --}}
                        </div>
                        {{-- @endif --}}
                        <div class="col-12 col-md-5 ps-4 d-flex flex-column justify-content-around text-center">
                            <div>
                                <h3 class="display-3 fw-bold my-5">{{ $article_to_check->titolo }}</h3>
                                <p class="text-muted fs-2 my-5">{{ $article_to_check->descrizione }}</p>
                                <p class="text-muted fs-3 mt-5">Category: <span
                                        class="text-warning">{{ $article_to_check->category->name }} </span> </p>
                                <p class="fs-3 text-muted mb-5">User: <span
                                        class=" text-primary text-uppercase">{{ $article_to_check->user->name }}</span>
                                </p>
                                <p class="fs-2 text-muted mt-5">Price: <span
                                        class="text-dark fw-bold">{{ $article_to_check->prezzo }} €</span> </p>
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

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger py-2 px-5 fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Annulla
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-theme="dark">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title fs-5 text-warning-emphasis"
                                                    id="exampleModalLabel">Duck commerce</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-white">
                                                Sei scuro di voler annullare l'azione?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('undo', ['article' => $article_undo]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-danger">Conferma</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                @endif
            @else
                <div class="rowjustify-content-center align-items-center text-center">
                    <div class="col-12">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger py-2 px-5 fw-bold position-absolute translate-middle z-2 my-5 my-md-0" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" style="top: 300px; left:50%;">
                            Annulla ultimo annuncio
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" data-bs-theme="dark">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title fs-5 text-warning-emphasis" id="exampleModalLabel">Duck
                                            commerce</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-white">
                                        Sei scuro di voler annullare l'azione?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('undo', ['article' => $article_undo]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger">Conferma</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="fs-3 position-absolute translate-middle z-2 my-5 my-md-0" style="top: 400px;left: 50%">
                            {{ __('ui.noItemsToReview') }}
                        </h4>

                        <img src="{{ Storage::url('img/noReview2.png') }}" class="rounded-5 img-fluid my-5 my-md-0"
                            style="filter: drop-shadow(20px 20px 4px black" alt="">
                        {{-- <a href="{{ route('home') }}" class="mt-5 btn bg-danger">{{ __('ui.backToHomepage') }}</a> --}}
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-layout>
