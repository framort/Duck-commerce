<div class="container-fluid my-4 mb-5">
    @if (session()->has('status'))
        <div class="alert alert-success position-absolute bottom-0 end-0 alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 border p-5 shadow rounded">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <form wire:submit="save" style="width: 26rem;">
        
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label">{{ __('ui.title') }}</label>
                            <input type="text" class="form-control @error('titolo') is-invalid @enderror" wire:model="titolo" />
                            @error('titolo')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form4Example2">{{ __('ui.price') }}</label>
                            <input type="number" id="form4Example2" class="form-control @error('prezzo') is-invalid @enderror"
                                wire:model="prezzo" />
                            @error('prezzo')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form4Example2">{{ __('ui.categories') }}</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" wire:model='category_id' id="">
                                <option value="" selected>Seleziona una
                                    categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form4Example3">{{ __('ui.description') }}</label>
                            <textarea class="form-control  @error('descrizione') is-invalid @enderror" id="form4Example3" rows="4"
                                wire:model="descrizione"></textarea>
                            @error('descrizione')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- gestione immagini --}}
                        <div data-mdb-input-init class= " form-outline mb-3">
                            <label class="form-label" for="form4Example2">{{ __('ui.images') }}</label>
                            <input type="file" wire:model.live="temporary_images" multiple
                                class="form-control d-inline shadow @error('temporary_images.*') is-invalid @enderror"
                                placeholder="Img/">
                            @error('temporary_images.*')
                                <p class=" text-danger">{{ $message }}</p>
                            @enderror
                            @error('temporary_images')
                                <p class=" text-danger">{{ $message }}</p>
                            @enderror
                            <div wire:loading class="spinner-border mt-3" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        @if (!empty($images))
                            <div class="row">
                                <div class="col-12">
                                    <p>Photo prewiew</p>
                                    <div class="row border boerder-4 border-success rounded shadow py-4">
                                        @foreach ($images as $key => $image)
                                            <div class="col d-flex flex-column align-items-center my-3">
                                                <div class="img-preview mx-auto shadow rounded"
                                                    style="background-image:url({{ $image->temporaryUrl() }});">
                                                </div>
                                                <button type="button" class="btn mt-1 btn-danger"
                                                    wire:click='removeImage({{ $key }})'>X</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <button data-mdb-ripple-init type="submit" wire:loading.class="disabled"
                            class="btn btn-warning btn-block mb-4 mt-4">{{ __('ui.send') }}</button>
                        {{-- <div wire:loading> 
                            Saving post...
                        </div> --}}
                    </form>

                </div>

                <div class="col-12 col-lg-5 d-flex justify-content-center align-items-center">
                    <img src="{{Storage::url('img/crea.png')}}" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
