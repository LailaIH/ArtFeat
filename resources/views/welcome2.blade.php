@extends('commonlanding2')
@section('content')


<script>
    // JavaScript to handle hover and modal show/hide
    $(document).ready(function () {
  
    $(".card").hover(
        function () {
            $('.modal').modal({
                show: true
            });
        },
        function () {
            $('.modal').modal('hide');
        });
});


</script>




<div class="liveStream">
  <div class="innerLive">
    <p>{{ __('mycustom.live')}}</p>
    <img src="/assets/img/livestream.svg" alt="">
  </div>
 </div>


 <div class="supportArtist">
  <div class="innerLive">
  <a href="{{route('support')}}" style="text-decoration: none;">
    <p>{{ __('mycustom.supportArtist')}}</p>
    <img src="/assets/img/Heart (1).svg" alt="" width="5px" height="5px">
  </a>
</div>
</div>



<div id="carouselExampleIndicators" class="Discover carousel slide " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="innerItems">
      <div class="card-body">
      @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif 

                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
        <img src="/assets/img/kofia.svg" />
        <div class="title">
        @if(isset($slideTitles[0]))
            <h1 class="card-title">{{$slideTitles[0]->value}}</h1>@endif
          </div>
           @if(isset($slideBodies[0]))
          <p class="card-text">{{$slideBodies[0]->value}}</p>@endif        @guest
        <form method="get" action="/landing/signup">
          @csrf
        <button type="submit"><span>{{ __('mycustom.discover')}}</span></button></form>@endguest
      </div>
      @if(isset($slidePictures[0]->img))
      <img src="{{asset('optionImages/'.$slidePictures[0]->img)}}" height="372" width="390"/>
      @else 
      <img src="/assets/img/discover2.png"/>
      @endif
    </div>
  </div>
    <div class="carousel-item">
      <div class="innerItems">
        <div class="card-body">
          <img src="/assets/img/kofia.svg" />
          <div class="title">
          @if(isset($slideTitles[1]))
            <h1 class="card-title">{{$slideTitles[1]->value}}</h1>@endif
          </div>
           @if(isset($slideBodies[1]))
          <p class="card-text">{{$slideBodies[1]->value}}</p>@endif          @guest
          <form method="get" action="/landing/signup">
          @csrf
          <button type="submit"><span>{{ __('mycustom.discover')}}</span></button></form>@endguest
        </div>
        @if(isset($slidePictures[1]->img))
        <img src="{{asset('optionImages/'.$slidePictures[1]->img)}}" height="372" width="390"/>
        @else
        <img src="/assets/img/discover.png"/>@endif
      </div>
    </div>
    <div class="carousel-item">
      <div class="innerItems">
        <div class="card-body">
          <img src="/assets/img/kofia.svg" />
          <div class="title">
        
           @if(isset($slideTitles[2]))
            <h1 class="card-title">{{$slideTitles[2]->value}}</h1>@endif
          </div>
           @if(isset($slideBodies[2]))
          <p id="slideBody" class="card-text">{{$slideBodies[2]->value}}</p>@endif
          @guest
          <form method="get" action="/landing/signup">
          @csrf
          <button type="submit"><span>{{ __('mycustom.discover')}}</span></button></form>@endguest
        </div>
        @if(isset($slidePictures[2]->img))
        <img src="{{asset('optionImages/'.$slidePictures[2]->img)}}" height="372" width="390"/>
        @else
        <img src="/assets/img/discover3.png"/>@endif
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  


  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
          <h2 class="text-uppercase eventText ">{{__('mycustom.upcomingEvents')}}</h2>
    
          <style>
            .eventText{
              text-align: left;
               position: relative;
                left: -380px;
            }
            html[dir="rtl"] .eventText {
              text-align: right;
               position: relative;
                right: -380px;
                }
          </style>
    
        </div>
      <div class="row g-5">

      @for($i=0;$i<4;$i++)
        @if(isset($events[$i]))

          <div id="single-event-{{$events[$i]->id}}" class="Event-cardh col-lg-3 col-md-6 wow fadeInUp m event-card" data-id="{{ $events[$i]->id }}" data-wow-delay="0.5s">
              <div class="Event-cardh{{$i+1}} service-item position-relative overflow-hidden d-flex h-100 p-5 ps-0" style=" background-image:url('/eventsImages/{{$events[$i]->img}}');">
                  <div class="serv-icon d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                      <i class="fa-regular fa-font-awesome"></i>
                  </div>
                  <div class="ps-4" style="position: relative; right: 17px;">
                      <h3 class="text-uppercase mb-3">{{$events[$i]->title}}</h3>
                      <strong><p>
                        @php
                        $words = explode(' ', $events[$i]->description);
                       $eventDes = implode(' ', array_slice($words, 0, 14)).'...';
                         @endphp
                        {{$eventDes}}
                      </p>
                    </strong>
                      <span class="text-uppercase text-primary" style="background-color: rgba(240, 248, 255, 0.547);">{{isset($events[$i]->starts_at)? $events[$i]->starts_at:'unknown date'}}</span>
                  </div>
                  <a class="serv-icon btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a>
              </div>
          </div>
        @else
        <div class="Event-cardh col-lg-3 col-md-6 wow fadeInUp m" data-wow-delay="0.5s">
              <div class="Event-cardh{{$i+1}} service-item position-relative overflow-hidden d-flex h-100 p-5 ps-0" style=" background-image:url('/assets/img/a4.png');">
                  <div class="serv-icon d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                      <i class="fa-regular fa-font-awesome"></i>
                  </div>
                  <div class="ps-4" style="position: relative; right: 17px;">
                      <h3 class="text-uppercase mb-3">Event</h3>
                      <strong><p>Coming Soon</p></strong>
                      <span class="text-uppercase text-primary" style="background-color: rgba(240, 248, 255, 0.547);">unknown date</span>
                  </div>
                  <a class="serv-icon btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a>
              </div>
          </div>
        @endif
     @endfor  
       
   
      </div>
  </div>
    <style>
       
       h3{
        color: black;
       }
       
       .Event-cardh1 {
    position: relative; /* Ensure the pseudo-element is positioned relative to this div */
    overflow: hidden; /* Prevent the pseudo-element from overflowing */
    background-color: rgba(0, 0, 0, 0.986);
    background-size: cover; /* Adjust to cover the entire div */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
}

