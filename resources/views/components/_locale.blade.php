<form class="d-inline" action="{{route('setLocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class=" btnBnd bandiere">    
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="32" height="32"/> 
        <span class="lingue">{{$lang}}</span>
    </button>
</form>