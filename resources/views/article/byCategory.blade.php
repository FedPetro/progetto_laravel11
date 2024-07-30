<x-layout>
    <div class="container">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-5">
                <h1 class="display-4">{{ __('ui.artCat') }} <span class="fst-italic fw-bold">{{__("ui.$category->name")}}</span></h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article" />
            </div>
            @empty
            <div class="col-12">
                <h3 class="text-center byCategory">{{ __('ui.noArtCat') }}</h3>
                @auth
                <div class="catBtn d-flex justify-content-center">
                    <a class="btn aggiungiCat my-5" href="{{route('create.article')}}">{{ __('ui.insert') }}</a>
                </div>
                @endauth
            </div>
            @endforelse
        </div>
    </div>
</x-layout>