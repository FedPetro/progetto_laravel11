
<footer class="footer-distributed">
	
	<div class="footer-left">
		
		<img src="/image/PrestoLogo.svg" alt="" >
		
		<p class="footer-links">
			
			<a href="{{ route('homepage') }}">Home</a>
			
			<a href="{{ route('article.index') }}">{{ __('ui.allArticles') }}</a>
			
			<a href="{{ route('create.article') }}">{{ __('ui.insert') }}</a>
			
			<a href="{{ route('aboutUs') }}">{{ __('ui.aboutUs') }}</a>

			{{-- <a href="#">{{ __('ui.contacts') }}</a> --}}
		</p>
		
		<p class="footer-company-name">Presto.it © 2024</p>
		
		{{-- pulsante --}}
		
		
		{{-- <div class="col-12 mt-4 text-center">
			<h5>{{ __('ui.workWithUs') }}</h5>
			<p>{{ __('ui.clickBelow') }}</p>
			<div class="divBtn">
				<a href="{{ route('workWithUs') }}" class="btn btn-primary">{{ __('ui.ask') }}</a>
			</div>
		</div> --}}
		
	</div>
	
	
	<div class="footer-center">
		@auth
		@if (Auth::check() && Auth::user()->is_revisor)
		<h6 class="lavora mb-4">{{ __('ui.congrat') }}</h6>
		@endif
		@if (Auth::check() && !Auth::user()->is_revisor)
		<a href="{{ route('workWithUs') }}"><h6 class="lavora mb-4">{{ __('ui.workWithUs') }}</h6></a>
		<a href="{{ route('workWithUs') }}" class="conNoi">{{ __('ui.ask') }} {{ __('ui.clickBelow') }} </a>
		<p class="conNoi"></p>
		@endif
		@else
		<a href="{{ route('login') }}"><h6 class="lavora mb-4">{{ __('ui.workWithUs') }}</h6></a>
		<a href="{{ route('login') }}" class="conNoi">{{ __('ui.ask') }} {{ __('ui.clickBelow') }} </a>
		<p class="conNoi"></p>
		@endauth
		
		{{-- </p>
		<div> --}}
			{{-- <i class="fa fa-map-marker"></i>
			<p><span>Via Roma 24</span> Milano</p>
		</div>
		
		<div>
			<i class="fa fa-phone"></i>
			<p>+39 0246678921</p>
		</div>
		
		<div>
			<i class="fa fa-envelope"></i>
			<p><a href="mailto:support@company.com">presto@company.it</a></p>--}}
		{{-- </div>  --}}
		
	</div>
	
	
	<div class="footer-right">
		
		<p class="footer-company-about">
			<a href="{{ route('aboutUs') }}"><span>{{ __('ui.aboutUs') }}</span></a>
			{{ __('ui.aboutUsDes') }}
		</p>
		
		<div class="footer-icons">
			
			<a href="#"><i class="bi bi-facebook"></i></a>
			<a href="#"><i class="bi bi-instagram"></i></i></a>
			<a href="#"><i class="bi bi-linkedin"></i></a>
			<a href="#"><i class="bi bi-twitter-x"></i></a>
			
		</div>
		
	</div>
	
</footer>









{{-- <div class="container-fluid">
	<div class="row">
		<div class="col-12 mt-4 text-center">
			<h5>{{ __('ui.workWithUs') }}</h5>
			<p>{{ __('ui.clickBelow') }}</p>
			<div class="divBtn">
				<a href="{{ route('workWithUs') }}" class="btn btn-primary">{{ __('ui.ask') }}</a>
			</div>
		</div>
	</div>
</div> --}}