.Event-cardh1::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(43, 42, 42, 0.178); /* Add a semi-transparent overlay */
    z-index: 1; /* Ensure the overlay is behind the content */
}

.Event-cardh1 .service-item {
    position: relative; /* Ensure the content is positioned relative to the parent */
    z-index: 2; /* Ensure the content is above the overlay */
    background: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the content */
    border-radius: 8px; /* Optional: Add border radius for rounded corners */
    padding: 20px; /* Optional: Adjust padding */
    width: 100%; /* Ensure it covers the full width of the parent */
}
       .Event-cardh2 {
    position: relative; /* Ensure the pseudo-element is positioned relative to this div */
    overflow: hidden; /* Prevent the pseudo-element from overflowing */
    background-color: rgba(0, 0, 0, 0.986);
    background-size: cover; /* Adjust to cover the entire div */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
}

.Event-cardh2::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(43, 42, 42, 0.178); /* Add a semi-transparent overlay */
    z-index: 1; /* Ensure the overlay is behind the content */
}

.Event-cardh2 .service-item {
    position: relative; /* Ensure the content is positioned relative to the parent */
    z-index: 2; /* Ensure the content is above the overlay */
    background: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the content */
    border-radius: 8px; /* Optional: Add border radius for rounded corners */
    padding: 20px; /* Optional: Adjust padding */
    width: 100%; /* Ensure it covers the full width of the parent */
}
       .Event-cardh3 {
    position: relative; /* Ensure the pseudo-element is positioned relative to this div */
    overflow: hidden; /* Prevent the pseudo-element from overflowing */
    background-color: rgba(0, 0, 0, 0.986);
    background-size: cover; /* Adjust to cover the entire div */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
}

.Event-cardh3::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(43, 42, 42, 0.178); /* Add a semi-transparent overlay */
    z-index: 1; /* Ensure the overlay is behind the content */
}

.Event-cardh3 .service-item {
    position: relative; /* Ensure the content is positioned relative to the parent */
    z-index: 2; /* Ensure the content is above the overlay */
    background: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the content */
    border-radius: 8px; /* Optional: Add border radius for rounded corners */
    padding: 20px; /* Optional: Adjust padding */
    width: 100%; /* Ensure it covers the full width of the parent */
}
       .Event-cardh4 {
    position: relative; /* Ensure the pseudo-element is positioned relative to this div */
    overflow: hidden; /* Prevent the pseudo-element from overflowing */
    background-color: rgba(0, 0, 0, 0.986);
    background-size: cover; /* Adjust to cover the entire div */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
}

