<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}


    @if (session()->has('success'))
        <div class="row justify-content-center mt-4">
            <div class="alert text-center shadow rounded w-50 message"> {{ session('success') }}
            </div>
        </div>
    @endif


    <form wire:submit="store" class="shadow rounded p-5 formArticolo">
        <div class="mb-3 text-start">
            <label for="title" class="form-label">{{ __('ui.title') }}</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                wire:model.blur="title">
            <div class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3 text-start">
            <label for="description" class="form-label">{{ __('ui.desc') }}</label>
            <textarea class="form-control description @error('description') is-invalid @enderror" id="description" cols="30"
                rows="10" wire:model.blur="description"></textarea>
            <div class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3 text-start">
            <label for="price" class="form-label">{{ __('ui.price') }}</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                wire:model.blur="price">
            <div class="text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3 text-start">
            <label for="category" class="form-label">{{ __('ui.chooseCat') }}</label>
            <select id="category" wire:model.blur="category"
                class="form-control @error('category') is-invalid @enderror">
                {{-- <option label disabled> Seleziona una categoria </option>  --}}
                <option class="defaultCat">{{ __('ui.selectCat') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ __("ui.$category->name") }}</option>
                  
                @endforeach
            </select>
            <div class="text-danger">
                @error('category')
                    {{ $message }}
                @enderror
            </div>
        </div>


        {{-- inserimento immagini --}}
        <div class="mb-3 text-start">
            <label for="img" class="form-label">{{ __('ui.img') }}</label>
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p class="photoPrew">Photo preview:</p>
                    <div class="row border border-4 border-success rounded shadow py-4 mb-2">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto shadow rounded"
                                    style="background-image: url({{ $image->temporaryUrl() }});">
                                    <button type="button" class="btn mt-1"
                                        wire:click="removeImage({{ $key }})">X</button>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif





        <div class="d-flex justify-content-center">

            <button type="submit" class="btn">{{ __('ui.addArt') }}</button>

        </div>


    </form>







</div>
