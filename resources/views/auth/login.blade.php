<x-layout>

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 m-3 p-5 shadow rounded-5">
                <div class="text-center">
                    <h1><i class="fa-solid fa-hamsa"></i><br>{{__('ui.login')}}</h1>
                    <p><a href="" class="nav-link"></a></p>
                    <hr>
                </div>
                <form method="POST" action="{{ route('login') }}" autocomplete="on">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.mail')}}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            aria-describedby="emailHelp">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror    
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-4">{{__('ui.login')}}</button>
                </form>

                <hr>
                <p>{{__('ui.areYouNew')}}</p>
                <a href="{{ route('register') }}" class="btn btn-warning">{{__('ui.register')}}</a>
            </div>
        </div>
    </div>



</x-layout>
