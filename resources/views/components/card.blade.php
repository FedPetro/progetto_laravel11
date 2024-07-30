<div class="shell">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="wsk-cp-product">
                    <div class="wsk-cp-img">
                        <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200'}}" class="card-img-top img-responsive" alt="Immagine dell'articolo {{ $article->title }}">
                        {{-- <img src="https://3.bp.blogspot.com/-eDeTttUjHxI/WVSvmI-552I/AAAAAAAAAKw/0T3LN6jABKMyEkTRUUQMFxpe6PLvtcMMwCPcBGAYYCw/s1600/001-culture-clash-matthew-gianoulis.jpg" alt="Product" class="img-responsive" /> --}}
                    </div>
                    <div class="card-body">
                        <div class="wsk-cp-text">
                            <div class="category">
                                <a href="{{route('article.show', compact('article'))}}" class="btn btnCards">{{ __('ui.show') }}</a>
                                {{-- <span>Ethnic</span> --}}
                            </div>
                            <div class="title-product card-title">
                                <h3 class="card-title">{{$article->title}}</h3>
                            </div>
                            <div class="description-prod justify-content-start">
                                <p>{{$article->description}} </p>
                                {{-- <p>Description Product tell me how to change playlist height size like 600px in html5 player. player good work now check this link</p> --}}
                            </div>
                            <div class="card-footer">
                                {{-- <div class="wcf-left"><span class="price">Rp500.000</span></div> --}}
                                <div class="wcf-left"><span class="price">{{$article->price}} €</span></div>
                                <div class="wcf-right">
                                    {{-- <a href="#" class="buy-btn"><i class="zmdi zmdi-shopping-basket"></i></a> --}}
                                    <a href="{{route('byCategory', ['category' => $article->category])}}"><span class="badge">{{ __("ui.". $article->category->name)}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



























{{-- <div class="card mx-auto card-w shadow test-center mb-3" style="width: 18rem;">
    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200'}}" class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">
    
    <div class="card-body">
        <h4 class="card-title">{{$article->title}}</h4>
        <h6 class="card-subtitle text-body-secondary">{{$article->price}} €</h6>
        <p class="description">{{$article->description}} </p>
        <a href="{{route('byCategory', ['category' => $article->category])}}"><span class="badge ">{{$article->category->name}}</span></a>
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            
            <a href="{{route('article.show', compact('article'))}}" class="btn btnCards">{{ __('ui.show') }}</a>
            
            @auth
            @if (Auth::id() == $article->user->id)
            
            <a href="{{route('article.edit', compact('article'))}}"></a>
            <a href="{{route('article.edit', compact('article'))}}" class="btn btnCards editBtn">{{ __('ui.edit') }}</a>
            <form action="{{route('destroy', compact('article'))}}" method="POST" >
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btnCards deleteBtn">{{ __('ui.delete') }}</button>
            </form>
            
            
            @endif
            @endauth
        </div>
        
    </div>
</div> --}}