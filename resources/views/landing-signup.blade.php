<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/fave.svg')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/signup.css')}}">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>ArtFeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head> 
  <body>
    <div class="outerLogin">
      <div class="outerForm">
        <div class="form signup">
          <header>Create Account</header>
          <h3>Be the spark of the artistry of ARTFEAT</h3>
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
          <div class="line"></div>
          <div class="form-content">
            <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field input-field">
                <input id="name" type="text" placeholder="Name" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>







              <div class="field input-field">
                <input id="email" type="email" placeholder="Email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
              <div class="field input-field">
                <input
                id="password"
                  type="password"
                  placeholder="password"
                  class="password-input @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password"
                />
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
              </div>
              <div class="field input-field">
                <input
                id="password-confirm"
                  type="password"
                  placeholder="Confirm password"
                  class="password-input2"
                  name="password_confirmation" required autocomplete="new-password"
                />
                <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                <i class="bx bx-hide eye-icon"></i>
              </div>
              <div class="field button-field">
                <a>Forgot password?</a>
                <button>Signup</button>
              </div>
            </form>

            <div class="form-link">
              <span
                >Already have an account?
                <a href="#" class="link login-link">Login</a></span
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
