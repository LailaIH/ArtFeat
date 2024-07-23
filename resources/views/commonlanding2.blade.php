<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
   @section('head')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="Images/fave.svg">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>ArtFeat</title>
     
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-G3Qhqv7+WToW/jt/2AxKj+J7OqGezxrnmX+0Ov+2h3e3R0Z7gXikVeFdi7jcEj72" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   @show 
</head>
<body>
          <!-- Funds Modal -->
<div class="modal fade" id="exampleModa" tabindex="-1" aria-labelledby="exampleModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabe">{{__('mycustom.enterFundsAmount')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('fundsCheckout')}}">
        @csrf
       
        {{__('mycustom.fund')}}
        <input class="form-control"  name="funds"/>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('mycustom.save')}}</button>
</form>
      </div>
    </div>
  </div>
</div>
<!-- end funds modal -->


<style>
        .modal-header {
            position: relative;
        }

        .modal-header .btn-close {
            position: absolute;
            right: 10px; /* Default for LTR */
        }

        /* Adjust for RTL */
        [dir="rtl"] .modal-header .btn-close {
            right: auto;
            left: 10px; /* Move to left */
        }
    </style>
  <nav>
    <div class="logo"> 
      <!------- Logo ------->
      <a href="/">
       <img src="/assets/img/logo.png">  </a>
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
    <i class="fa fa-bars"></i>
    </label>
