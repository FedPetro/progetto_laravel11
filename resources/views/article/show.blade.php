<x-layout>
  
  
  
  <div class="container-fluid min-vh-100 justify-content-center ">
    <div class="row justify-content-center py-5">
      <div class="col-12 col-md-5 mb-3 mt-5">
        @if ($article->images->count() > 0)
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            @foreach ($article->images as $key => $image)
            
            <div class="carousel-item @if ($loop->first) active @endif">
              <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
            </div>
            @endforeach
          </div>
          
          
          @if ($article->images->count() > 1)
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          @endif
        </div>
        
        @else
        <img src="https://picsum.photos/301" class="d-block w-100" alt="Nessuna foto inserita dall'utente">
        @endif
      </div>
      <div class="col-12 col-md-5 mb-3 d-flex ">
        <div class="d-flex flex-column justify-content-center">
          <h2 class="display-5"><span class="fw-bold"> </span>{{$article->title}}</h2>
          <h4 class="fw-bold priceDet"> {{$article->price}}€</h4>
          <a href="{{route('byCategory', ['category' => $article->category])}}"><h4 class="fw-bold mt-4"> <span class="badge badgeDet">{{ __("ui.". $article->category->name)}}</span></h4></a>
          <h5 class="mt-4"><i class="bi bi-person-circle"></i> {{ $article->user->name }}</h5>
          <p class="mt-4 descrDet">{{$article->description}}</p>
          
          @auth
          @if (Auth::id() == $article->user->id)
          {{-- tasto modifica --}}
          <div class="buttonsDet d-flex justify-content-evenly mt-4">
            <a href="{{route('article.edit', compact('article'))}}" class="btn btnCards editDet">{{ __('ui.edit') }}</a>
            {{-- tasto elimina --}}
            <form action="{{route('destroy', compact('article'))}}" method="POST" >
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btnCards deleteDet">{{ __('ui.delete') }}</button>
            </form>
          </div>
          @endif
          @endauth
          
        </div>
      </div>
    </div>
  </div>
  
{{-- </div>
</div>
</div>
</div>
</div> --}}
</x-layout>