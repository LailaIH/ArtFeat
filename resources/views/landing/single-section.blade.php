@extends('commonlanding2')
@section('content')

<link rel="stylesheet" href="{{asset('assets/css/event.css')}}" />

     <section class="p-5 " id="{{$section->id}}">
                <div class="container">
                  <div class="row justify-content-between">
                    <div class="col-md p-5">
                      <h1>{{$section->name}}</h1>
                    
                      <p>
                      {{$section->description}}
                      </p>
                    </div>
                    <div class="col-md pt-4 event-pic">
                      <img
                        src="{{  isset($section->img)? asset('sectionImages/'.$section->img) : asset('assets/img/events/alina-grubnyak-IsxaFsXi2rs-unsplash.jpg')    }}"
                        alt=""
                        class="img-fluid event-pic"
                      />
                    </div>


                  </div>

            <!-- products of this section -->
  
    <h3 style="margin-top: 125px;" class="mb-5 ">{{__('mycustom.artworkBelongs')}}</h3>
    <div class="Categories">
        @if(count($section->products)>0)
             @foreach($section->products as $product)
             <a style="text-decoration: none;" href="{{route('artists.artwork',$product->id)}}">

            <div class="card">
                <div class="overlay">
                        @if($product->img)
                            <img src="{{ asset('productImages/' . $product->img) }}" alt="section pic"/>

                            @else
                            <img src="{{asset('assets\img\sculptures.jpg')}}" alt="artist pic"/>
                            @endif
                    <div class="OverLay2">
                        <p class="Content">{{$product->name}}</p>
                    </div>
                </div>
            </div></a>

            @endforeach

        @else
        <h6>{{__('mycustom.noArtworkBelongs')}}</h6>
        @endif
    </div>
 








                </div>
              </section>

@endsection