<ul>
      <!------- Links ------->
    <div class="links">
      <li ><a href="{{route('allSections')}}">{{ __('mycustom.gallery')}}</a></li>
            <li ><a href="{{route('discover')}}">{{ __('mycustom.artists')}}</a></li>
            <li ><a href="/who/we/are">{{ __('mycustom.whoWeAre')}}</a></li>
            <li ><a href="/support">{{ __('mycustom.supportArtist')}}</a></li>

           
            @auth
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModa">{{__('mycustom.addFund')}}</a></li>
            @else
            <li><a href="/landing/login">{{__('mycustom.addFund')}}</a></li>
            @endauth

            <li><a href="/landing/auctions">{{__('mycustom.auctions')}}</a></li>
            <li><a href="#">{{__('mycustom.donate')}}</a></li>
            <li><a href="{{route('allArtworks')}}">{{ __('mycustom.allArtworks')}}</a></li>




    </div>
      <div class="headerButtons">
     
       <div class="transS">
          <div class="signUp">
          @if(!Auth::user())
            <div class="login">
              <form method="get" action="/landing/login" >
              @csrf
              <button class="botton" type="submit">
                                {{ __('mycustom.login')}}

                                
              </button> 
              </form>           
            </div>
            <div class="signup">
            <form method="get" action="/landing/signup" >
                    @csrf
              <button class="botton" type="submit">
                          {{ __('mycustom.signup')}}

              </button>     
             </form> 
               </div>

         
           
               @else
               <div style="opacity: 0; pointer-events: none;"  class="login ">
                    <button class="botton"></button>
                </div>
                
      
               @endif
               </div>
            </div>
       



        <div class="innerContent">
          <div class="line"></div>
          
          <button id="favbutton" type="submit">
            <style>
              .hoverE:hover{
                background-color: aqua;
                border-radius: 30px;
                padding: 5px;
                transition: ease-out 50ms;
              }
            </style>
            <img src="/assets/img/Heart (1).svg" class="hoverE" />
          </button>

         

 @auth

     @if(auth()->user()->is_artist == 1)
        
         <button id="artist-profile" type="submit">
            <img src="/assets/img/Profile.svg" class="hoverE"/>
          </button>
                <!-- artist profile -->
        <form id="artist-profile-form" method="get" action="{{ route('artists.profile', ['id' => auth()->user()->id]) }}" style="display: none;">
        @csrf
        </form>

        @else
        <button id="user-profile" type="submit">
            <img src="/assets/img/Profile.svg" class="hoverE"/>
          </button>
              <!-- user profile -->
          <form id="user-profile-form" method="get" action="{{ route('userProfile') }}" style="display: none;">
          @csrf
          </form>
       
        @endif


          <button id="logged-cart">
            <img src="/assets/img/Cart.svg" class="hoverE"/>
          </button>

                    <!-- logged user cart  -->
            <form id="logged-cart-form" method="get" action="{{route('logged_user_cart', ['id' => auth()->user()->id])}}" style="display: none;">
            @csrf
            </form>
       

    @else
       
          <button id="non-logged-cart" type="submit">
            <img src="/assets/img/Cart.svg" class="hoverE"/>
          </button>
       

    @endauth


          <!-- Language Select -->
          <div class="nav-item dropdown {{auth()->user()? 'mt-3' : 'mt-2'}}">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <span><i class="fa-solid fa-language"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0" data-bs-popper="none">
                <div class="dropdown-item">
                    <img src="/assets/img/united-states-of-america-flag-icon-32.png"> 
                    <a href="/languageConverter/en" style="text-decoration: none;" class="m-1">{{ __('mycustom.english')}}</a>
                </div>  
                <div class="dropdown-item">
                    <img src="/assets/img/saudi-arabia-flag-icon-32.png"> 
                    <a href="/languageConverter/ar" style="text-decoration: none;" class="m-1">{{ __('mycustom.arabic')}}</a>
                </div> 
            </div>
        </div>
        
  @auth
        <div  class="nav-item dropdown m-2">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="rounded-circle me-lg-2" src=" {{ isset (Auth::user()->img) ? asset('userImages/'.Auth::user()->img) : '/assets/img/artist.png' }}" alt="" style="width: 40px; height: 40px;">
          </a>
          <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0" data-bs-popper="none">
             @if(auth()->user()->is_artist == 1)
               <div class="dropdown-item">
                  <i class="fa-solid fa-user"></i>
                  <a href="{{ route('artists.profile', ['id' => auth()->user()->id]) }}" style="text-decoration: none;" class="m-1">{{ __('mycustom.profile')}}</a>
                </div>

                @else
                <div class="dropdown-item">
                  <i class="fa-solid fa-user"></i>
                  <a href="{{ route('userProfile') }}" style="text-decoration: none;" class="m-1">{{ __('mycustom.profile')}}</a>
                </div>
                
                
                @endif 

            @if(auth()->user()->job_title_id!=null && auth()->user()->jobTitle->name=='admin')
  
              <div class="dropdown-item">
              <i class="fa-solid fa-lock"></i>
                  <a href="/home" style="text-decoration: none;" class="m-1">{{ __('mycustom.admin')}}</a>
              </div> @endif 

         


              <div class="dropdown-item"> 
                <i class="fa-solid fa-right-from-bracket"></i> 
                <a href="#" id="logout-link" style="text-decoration: none;" class="m-1">{{ __('mycustom.logout') }}</a>

                </a>
              </div> 

            </div>
            <style>
            </style>
        </div>
      @endauth
          <!--  -->
        </div>
      </div>
    </ul>
  </nav>
 <div class="searchBar">
  <div class="inner">
   <div class="links">
   @php 
            $sections = App\Models\Section::where('is_online',1)->take(5)->get();
            @endphp
            @foreach($sections as $section)
            <a style="text-decoration: none;" href="{{route('singleSection',$section->id)}}">{{$section->name}}</a>
            @endforeach
     <a style="text-decoration: none;" href="/landing/events">Events</a>
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
             <img src="/assets/img/logo.png"/>
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
                <a style="text-decoration:none;" href="{{route('allArtworks')}}">{{ __('mycustom.allArtworks')}}</a>
                
                <a style="text-decoration:none;" href="{{route('discover')}}">{{ __('mycustom.artists')}}</a>
                <a style="text-decoration:none;" href="/landing/auctions">{{ __('mycustom.auctions')}}</a>

              </div>
              <div class="innerContent">
                <h2>{{ __('mycustom.moreInfo')}}</h2>
                
               <a>{{ __('mycustom.donate')}}</a>
                <a style="text-decoration:none;" href="{{route('showTickets')}}">{{ __('mycustom.support')}}</a>
                <a style="text-decoration:none;" href="{{route('privacyPolicy')}}">{{ __('mycustom.privacyPolicy')}}</a>
                <a style="text-decoration:none;" href="/terms/conditions">{{ __('mycustom.termsAndConditions')}}</a>

              </div>
              <div class="followus">
                <h2>{{ __('mycustom.followUs')}}</h2>
                <div class="outer">
                    <a><img src="{{asset('assets/img/Facebook.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/instagram.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/twitch.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/twitter.svg')}}"/></a>
              </div>
              <button id="supportArtist" style="padding: 15px; margin-top: 40px; border:none; border-radius: 10px;color: aliceblue; background-color: rgb(0, 191, 255);">{{ __('mycustom.supportArtist')}}</button>
              </div>
           </div>
        </div>
        <div class="privacy">
         ©2023 ArtFeat, {{ __('mycustom.rightsReserved')}}
        </div>
    </div>

    @show 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 </body>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="/assets/js/script.js"></script>


 <!-- log out form -->
 <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form>  

<!-- non logged user cart -->
<form id="non-logged-cart-form" method="get" action="{{ route('non_logged_cart') }}" style="display: none;">
@csrf
</form>

<!-- fav products form -->
<form  id="favform" method="get" action="{{route('myFav')}}">
@csrf
</form>


<!-- JavaScript to submit the logout form -->
<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>


<!-- JavaScript to submit the favorite form -->
<script>
    document.getElementById('favbutton').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('favform').submit();
    });
</script>

<script>
    document.getElementById('supportArtist').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = '/support';
    });
</script>

<!-- JavaScript to submit non logged user cart form -->
<script>
    document.getElementById('non-logged-cart').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('non-logged-cart-form').submit();
    });
</script>

<!-- JavaScript to submit logged user cart form -->
<script>
    document.getElementById('logged-cart').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logged-cart-form').submit();
    });
</script>

<!-- JavaScript to submit artist profile form -->
<script>
    document.getElementById('artist-profile').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('artist-profile-form').submit();
    });
</script>

<!-- JavaScript to submit user profile form -->
<script>
    document.getElementById('user-profile').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('user-profile-form').submit();
    });
</script>

 </html>