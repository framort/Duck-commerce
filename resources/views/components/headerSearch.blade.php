<header class="headerHome">
    <video class="myvideo" autoplay  muted id="videoFilter">
        <source src="{{ Storage::url('img/header.webm') }}" type="video/webm" />
    </video>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card d-none" id="search">
                    <h1 class="heading text-center  display-2 ">DUCK COMMERCE</h1>
                        <form class="d-flex justify-content-center" role="search" action="{{route('article.search')}}" method="GET">
                                <div class="search mt5">
                                    <input type="search" class="search-input" placeholder="{{__('ui.welcome')}}" name="query"> 
                                    <button type="submit" class="search-icon"> <i class="fa fa-search"></i></button> 
                                </div>
                        </form>
                        {{-- <div class="row mt-4 g-1 px-4 mb-5 justify-content-center">
                            <div class="col-md-2">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <i class="bi bi-camera"></i>
                                    <div class="text-center mg-text"> <span class="mg-text">Elettronica</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <div class="text-center mg-text"> <span class="mg-text">Sport</span> </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <div class="text-center mg-text"> <span class="mg-text">Casa</span> </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <div class="text-center mg-text"> <span class="mg-text">Animali</span> </div>
                                </div>
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
</header>
