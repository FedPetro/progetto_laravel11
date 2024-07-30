<x-layout>
    
    <div class="container-fluid ">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12 h1Index">
                <h1 class="display-1 mt-5">{{ __('ui.aboutUs') }}</h1>
            </div>
        </div>
        
        <div class="container my-4">
            <div class="row justify-content-center">
                @foreach ($collaboratori as $collaboratore)    
                <div class="col-12 col-md-3">
                    <div class="shell">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="{{$collaboratore['img']}}" class="card-img-top img-responsive" alt="">
                                        </div>
                                        <div class="card-body">
                                            <div class="wsk-cp-text">
                                                <div class="title-product card-title">
                                                    <h3 class="card-title">{{$collaboratore['name']}}</h3>
                                                </div>
                                                <div class="description-prod justify-content-start descHeight">
                                                    <p>{{$collaboratore['description']}} </p>
                                                    {{-- <p>Description Product tell me how to change playlist height size like 600px in html5 player. player good work now check this link</p> --}}
                                                </div>
                                                <div class="card-footer">
                                                    <div class="wcf-left"><p class="card-text">{{ __('ui.age') }}: {{$collaboratore['age']}}</p></div>
                                                    <div class="wcf-right">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>  
</x-layout>