.Event-cardh4::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(43, 42, 42, 0.178); /* Add a semi-transparent overlay */
    z-index: 1; /* Ensure the overlay is behind the content */
}

.Event-cardh4 .service-item {
    position: relative; /* Ensure the content is positioned relative to the parent */
    z-index: 2; /* Ensure the content is above the overlay */
    background: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the content */
    border-radius: 8px; /* Optional: Add border radius for rounded corners */
    padding: 20px; /* Optional: Adjust padding */
    width: 100%; /* Ensure it covers the full width of the parent */
}


 
       .Event-cardh:hover{
        cursor: pointer;
       }
      .service-item{
       color: rgb(0, 111, 180);
       background-color:rgba(13, 169, 235, 0.186);
       border: rgb(0, 0, 0) dashed;
      }
      .serv-icon{
        background-color: rgba(0, 0, 0, 0.175);
      }
      .service-item .btn {
    position: absolute;
    right: -50px;
    bottom: -50px;
    width: 50px;
    height: 50px;
    background: rgba(0, 0, 0, 0.312);
    opacity: 0;
    border-radius: 0;
}

.service-item p{
  background-color: rgba(255, 255, 255, 0.452);
  padding: 4px;
}

.service-item:hover .btn {
    right: 0;
    bottom: 0;
    opacity: 1;
}

    </style>

<div class="footerButtonEvents">
        <form method="get" action="{{route('events')}}">
        @csrf
             <button type="submit">{{ __('mycustom.viewAll')}}</button>
        </form>
    </div>
   
</div>

   <!-- Categories -->
   <section class="CategoriesSection" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <h1 class="categoriesText">{{ __('mycustom.shopByCategory')}}</h1>

    <style>
      .categoriesText{
      position: relative; left: -560px;
      }

      html[dir="rtl"] .categoriesText {
        position: relative; right: -560px;
      }
    </style>


   <div class="Categories">
   <style>
        .image-container {
            position: relative;
            display: inline-block;
            width: 100%; /* Adjust as needed */
            max-width: 600px; /* Adjust as needed */
        }
        .image-container img {
            width: 100%;
            height: auto;
            display: block;
        }
        .image-container .Content {
            position: absolute;
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Center the element */
            color: white;
            background: rgba(0, 0, 0, 0.6); /* Background color with transparency */
            padding: 10px; /* Adjust as needed */
            border-radius: 20px; /* Optional: for rounded corners */
            font-size: 16.5px !important; /* Adjust as needed */
            text-align: center; /* Center the text */
        }
    </style>
@for($i=0;$i<4;$i++)
  @if(isset($sections[$i]))     
    <div class="card" data-bs-toggle="modal" data-bs-target="#sectionModal{{ $sections[$i]->id }}">
      <div class="overlay">
        @if($sections[$i]->img)
        <div class="image-container">
          <img src="{{ asset('sectionImages/' . $sections[$i]->img) }}" alt="section pic"/>
          <p class="Content text-white">{{ $sections[$i]->name }}</p>
        </div>
        @else
        <div class="image-container">
          <img src="{{asset('\assets\img\sculptures.jpg')}}" alt="artist pic"/>
          <p class="Content text-white">{{ $sections[$i]->name }}</p>
          </div>
          @endif
       <div class="OverLay2">
         <p class="Content">{{$sections[$i]->name}}</p>
         </div>
      </div>
      </div>
 <!-- Modal -->
 <div class="modal fade" id="sectionModal{{ $sections[$i]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{$sections[$i]->id}}" aria-hidden="true">
                            <style>
                        .image-container {
                            width: 100%; /* Ensures the container takes full width */
                            max-width: 300px; /* Set a fixed max-width for consistency */
                            height: auto;
                        }

                        .section-img {
                            width: 100%;
                            height: auto;
                            object-fit: cover; /* Ensures the image covers the container while maintaining aspect ratio */
                            display: block; /* Removes any inline-block space */
                            border-radius: 5px; /* Optional: Add some rounding to the corners */
                        }
                        .text-container {
                                text-align: left;
                            }

                            /* If the document is RTL, align text to the right */
                            html[dir="rtl"] .text-container {
                                text-align: right;
                            }
                                .text-container label {
                                    font-weight: bold; /* Makes the labels bold for better distinction */
                                }

                                .text-container div {
                                    margin-bottom: 10px; /* Adds some space between each text block */
                                }

                            </style>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('mycustom.sectionInfo')}}</h1>
            </div>
            <div class="modal-body">
               <div class="row">

                <div class="col mb-3">
                    <div class="image-container">
                    <img src="{{ asset('sectionImages/' . $sections[$i]->img) }}" class="section-img" />
                    </div>
                </div>
                <div class="col mt-4 text-container text-align-dynamic">
                    <div>
                        <label for="recipient-name">{{__('mycustom.name')}}:</label>
                       {{$sections[$i]->name}}
                       
                    </div>
                    <div>
                        <label for="message-text">{{__('mycustom.description')}}:</label>
                        @php
                        $words = explode(' ', $sections[$i]->description);
                       $sectionDes = implode(' ', array_slice($words, 0, 14)).'...';
                         @endphp
                        {{$sectionDes}}
                    </div>
                </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
                <a href="{{route('singleSection',$sections[$i]->id)}}" style="text-decoration: none;" class="btn btn-primary">{{__('mycustom.seeDetails')}}</a>

            </div>
        </div>
    </div>
