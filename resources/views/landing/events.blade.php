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
    <!-- Events -->
    @if(count($events)>0)
    <section id="events" class="text-center">
      <div class="text-center">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
          <!-- The selector points -->
          <div class="carousel-indicators mb-4">
            @for($i=0 ; $i<count($events) ; $i++)
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="{{$i}}"
              @if($i==0)class="active"@endif
              @if($i==0) aria-current="true"@endif
              aria-label="Slide".{{$i+1}}
            ></button>
            @endfor
         
          </div>
          <!--  -->
          <div class="carousel-inner">

            @for($i=0; $i<count($events); $i++)
                <div class="carousel-item {{ $i==0? 'active':'' }} c-item" data-bs-interval="{{$i}}">
                  <a href="#first-{{$i}}">
                    <img
                      src="{{asset('eventsImages/'.$events[$i]->img)}}"
                      class="d-block w-100 c-img"
                      alt="go to event 1"
                    />
                  </a>

                  <div class="carousel-caption d-none d-md-block p-3">
                    <h3>{{$events[$i]->title}}</h3>
                   
                              
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
     @for($i=0 ; $i<count($events) ; $i++)
       @if($i%2==0)  
              <section class="p-5 " id="{{$i}}">
                <div class="container">
                  <div class="row justify-content-between">
                    <div class="col-md p-5">
                      <h1>{{$events[$i]->title}}  <span class="text-warning">Event</span></h1>
                    
                      <p>
                      {{$events[$i]->description}}
                      </p>

                      <p class="text-blue">
                        <a style="text-decoration: none;" href="{{route('events.single',$events[$i]->id)}}">
                        {{__('mycustom.showMore')}}</a>

                      </p>
                      




                    </div>
                    <div class="col-md pt-4 event-pic">
                      <img
                        src="{{  isset($events[$i]->img)? asset('eventsImages/'.$events[$i]->img) : asset('assets/img/events/alina-grubnyak-IsxaFsXi2rs-unsplash.jpg')    }}"
                        alt=""
                        class="img-fluid event-pic"
                      />
                    </div>
                  </div>
                </div>
              </section>

        @else

        <section class="p-5 second-event " id="{{$i}}">
                <div class="container">
                  <div class="row justify-content-between">
                    <div class="col-md p-5">
                    <img
                        src="{{  isset($events[$i]->img)? asset('eventsImages/'.$events[$i]->img) : asset('assets/img/events/alina-grubnyak-IsxaFsXi2rs-unsplash.jpg')    }}"
                        alt=""
                        class="img-fluid event-pic"
                      />
                    
                    </div>
                    <div class="col-md pt-4 event-pic">
                      <h1>{{$events[$i]->title}}  <span class="text-warning">Event</span></h1>
                      
                      <p>
                      {{$events[$i]->description}}
                      </p>

                      <p class="text-blue">
                        <a style="text-decoration: none;" href="{{route('events.single',$events[$i]->id)}}">
                        {{__('mycustom.showMore')}}</a>
                      
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

