<a href="" class="w-100">
    <form class="d-inline" action="{{route('setLocale', $lang)}}" method="POST">
        @csrf
        <button type="submit" class="btn d-flex justify-content-center align-items-center p-0 ms-3">
            <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32" />
            {{-- <p class="ms-2">{{$lang}}</p> --}}
        </button>
    </form>
</a>