</div>





        @else
            <div class="card" >
                  <div class="overlay">
                  
                   
                    <div class="image-container">
                      <img src="\assets\img\a3.png" alt="artist pic"/>
                      <p class="Content text-white">{{__('mycustom.section')}}</p>
                      </div>
                    
                  <div class="OverLay2">
                    <p class="Content">{{__('mycustom.section')}}</p>
                    </div>
                  </div>
                  </div>
      @endif


@endfor  
   
  </div>
  <div class="footerButton">
     <form method="get" action="{{route('allSections')}}">
     @csrf
       <button>{{ __('mycustom.viewAll')}}</button>
     </form>
  </div>
</section>


   <!-- painting -->

   <section class="paintingSection">
    <div class="outer">
        <div class="row">
         
            <div class="col-6">
                <h3 class="mb-3 paintingsText">{{ __('mycustom.lastPaintings')}}</h3>
           
    
           
           
              </div>
            <div class="col-12 ">
              <div class="buttonss">
              <a class="btn btn-primary" href="#carouselExampleIndicators2" role="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="{{app()->getLocale()==='en'?'prev':'next'}}">
                    <i class="fa fa-arrow-{{app()->getLocale()==='en'?'left':'right'}}"></i>
                </a>
                <a class="btn btn-primary " href="#carouselExampleIndicators2" role="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="{{app()->getLocale()==='en'?'next':'prev'}}">
                    <i class="fa fa-arrow-{{app()->getLocale()==='en'?'right':'left'}}"></i>
                </a>
            </div>
                <div id="carouselExampleIndicators2" class="carousel slide hhh" data-bs-ride="carousel">
                    <div class="carousel-inner theInerGLTA">
                    @php
                       $chunkedProducts = $products->chunk(4); // Split products into chunks of 4

                    @endphp
                    @foreach ($chunkedProducts as $key => $chunk)



                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <div class="row">
                       @foreach ($chunk as $product)
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="{{ asset('productImages/'.$product->img) }}" alt="product pic" width="239" height="136"/>
                                </div>
                                <div class="info">
                                    @php
                                        $ownerArtist = DB::table('users')->where('id',$product->artist_id)->first();
                                    @endphp
                                   <h2>{{$product->name}}</h2>

                                  <p><span>{{ __('mycustom.by')}} </span>{{$ownerArtist->name}}</p>
                                </div>
                                <div class="footerBtn">
                                           @auth
                                            <form method="post" action="{{route('logged_add_to_cart',['id'=>$product['id']])}}" >
                                            @csrf
                                            
                                            <button type="submit">{{ __('mycustom.addToCart')}}</button></form>

                                            @else
                                            <form method="post" action="{{route('non_logged_add_to_cart',['id'=>$product['id']])}}" >
                                            @csrf
                                           
                                            <button>{{ __('mycustom.addToCart')}}</button></form>
                                            @endauth
                                </div>
                              </div>
                            </div>
                            @endforeach
                            
                          
                           
                          </div>
                       </div>

                    @endforeach


                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <!-- Seller -->
   <!-- <section class="SellerSection">
    <div class="outer">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">{{ __('mycustom.bestSeller')}}</h3>
            </div>
            <div class="buttonss">
            <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators3" role="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="{{app()->getLocale()==='en'?'prev':'next'}}">
                    <i class="fa fa-arrow-{{app()->getLocale()==='en'?'left':'right'}}"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators3" role="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="{{app()->getLocale()==='en'?'next':'prev'}}">
                    <i class="fa fa-arrow-{{app()->getLocale()==='en'?'right':'left'}}"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                        </div>
                       </div>
                      <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                        </div>
                       </div>
                       <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                              <div class="outerCard">
                                <div class="cardImg">
                                  <img src="/assets/img/cardimg.svg"/>
                                </div>
                                <div class="info">
                                  <h2>Autumn fallen leaves</h2>
                                  <p><span>{{ __('mycustom.by')}} </span>Horace Cooper</p>
                                </div>
                                <div class="footerBtn">
                                 <button>{{ __('mycustom.addToCart')}}</button>
                                </div>
                              </div>
                            </div>
                        </div>
                       </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section> -->

  <!-- Artist -->
