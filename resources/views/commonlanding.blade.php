<!DOCTYPE html>
<html lang="">
<head>
    @section('head')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="assets/img/fave.svg">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/index2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>ArtFeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    
    <!-- <link rel="stylesheet" href="{{asset('assets/css/profileMenue.css')}}" /> -->
    @show 
</head>
<body>
<nav>
    <div class="logo">
        <!-- Logo -->
        <a href="/">
            <img src="{{ asset('assets/img/logo.svg') }}">
        </a>
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
        <i class="fa fa-bars"></i>
    </label>
    <ul>
        <!-- Links -->
    <div class="mydiv">
        
        <div class="links">
        
            <li ><a href="#">{{ __('mycustom.gallery')}}</a></li>
            <li ><a href="{{route('discover')}}">{{ __('mycustom.artists')}}</a></li>
            <li ><a href="/who/we/are">{{ __('mycustom.whoWeAre')}}</a></li>
            <li ><a href="#">{{ __('mycustom.imAnArtist')}}</a></li>
        
        </div>
        
        <div class="headerButtons">
            <!-- Login buttons -->
            <div class="innerContent">
            
                @if(!Auth::user())
                    <div style="display: flex; position:relative; left:40px; gap:7px;"> 
                     <li class="nav-item-btn">
                        <div class="signUp">
                        <a href="/landing/signup" style=" text-decoration: none;">
                        
                        <button class="botton" type="submit" onclick="">{{ __('mycustom.signup')}}</button>
                        
                        </a></div></li> 
                        <li class="nav-item-btn">
                        <div class="signUp">
                        <a href="/landing/login" style=" text-decoration: none;">
                        
                        <button class="botton " type="submit" onclick="">{{ __('mycustom.login')}}</button>
                        
                        </a></div></li>
                     </div> 
                
               
                @endif
                

                <div class="line"></div>
                
                <div style="gap:-5px; display:flex;position:relative; right:80px;">
                <li class="nav-item">
                    <button>
                        <img src="{{ asset('assets/img/Heart (1).svg') }}">
                    </button>
                </li>

                @auth 
                    <li class="nav-item">
                        <a href="{{ route('logged_user_cart', ['id' => auth()->user()->id]) }}">
                            <button>
                                <img src="{{ asset('assets/img/Cart.svg') }}">
                            </button>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('non_logged_cart') }}">
                            <button>
                                <img src="{{ asset('assets/img/Cart.svg') }}">
                            </button>
                        </a>
                    </li>
                @endauth
               
                <li class="nav-item">
                <div class="dropdown">
                        <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('mycustom.language')}}
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/languageConverter/en">
                            <img src="{{ asset('vendor/blade-flags/country-us.svg') }}" width="30" height="30"/>
                            {{ __('mycustom.english')}}
                            </a></li>
                            <li><a class="dropdown-item" href="/languageConverter/ar">
                            <img src="{{ asset('vendor/blade-flags/country-sa.svg') }}" width="30" height="30"/>

                            {{ __('mycustom.arabic')}}
                            </a></li>
                            
                        </ul>
                 </div>
                </li>


               

                @auth
                <li class="nav-item">
                <div class="dropdown">
                <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration:none;">
                        {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        @if(auth()->user()->is_artist == 1)
                        

                             <li>
                                <a class="dropdown-item" href="{{ route('artists.profile', ['id' => auth()->user()->id]) }}">
                                <img src="{{ asset('assets/img/Profile.svg') }}" />
                                Profile
                                 
                             </a>
                            </li>
                        @endif
                        @if(auth()->user()->job_title_id!=null && auth()->user()->jobTitle->name=='admin')
                        <li>
                            
                            <a class="dropdown-item" href="/home">
                            <i class="fa-solid fa-user"></i> Admin
                        </a>
                        </li>
                        
                        @endif
                        <li>
                        <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <button class="botton" type="submit" onclick="">
                                    Logout
                                </button>                          
                                   </form></li>
                    </ul>
                </div>
                </li>
                                  
                            
                @endauth
            </div>
        </div>
        <!-- this below extra -->
        </div> 
    </ul>
</nav>










<div class="searchBar">
    <div class="inner">
        <div class="links">
            <a>{{ __('mycustom.paintings')}}</a>
            <a>{{ __('mycustom.photography')}}</a>
            <a>{{ __('mycustom.drawings')}}</a>
            <a>{{ __('mycustom.sculpture')}}</a>
            <a>{{ __('mycustom.digital')}}</a>
            <a>{{ __('mycustom.live')}}</a>
           
        </div>
        
       

        
        <input />        
        
</div>
</div>
          
          
</div>
</div>


@yield('content')


@section('footer')
<!-- FOOTER -->
<div class="outerFooter">
    <div class="innerFooter">
        <div class="content">
            <div class="Logo">
                <div>
                    <img src="{{asset('assets/img/logo.png')}}"/>
                </div>
                <p>{{ __('mycustom.getLatestUpdates')}}</p>
                <div>
                    <div class="custom-input">
                        <input type="text" class="custom-search-input" placeholder="{{ __('mycustom.enterEmail')}}">
                        <button class="input-botton" type="submit" onclick="">{{ __('mycustom.go')}} </button>
                    </div>
                </div>
            </div>
            <div class="innerContent">
                <h2>{{ __('mycustom.about')}}</h2>
                <a>{{ __('mycustom.allArtworks')}}</a>
                <a>{{ __('mycustom.virtualWorld')}}</a>
                <a>{{ __('mycustom.artists')}}</a>
            </div>
            <div class="innerContent">
                <h2>{{ __('mycustom.moreInfo')}}</h2>
                <a>{{ __('mycustom.becomeAPartners')}}</a>
                <a>{{ __('mycustom.faq')}}</a>
                <a>{{ __('mycustom.support')}}</a>
                <a style="text-decoration:none;" href="{{route('privacyPolicy')}}">{{ __('mycustom.privacyPolicy')}}</a>
            </div>
            <div class="followus">
                <h2>{{ __('mycustom.followUs')}}</h2>
                <div class="outer">
                    <a><img src="{{asset('assets/img/Facebook.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/instagram.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/twitch.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/twitter.svg')}}"/></a>
                </div>
            </div>
        </div>
    </div>
    <div class="privacy">
        ©2023 ArtFeat, {{ __('mycustom.rightsReserved')}}
    </div>
</div>
                                                                                                    
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body> 

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('js/script.js')}}"></script>
@show
</html>
