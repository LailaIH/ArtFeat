<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Forgot Password - SB Admin Pro</title>
        <link href="{{asset('css/styles3.css')}}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                                <!-- Social forgot password form-->
                                <div class="card my-5">

                                    <div class="card-body p-5 text-center"><div class="h3 fw-light mb-0">Reset Password</div></div>
                                                                    @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif
                                    <hr class="my-0" />
                                    <div class="card-body p-5">
                                        <div class="text-center small text-muted mb-4">Enter your email address below and we will send you a link to reset your password.</div>
                                        <!-- Forgot password form-->
                                        <form method="POST" action="{{ route('password.update') }}">
                                        @csrf       
                                        <input type="hidden" name="token" value="{{ $token }}">
                                 
                                            <div class="mb-3">
                                                <label class="text-gray-600 small" for="email">Email address</label>
                                                <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email" type="email"  aria-label="Email Address"
                                                 aria-describedby="emailExample" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />
                                                 @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                           
                                           
                                                </div>
                                          <div class="mb-3">
                                                <label class="text-gray-600 small" for="password">Password</label>
                                                        <input id="password" type="password" class=" form-control form-control-solid @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"   />
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                          </div>

                                          <div class="mb-3">
                                          <label class="text-gray-600 small" for="password-confirm">Confirm Password</label>

                                          <input id="password-confirm" type="password" class="form-control form-control-solid" name="password_confirmation" required autocomplete="new-password">


                                          </div>
                                            <button type="submit" class="btn btn-primary">
                                                Reset Password 
                                            </button>                                     
                               </form>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body px-5 py-4">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                            <div class="col-md-6 text-md-end small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


