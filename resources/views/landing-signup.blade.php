<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/fave.svg')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/index2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/signup.css')}}">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>ArtFeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head> 
  <body>
    <div class="outerLogin">
      <div class="outerForm">
        <div class="form login">
          
          <header>{{__('mycustom.createAnAccount')}}</header>
          <h3>{{__('mycustom.beTheSpark')}} ARTFEAT</h3>
          <div class="media-options">
            <a href="#" class="field facebook">
              <span><img src="{{asset('assets/img/Google.svg')}}" /></span>
              <span>{{__('mycustom.continueWithGoogle')}}</span>
            </a>
          </div>
          <div class="media-options">
            <a href="#" class="field google">
              <span><img src="{{asset('assets/img/Apple.svg')}}" /></span>
              <span>{{__('mycustom.signInWithApple')}}</span>
            </a>
          </div>
          <div class="line"></div>
          <div class="form-content">
            <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
            <div class="col-md-6">
            <div class="field input-field">
                <input id="name" type="text" placeholder="{{__('mycustom.name')}}" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            </div>





              
              <div class="col-md-6">
              <div class="field input-field">
                <input id="email" type="email" placeholder="{{__('mycustom.email')}}" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
              </div></div>

            <div class="row">
            <div class="col-md-6">
              <div class="field input-field">
                <input
                id="password"
                  type="password"
                  placeholder="{{__('mycustom.password')}}"
                  class="password-input @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password"
                />
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
              </div></div>

              <div class="col-md-6">
              <div class="field input-field">
                <input
                id="password-confirm"
                  type="password"
                  placeholder="{{__('mycustom.confirmPassword')}}"
                  class="password-input2"
                  name="password_confirmation" required autocomplete="new-password"
                />
                <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                <i class="bx bx-hide eye-icon"></i>
              </div>
            </div></div>
              <div class="field button-field">
                <a>{{__('mycustom.forgotPassword')}}</a>
                <button>{{__('mycustom.signup')}}</button>
              </div>
            </form>

            <div class="artist">
            <span
              >{{__('mycustom.areYouAnArtist')}}<a href="{{route('artists.signup')}}"><button>{{__('mycustom.letsGetYouStarted')}}</button></span
            > </a>
          </div>

            <div class="form-link">
              <span
                >{{__('mycustom.alreadyHaveAccount')}}
                <a href="/landing/login" class="link login-link">{{__('mycustom.login')}}</a></span
              >
            </div>
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