<section class="ArtistSection">

  <div class="outer">
  <div class="row  art">
    <div class="col-6">
        <h3 class="mb-3">{{ __('mycustom.popularArtists')}}</h3>
    </div>
    <div class="col-12">
        <div id="carouselExampleIndicators4" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                     @php
                            $chunkedArtists = $artists->chunk(4);
                           
                     @endphp

              @foreach($chunkedArtists as $artKey => $artChunk)
                <div class="carousel-item {{$artKey===0 ? 'active':''}}">
                    <div class="row">
                        
                    @foreach($artChunk as $artist)

                            @php
                            $artistProducts = DB::table('products')->where('artist_id', $artist->id)->where('is_online', 1)->take(4)->get();
                            
                            @endphp
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                                <a href="#" data-toggle="modal" data-target="#exampleModalLong{{$artist->id}}"><div class="ArtistCard">
                                <div class="grid-container">
                                    @for ($i = 0; $i < 4; $i++)
                                        @if (isset($artistProducts[$i]))
                                            <div class="grid-item">
                                                <img src="{{ asset('productImages/'.$artistProducts[$i]->img) }}" alt="painting" />
                                            </div>  
                                        @else
                                        <div class="grid-item">
                                        <img src="assets/img/a{{ $i + 1 }}.png" / alt="painting">
                                        </div>
                                        @endif
                                        @endfor                    
                                </div>
                                    <div class="footerCard">
                                        <div class="Avatar">

                                        @if(isset($artist->img))
                                            <img src="{{ asset('userImages/'.$artist->img) }}" alt="artist" />
                                        @else
                                            <img src="{{asset('assets\img\artist.png')}}" alt="artist pic"/>
                                        @endif 

                                        </div>

                                        <div class="info">
                                               <h2>{{$artist->name}}</h2>
                                                <p><span>255 </span>{{ __('mycustom.sales')}}</p>
                                                <div class="ratting">

                                                </div>

                                        </div>

                                    </div>
                                    <div class="popup">
                                    @if(isset($artist->img))
                                            <img src="{{ asset('userImages/'.$artist->img) }}" alt="artist" />
                                        @else
                                            <img src="{{asset('assets\img\artist.png')}}" alt="artist pic"/>
                                        @endif 
                                        <p>Additional information about Andrii Kovalyk.</p>
                                    </div>
                                </div>
                              </a>
                         </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalLong{{$artist->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <!-- Vertically centered scrollable modal -->
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="artistModal1Label">{{$artist->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <style>
                                                            .close{
                                                            background-color: white;
                                                            border-radius: 20px;
                                                            border: none;
                                                            padding: 5px;
                                                            }
                                                        </style>
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if(isset($artist->img))
                                                            <img  src="{{ asset('userImages/'.$artist->img) }}" alt="artist" class="img-fluid"/>
                                                        @else
                                                            <img  src="{{asset('assets\img\artist.png')}}" alt="artist pic" class="img-fluid"/>
                                                        @endif                                                       
                                                        <p>{{isset($artist->artist->country)? $artist->artist->country : 'unknown'}}</p>
                                                        <p>{{isset($artist->artist->description)? $artist->artist->description : 'artist description'}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('mycustom.close')}}</button>
                                                        <form method="get" action="{{ route('artists.showArtist', ['id' => $artist->id]) }}">
                                                            @csrf
                                                        <button type="submit" class="btn btn-primary">{{__('mycustom.viewProfile')}}</button></form>
                                                    </div>
                                                </div>
                                                </div>
                                            
                                            </div>





                         @endforeach


                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
    


  

        </div>
   
  </section>

  <!-- Gallery -->
 <section class="GallerySection">
  <h1>{{ __('mycustom.gallery')}} </h1>
  <p data-aos="fade-down">{{ __('mycustom.theMostBeatifulpaintings')}}</p>
<div class="image-grid">
  <div class="image-grid-col-2" style="position: relative;">
    @if(isset($sections[0]))
    <img style="background-size: cover; z-index: 0;"   src="{{ asset('sectionImages/' . $sections[0]->img) }}" alt="Image 1">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{$sections[0]->name}}</span>
    @else                                                       
    <img style="background-size: cover; z-index: 0;"   src="/assets/img/a1.png" alt="Image 1">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{__('mycustom.paintName')}}</span>
    @endif                                                        
 
  </div>
  <div style="position: relative;">

    @if(isset($sections[1]))
    <img  src="{{ asset('sectionImages/' . $sections[1]->img) }}" alt="Image 2" >
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%);  padding: 8px; left:48px; bottom: 0px;">{{$sections[1]->name}}</span>
    @else
    <img  src="/assets/img/a2.png" alt="Image 2" >
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%);  padding: 8px; left:48px; bottom: 0px;">{{__('mycustom.paintName')}}</span>
     @endif                                                       
  
  </div>
  <div class=" image-grid-row-2" style="position: relative;">

  @if(isset($sections[2]))
    <img  src="{{ asset('sectionImages/' . $sections[2]->img) }}" alt="Image 3">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{$sections[2]->name}}</span>
   
    @else                                                       
    <img  src="/assets/img/a3.png" alt="Image 3">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{__('mycustom.paintName')}}</span>
    @endif
 
  </div>
  <div style="position: relative;">


   @if(isset($sections[3]))                                                         
    <img  src="{{ asset('sectionImages/' . $sections[3]->img) }}" alt="Image 4">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{$sections[3]->name}}</span>
  
    @else
    <img  src="/assets/img/a4.png" alt="Image 4">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{__('mycustom.paintName')}}</span>
    @endif
  
  </div>
   <div style="position: relative;">

    @if(isset($sections[4]))
    <img  src="{{ asset('sectionImages/' . $sections[4]->img) }}" alt="Image 5">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{$sections[4]->name}}</span>
 
    @else
    <img  src="/assets/img/a5.png" alt="Image 5">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{__('mycustom.paintName')}}</span>
     @endif                                                       
  </div>
  <div style="position: relative;">


    @if(isset($sections[5]))
    <img   src="{{ asset('sectionImages/' . $sections[5]->img) }}" alt="Image 6">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">{{$sections[5]->name}}</span>
   
   
    @else
    <img   src="/assets/img/a6.png" alt="Image 6">
    <span style="z-index: 100; color: rgb(0, 0, 0); background-color: rgba(253, 253, 255, 0.588); font-size:1rem; position: absolute;  transform: translateX(-50%); left:48px; bottom: 0px; padding: 8px;">Paint Name</span>
    @endif
 
 
  </div>
   </div>
   <div class="footerButton">
   <form method="get" action="{{route('allSections')}}">
   @csrf
    <button>{{ __('mycustom.viewAll')}}</button></form>
    </div>
  </section>
  
 
