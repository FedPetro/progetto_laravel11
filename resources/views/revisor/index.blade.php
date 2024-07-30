<x-layout>
    <div class="container-fluid">
        <div class="row d-flex justify-center">
            <div class="col-12 col-md-12">
                <div class=""> 
                    <h1 class="display-5 text-center pb-2 ">
                        {{ __('ui.review') }}
                    </h1>
                </div>
            </div>
        </div>
        
        @if (session()->has('message'))
        <div class="row justify-content-center mt-4">
            <div class="col-5 alert message text-center shadow rounded">
                {{ session('message') }}
            </div>
        </div>
        @endif
        
        <div class="container-fluid min-vh-100 justify-content-center">
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-5 mb-3">
                    {{-- <div class="cardRev mb-5"> --}}
                        @isset($article_to_check)
                        @if ($article_to_check->images->count() > 0)
                        {{-- <div class="row justify-content-center pt-5"> --}}
                            {{-- <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner"> --}}
                                    @foreach ($article_to_check->images as $key => $image)
                                    {{-- <div class="col-6 col-md-4 mb-4"> --}}
                                        {{-- <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}">
                                        </div> --}}

                                        {{-- <div class="col-12 col-md-12 mb-3"> --}}
                                            <div class="col-12 ">
                                                <div class="card mb-3 checkBg">
                                                    <div class="row g-0 ">
                                                        <div class="col-md-4">
                                                            <img src="{{ $image->getUrl(300, 300) }}"
                                                            class="img-fluid rounded-start" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'"
                                                            >
                                                        </div>
                                                        <div class="col-md-5 ps-3">
                                                            <div class="card-body">
                                                                <h5>Labels</h5>
                                                                @if ($image->labels)
                                                                @foreach ($image->labels as $label)
                                                                #{{ $label }},
                                                                @endforeach
                                                                @else
                                                                <p class="fst-italic">No labels</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card-body">
                                                                <h5>Ratings</h5>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-2">
                                                                        <div class="text-center mx-auto {{ $image->adult }}"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10">adult</div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-2">
                                                                        <div class=" text-center mx-auto {{ $image->violence }}"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10">violence</div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-2">
                                                                        <div class=" text-center mx-auto {{ $image->spoof }}"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10">spoof</div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-2">
                                                                        <div class=" text-center mx-auto {{ $image->racy }}"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10">racy</div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-2">
                                                                        <div class=" text-center mx-auto {{ $image->medical }}"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10">medical</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        {{-- </div> --}}




                                        @endforeach
                                    {{-- </div> --}}
                                    
                                    
                                    
                                    {{-- @if ($article_to_check->images->count() > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    @endif --}}
                                {{-- </div> --}}
                            </div>
                            
                            
                            @else
                            <img src="https://picsum.photos/301" class="d-block w-100" alt="Nessuna foto inserita dall'utente">
                            {{-- <div class="row justify-content-center pt-5">
                                @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/300" class="img-fluid rounded shadow" alt="immagine segnaposto">
                                </div>
                                @endfor
                            </div> --}}
                            @endif
                            
                            {{-- <div class="row justify-content-center pt-5">
                                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between"> --}}
                                    <div class="col-12 col-md-5 mb-3 d-flex ">
                                        <div class="d-flex flex-column justify-content-center">
                                            {{-- <div> --}}
                                                {{-- <h1>{{ $article_to_check->title }}</h1> --}}
                                                <h2 class="display-5"><span class="fw-bold"> </span>{{$article_to_check->title}}</h2>
                                                {{-- <h4>{{ $article_to_check->price }}€</h4> --}}
                                                <h4 class="fw-bold priceDet"> {{$article_to_check->price}}€</h4>
                                                {{-- <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4> --}}
                                                <h4 class="fw-bold mt-4"><span class="badge badgeDet">{{$article_to_check->category->name}}</span></h4>
                                                {{-- <h3>{{ __('ui.auth') }}: {{ $article_to_check->user->name }} </h3> --}}
                                                <h5 class="mt-4"><i class="bi bi-person-circle"></i> {{ $article_to_check->user->name }}</h5>
                                                {{-- <p class="h6">{{ $article_to_check->description }}</p> --}}
                                                <p class="mt-4 descrDet">{{$article_to_check->description}}</p>
                                                
                                                
                                                
                                                <div class="d-flex pb-4 mt-3">
                                                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn py-2 px-5 fw-bold acceptButton editDet">
                                                            {{-- {{ __('ui.approve') }} --}}
                                                            <i class="bi bi-check-lg"></i></button>
                                                        </form>
                                                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST" class="ms-3">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-danger py-2 px-5 fw-bold deleteDet">
                                                                {{-- {{ __('ui.reject') }} --}}
                                                                <i class="bi bi-x-lg"></i>
                                                            </button>
                                                        </form>
                                                        {{-- <form action="{{ route('undo', ['article' => $article_to_check]) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-success py-2 px-5 fw-bold editDet mb-3"><i class="bi bi-arrow-counterclockwise"></i></button>
                                                        </form> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="row justify-content-center align-items-center text-center ">
                                                <div class="col-12 col-md-12">
                                                    <h1 class="fst-italic display-4">{{ __('ui.noArtRev') }}</h1>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 d-flex mt-3 w-100 justify-content-evenly">
                                                    <a href="{{route('homepage')}}" class="btn aggiungiCat">{{ __('ui.backToHome') }}</a>
                                                    <form action="{{ route('undo', ['article' => $article_to_check]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn py-2 px-5 fw-bold undoButton aggiungiCat">{{ __('ui.undo') }}</button>
                                                    </form> 
                                                </div>
                                            </div>
                                            {{-- <div class="row justify-content-center align-items-center text-center ">
                                                <form action="{{ route('undo', ['article' => $article_to_check]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-success py-2 px-5 fw-bold undoButton aggiungiCat mb-3">Undo</button>
                                                </form> 
                                            </div> --}}
                                            @endisset
                                            
                                            {{-- <div class="row justify-content-center align-items-center text-center">
                                                <form action="{{ route('undo', ['article' => $article_to_check]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-success py-2 px-5 fw-bold undoButton mb-3">Undo</button>
                                                </form>
                                            </div> --}}
                                        </div>
                                        <div class="row">
                                            
                                            
                                            {{-- {{-- @foreach ($article_to_check->images as $key=>$image)  --}}
                                            
                                            {{-- @endforeach --}}
                                         
                                            
                                        </div>
                                    </div>
                                </div>
                            </x-layout>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            {{-- <x-layout>
                                <div class="container-fluid pt-5">
                                    <div class="row d-flex justify-center">
                                        <div class="col-12 col-md-12 ">
                                            <div class=""> 
                                                <h1 class="display-5 text-center pb-2 ">
                                                    {{ __('ui.review') }}
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if (session()->has('message'))
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-5 alert message text-center shadow rounded">
                                            {{ session('message') }}
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="cardRev mb-5">
                                        @isset($article_to_check)
                                        @if ($article_to_check->images->count())
                                        <div class="row justify-content-center pt-5">
                                            @foreach ($article_to_check->images as $key => $image)
                                            <div class="col-6 col-md-4 mb-4">
                                                <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}">
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="row justify-content-center pt-5">
                                            @for ($i = 0; $i < 6; $i++)
                                            <div class="col-6 col-md-4 mb-4 text-center">
                                                <img src="https://picsum.photos/300" class="img-fluid rounded shadow" alt="immagine segnaposto">
                                            </div>
                                            @endfor
                                        </div>
                                        @endif
                                        
                                        <div class="row justify-content-center pt-5">
                                            <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                                                <div>
                                                    <h1>{{ $article_to_check->title }}</h1>
                                                    <h3>{{ __('ui.auth') }}: {{ $article_to_check->user->name }} </h3>
                                                    <h4>{{ $article_to_check->price }}€</h4>
                                                    <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                                                    <p class="h6">{{ $article_to_check->description }}</p>
                                                </div>
                                                
                                                
                                                <div class="d-flex pb-4 justify-content-around mt-3">
                                                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn py-2 px-5 fw-bold acceptButton">{{ __('ui.approve') }}</button>
                                                    </form>
                                                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-danger py-2 px-5 fw-bold rejectButton">{{ __('ui.reject') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row justify-content-center align-items-center text-center ">
                                            <div class="col-12">
                                                <h1 class="fst-italic display-4">{{ __('ui.noArtRev') }}</h1>
                                                <a href="{{route('homepage')}}" class="mt-5 btn btn-success">{{ __('ui.backToHome') }}</a>
                                            </div>
                                        </div>
                                        @endisset
                                        
                                        <div class="row justify-content-center align-items-center text-center">
                                            <form action="{{ route('undo', ['article' => $article_to_check]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-success py-2 px-5 fw-bold undoButton mb-3">Undo</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </x-layout> --}}
                            