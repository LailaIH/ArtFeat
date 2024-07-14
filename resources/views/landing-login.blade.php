<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8" />
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/assets/img/fave.svg" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/login.css')}}">

    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <title>ArtFeat</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
</head> 
  <body>
    <div class="outerLogin">
      <div class="outerForm">
        <div class="form login">
          <header>{{__('mycustom.signIn')}}</header>
          <h3>{{__('mycustom.stayUpdatedOn')}}</h3>
          <div class="form-content">
            <form action="{{route('login')}}" method="POST">
            @csrf
              <div class="field input-field">
                <input id="email" type="email" placeholder="{{__('mycustom.email')}}" class="input @error('email') is-invalid @enderror" 
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                    </span>
                @enderror



              </div>
              <div class="field input-field">
                <input
                  type="password"
                  placeholder="{{__('mycustom.password')}}"
                  class="password-input @error('password') is-invalid @enderror"
                  id="password"
                  name="password" required autocomplete="current-password"

                />
                @error('password')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                     </span>
                @enderror
                <div class="eye-btn"><i class="fas fa-eye" id="togglePassword"></i></div>
              </div>
              <div class="field button-field">
                <a href="{{ route('password.request') }}">{{__('mycustom.forgotPassword')}}</a>
                <button>{{__('mycustom.signIn')}}</button>
              </div>
            </form>
          </div>
          <div class="line"></div>
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
          <div class="form-link " dir="rtl">
            <span
              >{{__('mycustom.newToArtfeat')}} 
              <a href="/landing/signup" class="link login-link">{{__('mycustom.joinNow')}}</a></span
            >
            
          </div>
          @if(App::getLocale()==='ar')
          <div class="artist" dir="rtl">
          @else
          <div class="artist" dir="ltr">
          @endif
            <span
              >{{__('mycustom.areYouAnArtist')}}<a href="{{route('artists.signup')}}"><button>{{__('mycustom.letsGetYouStarted')}}</button></span
            > </a>

          </div>
        </div>
      </div>
      <div class="outerBackground">
        <div class="overLay"></div>
        <img src="{{asset('assets/img/signupArtdeat.svg')}}" />
      </div>
    </div>
<style>
    .eye-btn {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 16px;
    padding-top: 25px;
}

.eye-btn i {
    font-size: 18px;
}
    </style>
  </body>
  <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"
></script>
<script src="{{asset('js/script.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');

  togglePassword.addEventListener('click', function () {
    // Toggle the type attribute
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Toggle the eye icon
   
    this.classList.toggle('fa-eye-slash');
  });
});
</script>

</html>