<!-- WhyArtFeat -->
   <section class="WhyArtFeat">
         <div class=" row">
            <div class="col-lg-6">
            <div class="header">
                <h1>{{ __('mycustom.whyArtfeat')}}</h1>
            </div>
            <div class="content" data-aos="fade-up">
                @if($whyArtfeatText)
                    <p>{{ __('mycustom.whyArtfeatText')}}</p>
                @else<p>No Text</p>
                @endif
            </div>
            <div class="learnMore">
              <form method="get" action="/who/we/are">
                @csrf
              <button class="botton" type="submit" onclick="">{{ __('mycustom.learnMore')}}</button>
              </form>
            </div>
        </div>
        <div class="LeftImages col-lg-6">
          <div data-aos="fade-up" data-aos-delay="1000"><img src="/assets/img/a4.png" alt="img"></div>
          <div  data-aos="fade-up" data-aos-delay="1500" ><img src="/assets/img/a1.png" alt="img"></div>
          <div data-aos="fade-up" data-aos-delay="2000" ><img src="/assets/img/a5.png" alt="img"></div>
        </div>  
         </div>
     
</section>

<!-- Join Creators -->
<section class="Creators">
 <div class="inner">
  <div class="info">
  <div class="info">
            <h1>{{ __('mycustom.joinOur')}}</h1>
            <h1>{{ __('mycustom.listCreators')}}</h1>
            @auth 
            @else
            <form method="get" action="/landing/signup">
              @csrf
            <button type="submit"><span>{{ __('mycustom.registerNow')}}</span></button>
            </form>
            @endauth
  </div>
  </div>
  <div class="users">
  @for($i=0 ; $i<5; $i++)
            @if(isset($creators[$i])) 
            <div class="user{{$i+1}}" data-bs-toggle="modal" data-bs-target="#exampleModalLongCreator{{$i}}"  >
                <img class="creatorImg" src="{{isset($creators[$i]->img) ? asset('creatorsImages/'.$creators[$i]->img) : asset('assets/img/p2.png') }}" id="profileImage" 
                    />
                <div>
                    <p>{{ __('mycustom.viewProfile')}}</p>
                </div>
            </div>

                <!-- Creators Modal -->
                <div class="modal fade" id="exampleModalLongCreator{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <!-- Vertically centered scrollable modal -->
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="artistModal1Label">{{$creators[$i]->name}}</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <style>
                                                            .close{
                                                            background-color: white;
                                                            border-radius: 20px;
                                                            border: none;
                                                            padding: 5px;
                                                            }
                                                        </style>
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if(isset($creators[$i]->img))
                                                            <img src="{{ asset('creatorsImages/'.$creators[$i]->img) }}" alt="artist" class="img-fluid"/>
                                                        @else
                                                            <img src="{{asset('\assets\img\artist.png')}}" alt="artist pic" class="img-fluid"/>
                                                        @endif                                                       
                                                        <p>{{$creators[$i]->description}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
                                                    </div>
                                                </div>
                                                </div>
                                            
                                            </div>
                                            <!-- end modal -->

            @else
            <div class="user{{$i+1}}" data-bs-target="#exampleModalLong" data-bs-toggle="modal">
                <img class="creatorImg"  src="/assets/img/p2.png" id="profileImage"  />
                <div>
                    <p>{{ __('mycustom.viewProfile')}}</p>
                </div>
            </div>

            @endif



                                        









    @endfor

  </div>
 </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <!-- Vertically centered scrollable modal -->
     <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5  class="modal-title" id="artistModal1Label">Andrii Kovalyk</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <style>
                .close{
                  background-color: white;
                  border-radius: 20px;
                  border: none;
                  padding: 5px;
                }


              </style>
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <img src="/assets/img/p2.png" alt="Avatar" class="img-fluid">
            <p>Additional information about Andrii Kovalyk.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lobortis turpis. Nullam malesuada et erat ac gravida. Ut nec dui in sem consequat bibendum. Integer feugiat, arcu sit amet blandit facilisis, enim turpis fermentum lorem, a pharetra nulla felis in nunc. Cras at bibendum leo. Integer sit amet bibendum ex. Integer euismod lorem eu ligula dictum, a mollis turpis condimentum. Etiam euismod dapibus convallis. Nulla luctus posuere sem. Mauris consequat nisi sed urna tincidunt, quis ultricies purus varius. Nullam scelerisque, dolor nec congue sollicitudin, libero eros efficitur arcu, in bibendum est sapien non nisi. Quisque et efficitur sapien. Quisque gravida libero non vestibulum vestibulum. Curabitur consectetur convallis lorem et accumsan.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
        </div>
    </div>
     </div>
  
</div>
<!-- JavaScript to redirect to a single event page -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
    const eventCards = document.querySelectorAll('.event-card');
    
    eventCards.forEach(function (card) {
        card.addEventListener('click', function () {
            const eventId = card.getAttribute('data-id');
            window.location.href = `/landing/single/event/${eventId}`;
        });
    });
});

</script>



<!-- for sections hover modal -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            const modalId = card.getAttribute('data-bs-target');
            // Show modal on card hover
            card.addEventListener('mouseenter', function () {
                $(modalId).modal('show');
            });

            // Hide modal on card mouseleave
            card.addEventListener('mouseleave', function () {
                $(modalId).modal('hide');
            });

            // Hide modal on modal close button click
            $(modalId).find('.btn-close').on('click', function () {
                $(modalId).modal('hide');
            });
        });
    });
</script>
@endsection