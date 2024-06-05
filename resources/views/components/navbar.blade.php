<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        {{-- <a class="navbar-brand text-warning" href="#">Bug Busters</a> --}}
        {{-- <a href="{{route('home')}}">
            <img src="./img/bugbusters.png" alt="" height="50px" class="me-3 navbar-brand">
        </a> --}}
        <a class="navbar-brand" href="{{ route('home') }}">
            {{-- <img src="{{ Storage::url('img/bugbusters.png') }}" alt="" height="45px"> --}}
            <img src="{{ Storage::url('img/face.png') }}" alt="" height="45px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                {{-- <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                </li> --}}
                <li class="nav-item mx-2 ">
                    <a class="nav-link text-warning-emphasis" href="{{ route('article.all') }}">{{ __('ui.allArticles') }}</a>
                </li>


                <div class="dropdown">
                    <a class=" nav-link dropdown-toggle text-warning-emphasis" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.allCategories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('article.category', $category) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                </div>
                @auth
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('form.revisor') }}">{{__('ui.revisorDashboard')}}</a>
                </li> --}}
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link text-info-emphasis" href="{{ route('revisor.index') }}">{{ __('ui.revisorDashboard') }}
                                @if (\App\Models\Article::toBeRevisedCount() >= 1)
                                    <span
                                        class=" position-relative top-0 start-0 translate-middle badge rounded-pill bg-danger">
                                        {{ \App\Models\Article::toBeRevisedCount() }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-info-emphasis"
                                href="{{ route('become.revisor') }}">{{ __('ui.doYouWantToBecomeRevisor?') }}</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown ms-auto">
                        <a class="nav-link dropdown-toggle btn bg-warning text-dark text-uppercase" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"
                                    href="{{ route('article.create') }}">{{ __('ui.insertAnAnouncement') }}</a></li>
                            {{-- <li><a class="dropdown-item text-decoration-line-through"
                                    href="">{{ __('ui.yourArticles') }}</a>
                            </li> --}}
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-warning-emphasis" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit()">{{ __('ui.logout') }}</a>
                                <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item ms-auto">
                        <a class="nav-link btn bg-warning text-dark" href="{{ route('login') }}"><i
                                class="fa-solid fa-right-from-bracket"> </i> {{ __('ui.login') }}</a>
                    </li>
                @endguest
                    {{-- <li><a class="dropdown-item" href="#"><x-_locale lang="it" /></a></li> --}}

                {{-- <li class="nav-item dropdown language btn-danger"> --}}
                    {{-- <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.selectLanguage') }} 
                    </button> --}}
                    {{-- <ul class="dropdown-menu  dropdown-menu-end"> --}}
                        <li class="nav-item"><x-_locale lang="it" /></li>
                        <li class="nav-item"><x-_locale lang="en" /></li>
                        <li class="nav-item"><x-_locale lang="es" /></li>
                    {{-- </ul> --}}
                {{-- </li> --}}



            </ul>
        </div>
    </div>
</nav>
