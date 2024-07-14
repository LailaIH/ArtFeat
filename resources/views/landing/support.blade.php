@extends('commonlanding2')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/event.css')}}" />
<style>
h3 {
            position: absolute;
            top: 10%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Center the element */
            color: white;
            background: rgba(0, 0, 0, 0.4); /* Background color with transparency */
            padding: 10px; /* Adjust as needed */
            border-radius: 80px; /* Optional: for rounded corners */
           
            text-align: center; /* Center the text */
        }
    </style>

  @if(count($supports)>0)
    <!-- Events -->
    <section id="events" class="text-center">
      <div class="text-center">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
          <!-- The selector points -->
          <div class="carousel-indicators mb-4">
            @for($i=0 ; $i<count($supports) ; $i++)
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="{{$i}}"
              @if($i==0)class="active"@endif
              @if($i==0) aria-current="true"@endif 
              aria-label="Slide ".{{$i+1}}
            ></button> @endfor 
           
          </div>
          <!--  -->
        <div class="carousel-inner">
          @for($i=0 ; $i<count($supports) ; $i++)
            <div class="carousel-item @if($i==0) active @endif c-item" data-bs-interval="{{$i}}">
              <a href="#route-{{$i}}">
                <img
                  src="{{asset('supportsImages/'.$supports[$i]->img)}}"
                  class="d-block w-100 c-img slide-img"
                  alt="go to event 1"
                />
              </a>

              <div class="carousel-caption d-none d-md-block p-3 ">
                
                
                 <h3 class="text-white Content" style="background-color: rgb(0, 0, 0,0.6);"> {{$supports[$i]->title}}</h3>
                
              </div>
            </div>
            @endfor
           
           
          </div>
          <!-- prev-next -btns -->
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- Event details -->


  @for($i=0 ; $i<count($supports); $i++)
    @if($i%2==0)
    <section class="p-5 first " id="{{$i}}">
      <div class="container ">
        <div class="row justify-content-between">
      

          <div class="col-md p-5">
            <h1> <span class="text-danger">{{$supports[$i]->title}}</span></h1>
            <p class="lead">
            {{$supports[$i]->description}}
            </p>
            
          </div>

          <div class="col-md pt-4 event-pic">
            <img
              src="{{asset('supportsImages/'.$supports[$i]->img)}}"
              alt=""
              class="img-fluid event-pic"
            />
          </div>
         
        </div>
      </div>
    </section>

    @else
    <section class="p-5 second-event " id="{{$i}}">
      <div class="container ">
        <div class="row justify-content-between">
        <div class="col-md pt-4 event-pic">
            <img
              src="{{asset('supportsImages/'.$supports[$i]->img)}}"
              alt=""
              class="img-fluid event-pic"
            />
          </div>

          <div class="col-md p-5">
            <h1> <span class="text-danger">{{$supports[$i]->title}}</span></h1>
            <p class="lead">
            {{$supports[$i]->description}}
            </p>
            
          </div>

          
         
        </div>
      </div>
    </section>
    @endif

  @endfor


@else
<h5 class="mt-4 mb-4 p-4" style="color: #35ace8;">No Support Articles Yet</h1>
@endif
   
 

@section('footer')    


@endsection

@endsection 
