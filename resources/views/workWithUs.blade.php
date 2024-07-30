<x-layout>
  

  <div class="container-fluid text-center createDiv d-md-none">
    <div class="row justify-content-center align-items-center  rowHome">
        <div class="col-12 col-md-6">
            <img src="\image\PrestoCreate.png" class="logoImg w-75" alt="">
            <h1 class="display-4 bgText">{{ __('ui.workWithUs') }}</h1>
        </div>
    </div>
</div>

  
<div class="container-fluid text-center h1Create ">
  <div class="row justify-content-center d-flex justify-content-center">
      <div class="col-12 col-md-3 bg-image me-5 d-none d-md-block">
          <div class="textDiv h-100 d-flex align-items-center d-flex flex-column">
              <div class="logo h-100 align-content-center">
                  <img src="\image\PrestoCreate.png" class="logoImg w-100" alt="">
                 
                  <h4 class="bgText align-content-start text-start d-flex align-items-center fw-bold ">{{ __('ui.workWithUs') }}</h4>
              
                </div>
          {{-- <h1 class="display-4 h1Create">{{ __('ui.insert') }}</h1> --}}
          </div>
      </div>
  

  <div class="col-12 col-md-4 formDiv mb-3 text-start">
        
        
        @if (session()->has('message'))
        <div class="row justify-content-center mt-4">
          <div class="col-12 alert message text-center shadow rounded w-50">
            {{ session('message') }}
          </div>
        </div>
        @endif
        

        <form method="POST" 
        action="{{route('become.revisor')}}"
         class="form formRevisor align-items-center d-flex justify-content-center"
         >
          @csrf
          
          <div class="mb-3 justify-content-start w-75">
            <label for="email" class="form-label ">Email</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
            @error('email')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                @enderror
          </div>

          <div class="mb-3 justify-content-start w-75">
            <label for="name" class="form-label">{{ __('ui.nameSur') }}</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" >
            @error('name')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                @enderror
          </div>

          <div class="text-center mt-3 textRevisor">
            <h5>
              {{ __('ui.becomeRev') }}
            </h5>
            <button type="submit" class="btn mt-3">{{ __('ui.sendEmail') }}</button>
          </div>
          {{-- <div class="mb-3">
            <label for="body" class="form-label">{{ __('ui.insertReq') }}</label>
            <textarea name="body" class="form-control bodyForm" placeholder="{{ __('ui.insQuest') }}" id="body"></textarea>
          </div> --}}
        </form>
        
      </div>
    </div>
  </div>

    
  </x-layout>