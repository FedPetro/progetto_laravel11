<nav class="navbar navbar-expand-lg pt-3 fixed-top">
    <div class="container-fluid">
        <!-- Brand Logo -->
        <a class="navbar-brand  d-flex align-content-center pb-2" href="{{ route('homepage') }}">
            <img src="/image/PrestoLogo.svg" alt="">
        </a>
        <!-- Toggler button for responsive design -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar"
            aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse " id="myNavbar">
          <div class="d-flex flex-column flex-md-row justify-content-center align-items-md-center w-100">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- All Articles link -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('article.index') }}">{{ __('ui.allArticles') }}</a>
                </li>

                <!-- Categories Dropdown -->
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle text-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-card-list"></i>
                        {{ __('ui.cat') }}
                    </a>
                    <ul class="dropdown-menu ">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                    href="{{ route('byCategory', ['category' => $category]) }}">{{ __("ui.$category->name") }}</a>
                                @if (!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Add New Article link -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('create.article') }}"><i
                            class="bi bi-plus-circle me-1"></i>{{ __('ui.insert') }}</a>
                </li>
            </ul>
          
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex justify-content-end pe-4">
              @auth
              <!-- Revisor Zone link for authenticated users with the 'is_revisor' role -->
              @if (Auth::user()->is_revisor)
              <li class="nav-item revResp">
                <a class="nav-link position-relative w-sm-25 revisore" href="{{ route('revisor.index') }}">
                  <i class="bi bi-pen-fill"></i>
                                {{ __('ui.revision') }}
                                <span
                                    class="position-absolute top-0 start-100 badge rounded-pill counterColor">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                            </a>
                        </li>
                    @endif

                    <!-- User Dropdown for authenticated users -->
                    <li class="nav-item dropdown ms-5 utente ">
                        <!-- Inserire media query per quando la navbar diventa responsive (ms va eliminato) -->
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                            </li>
                            <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <!-- User Dropdown for guests -->
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill "></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        </ul>
                    </li>
                @endauth


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-1" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-translate"></i>
                    </a>
                    <ul class="dropdown-menu drpLingue">
                        <li class="lingueBg "><x-_locale lang="it" class="dropdown-item lingueBg" /></li>
                        <li class="lingueBg"><x-_locale lang="en" class="dropdown-item lingueBg" /></li>
                        <li class="lingueBg"><x-_locale lang="es" class="dropdown-item lingueBg" /></li>
                    </ul>
                </li>
            </ul>

            <div class="w-50 d-none d-md-block">
              <form class="d-flex ms-auto searchDiv" role="search" action="{{ route('article.search') }}" method="GET">
                <div class="input-group">
                    <input type="search" name="query" class="form-control" placeholder="{{ __('ui.find') }}"
                        aria-label="search">
                    <button type="submit" class="input-group-text btn searchBtn bi bi-search" id="basic-addon2">
    
                    </button>
                </div>
            </form>
            </div>

            <div class="w-75 d-block d-md-none">
              <form class="d-flex ms-auto searchDiv" role="search" action="{{ route('article.search') }}" method="GET">
                <div class="input-group">
                    <input type="search" name="query" class="form-control" placeholder="{{ __('ui.find') }}"
                        aria-label="search">
                    <button type="submit" class="input-group-text btn searchBtn bi bi-search" id="basic-addon2">
    
                    </button>
                </div>
            </form>
            </div>

        </div>
      </div>
        
    </div>
</nav>
