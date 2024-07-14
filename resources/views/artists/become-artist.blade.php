<!DOCTYPE html>
<html lang="" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/fave.svg')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/index2.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/signup.css')}}">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>ArtFeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head> 
  <body>
    <div class="outerLogin">
      <div class="outerForm">
        <div class="form login">
          <header>{{__('mycustom.generalInfo')}}</header>
     
          
          <div class="form-content mt-3">
            <form method="POST" action="{{ route('artists.becomeArtist') }}">
            @csrf
          <div class="row">
          

            <div class="col-12" >
                <input class="form-control" id="store_name" type="text" placeholder="{{__('mycustom.storeName')}}"  name="store_name" value="{{ old('store_name') }}" required autocomplete="store_name" autofocus />
                @error('store_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
          </div>
         <div class="row">
            <div class="col-12">
            <select name="country" id="country" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>{{__('mycustom.selectCountry')}}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>

            </div></div>

            <div class="row">
            <div class="col">
            <select name="city" id="city" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>{{__('mycustom.selectCity')}}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>

            </div></div>

            
            
            
            <label for="registered">{{__('mycustom.isYourBusinessRegistered')}}</label>
            <div class="row ">
            <div class="col"> 
                <input class="form-check-input" type="radio" name="registered" id="yes" value="yes">
                <label class="form-check-label" for="yes">{{__('mycustom.yes')}}</label>
            </div>
            <div class="col"> 
                <input class="form-check-input" type="radio" name="registered" id="no" value="no">
                <label class="form-check-label" for="no">{{__('mycustom.no')}}</label>
            </div>
            </div>


            
            





            
          
              <div class="field button-field">
               
                <button>{{__('mycustom.submit')}}</button>
              </div>
            </form>

         
          </div>
        </div>
      </div>
      <div class="outerBackground">
        <div class="overLay"></div>
        <img src="{{asset('assets/img/signinArt.svg')}}" />
      </div>
    </div>
  </body>
</html>
<script src="{{asset('js/script.js')}}"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"
></script>
