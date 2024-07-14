@extends('commonlanding2')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/event.css')}}" />

     <section class="p-5 " id="{{$event->id}}">
                <div class="container">
                  <div class="row justify-content-between">
                    <div class="col-md p-5">
                     
                      <h1>{{$event->title}}  <span class="text-warning">Event</span></h1>
                     
                      <p>
                      {{$event->description}}
                      </p>
                    </div>
                    <div class="col-md pt-4 event-pic">
                    <a href="/landing/events">
                      <img
                        src="{{  isset($event->img)? asset('eventsImages/'.$event->img) : asset('assets/img/events/alina-grubnyak-IsxaFsXi2rs-unsplash.jpg')    }}"
                        alt=""
                        class="img-fluid event-pic"
                      /></a>
                    </div>
                  </div>
                </div>
              </section>

@endsection