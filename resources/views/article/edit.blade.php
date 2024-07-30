<x-layout>

    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 h1Index">
                <h1 class="display-2 mt-5">{{ __('ui.editArt') }}</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 mt-4 mb-3">
            <livewire:edit-article-form :article="$article"/>
    </div>
</div>

</x-layout>