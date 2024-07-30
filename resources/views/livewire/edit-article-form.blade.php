<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form {{-- method="POST"
      action="{{route('article.update',['article'=>$article])}}"
      enctype="multipart/form-data" --}} wire:submit="editArticle" class="shadow rounded p-5 formArticolo">
        {{-- la direttiva method permette di sovrascrivere il metodo http originario del form --}}
        {{-- @method('PUT') --}}
        {{-- ? SPOOFING --}}
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('ui.title') }}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                wire:model.blur="title">
            <div class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('ui.desc') }}</label>
            <textarea class="form-control @error('title') is-invalid @enderror" id="description" cols="30" rows="10"
                wire:model="description"></textarea>
            <div class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3">

            <label for="img" class="form-label">{{ __('ui.currentImg') }}</label>
            @foreach ($article->images as $image)
                <img width="200" height="200" src="{{ Storage::url($image->path) }}" alt="">

                <button type="button" class="btn mt-1 btn-danger"
                    wire:click="deleteImage({{ $image->id }})">X</button>
            @endforeach

            {{-- <label for="img" class="form-label">Inserisci immagine</label>
      <input type="file" name="img" class="form-control" id="img"> --}}


            <div class="mb-3">
                <label for="img" class="form-label">{{ __('ui.newImg') }}</label>
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
                        <p>Photo preview:</p>
                        <div class="row border border-4 border-success rounded shadow py-4">
                            @foreach ($images as $key => $image)
                                <div class="col d-flex flex-column align-items-center my-3">
                                    <div class="img-preview mx-auto shadow rounded"
                                        style="background-image: url({{ $image->temporaryUrl() }});">
                                        <button type="button" class="btn mt-1 btn-danger"
                                            wire:click="removeImage({{ $key }})">X</button>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>


        <div class="mb-3">
            <label for="price" class="form-label">{{ __('ui.price') }}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="price"
                wire:model="price">
            <div class="text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{ __('ui.chooseCat') }}</label>
            <select id="category" class="form-control @error('title') is-invalid @enderror" wire:model="category">
                {{-- <option label disabled> Seleziona una categoria </option>  --}}
                <option disabled class="defaultCat">{{ __('ui.selectCat') }}</option>
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


        <div class="d-flex justify-content-center">

            <button type="submit" class="btn">{{ __('ui.editArt') }}</button>
    </form>
</div>
