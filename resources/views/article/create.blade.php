<x-layout>

    <div class="container-fluid text-center createDiv d-md-none">
        <div class="row justify-content-center align-items-center  rowHome">
            <div class="col-12 col-md-6">
                <img src="\image\PrestoCreate.png" class="logoImg w-75" alt="">
                <h1 class="display-4 bgText">{{ __('ui.motto') }}</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center h1Create">
        <div class="row justify-content-center d-flex justify-content-center">
            <div class="col-12 col-md-3 bg-image me-5 d-none d-md-block">
                <div class="textDiv h-100 d-flex align-items-center d-flex flex-column">
                    <div class="logo h-100 align-content-center">
                        <img src="\image\PrestoCreate.png" class="logoImg w-100" alt="">
                        <h4 class="bgText align-content-start text-start d-flex align-items-center fw-bold">{{ __('ui.motto') }}</h4>
                    </div>
                {{-- <h1 class="display-4 h1Create">{{ __('ui.insert') }}</h1> --}}
                </div>
            </div>
        

        <div class="col-12 col-md-4 formDiv mb-3">
            <livewire:create-article-form/>
        </div>
    </div>
</div>

</x-layout>