<x-layout>
    
    @if (session()->has('message'))
    <div class="alert alert-success text-center shadow rounded w-50"> {{ session('message') }}
    </div>
    @endif
    
    <div class="container-fluid ">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4 h1Index">{{ __('ui.allArticles') }}</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-3">
            @forelse ($articles as $article)
            <div class="col-6 col-md-3">
                <x-card :article="$article" />
            </div>
            @empty
            <div class="col-12">
                <h3 class="text-center">{{ __('ui.noArt') }}</h3>
            </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{$articles->links()}}
        </div>
    </div>
</x-layout>
