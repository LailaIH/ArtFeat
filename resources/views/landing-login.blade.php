<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/fave.svg')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/index2.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/login.css')}}">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>ArtFeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head> 
  <body>
    <div class="outerLogin">
      <div class="outerForm">
        <div class="form login">
          <header>Sign in</header>
          <h3>Stay updated on the artistic world</h3>
          <div class="form-content">
            <form action="{{route('login')}}" method="POST">
            @csrf
              <div class="field input-field">
                <input id="email" type="email" placeholder="Email" class="input @error('email') is-invalid @enderror" 
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
                  placeholder="password"
                  class="password-input @error('password') is-invalid @enderror"
                  id="password"
                  name="password" required autocomplete="current-password"

                />
                @error('password')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                     </span>
                @enderror
                <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
              </div>
              <div class="field button-field">
                <a>Forgot password?</a>
                <button>Sign in</button>
              </div>
            </form>
          </div>
          <div class="line"></div>
          <div class="media-options">
            <a href="#" class="field facebook">
              <span><img src="{{asset('assets/img/Google.svg')}}" /></span>
              <span>Continue with Google</span>
            </a>
          </div>
          <div class="media-options">
            <a href="#" class="field google">
              <span><img src="{{asset('assets/img/Apple.svg')}}" /></span>
              <span>Sign in with Apple</span>
            </a>
          </div>
          <div class="form-link">
            <span
              >New to ArtFeat?
              <a href="/landing/signup" class="link login-link">Join now</a></span
            >
          </div>
          <div class="artist">
            <span
              >Are you an Artist?<a href="{{route('artists.signup')}}"><button>Let’s get you started</button></span
            > </a>

          </div>
        </div>
      </div>
      <div class="outerBackground">
        <div class="overLay"></div>
        <img src="{{asset('assets/img/signupArtdeat.svg')}}" />
      </div>
    </div>
  </body>
  <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"
></script>
<script src="{{asset('js/script.js')}}"></script>
</html>

