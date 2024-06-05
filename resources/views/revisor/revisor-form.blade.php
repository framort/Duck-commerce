<x-layout>
    
    <div class="container mt-5 mb-5 text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Compila il form per inviare la richiesta</h1></div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 border p-5 shadow rounded">
                <form method="POST" action="{{route('become.revisor')}}" style="width: 26rem;" >
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.name')}}</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.mail')}}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="text">{{__('ui.description')}}</label>
                        <textarea name="description" class="form-control  @error('descrizione') is-invalid @enderror" id="description" rows="4">{{old('description')}}
                        </textarea>
                    
                    <button data-mdb-ripple-init type="submit" class="btn bg-orange btn-block mb-4 mt-4">{{__('ui.send')}}</button>
                </form>
            </div>
        </div>
        
    </div>



</x-layout>