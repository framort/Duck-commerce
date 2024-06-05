<x-layout>

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 m-3 p-5 shadow rounded-5">
                <div class="text-center">
                    <h1><i class="fa-solid fa-hamsa"></i><br>{{__('ui.register')}}</h1>
                    <p><a href="" class="nav-link"></a></p>
                    <hr>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.name')}}</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"" value="{{old('name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.mail')}}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.confirmPassword')}}</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password">
                    </div>

                    <button type="submit" class="btn btn-warning mt-4">{{__('ui.register')}}</button>
                </form>
                <hr>
                <p>{{__('ui.alreadyHaveAccount')}}</p>
                <a href="{{ route('login') }}" class="btn btn-success">{{__('ui.login')}}</a>

            </div>
        </div>
    </div>



</x-layout>
