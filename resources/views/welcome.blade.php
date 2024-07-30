<x-layout>

    <div class="container-fluid text-center homeDiv">
        <div class="row justify-content-center align-items-center  rowHome">
            <div class="col-12 col-md-6">
                <h1 class="display-4 h1Home">Presto.it</h1>
                <h3 class="">{{ __('ui.subTitle') }}</h3>
                <div class="my-3">
                    @guest
                    <a href="{{route('login')}}" class="btn btnHome" >{{ __('ui.startNow') }}</a>
                    @endguest
                    @auth
                    <a href="{{route('create.article')}}" class="btn btnHome" >{{ __('ui.startNow') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('errorMessage'))
    <div class="row justify-content-center mt-4">
        <div class="alert alert-danger text-center shadow rounded w-50">
        {{session('errorMessage')}}
        </div>
    </div>
    @endif

    {{-- SNIPPET PER FLASH MESSAGE --}}
    @if (session()->has('message'))
    <div class="row justify-content-center mt-4">
        <div class="alert text-center shadow rounded w-50 message"> {{ session('message') }}
        </div>
    </div>
@endif
    <div class="row py-5">
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
</x-layout>