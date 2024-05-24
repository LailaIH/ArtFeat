@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/discover.css')}}">

<div class="discoverSection">
    <div class="pageHeader">
        <img src="{{asset('assets/img/editprofile.png')}}" />
        <div class="overLay">
            <img src="{{asset('assets/img/shadowBlue.svg')}}" />
        </div>
        <div class="header">
            <h1>{{__('mycustom.discoverOurArtists')}}</h1>
            <p>
               {{__('mycustom.discoverOurArtistsDes')}}
            </p>


            <div class="custom-search">
                <form method="post" action="{{route('artists.search')}}">
                    @csrf
                <input name="name" type="text" class="custom-search-input" placeholder="{{__('mycustom.descoverSaerch')}}">
                <button class="custom-search-botton" type="submit">{{__('mycustom.descoverSaerchButton')}}</button>  
                </form>
            </div>           
       
       
       
       
        </div>
    </div>
    <div class="pageContent">
       
        
        <div class="divider"></div>    
       
    <div class="wrapperDiscoverCards" >
        
        <div class="row row-cols-3">
           
            @php   
                
                $products = DB::table('products')->where('artist_id', $artist->id)->get();
            @endphp
            
            <div class="col mb-4">
            <div class="DiscoverCard" >
                <div class="infoCard">
                    <div class="Avatar">
                    @if(isset($artist->img))
                        <img src="{{ asset('userImages/'.$artist->img) }}" alt=" artist pic " />
                   @else
                   <img src="{{asset('assets\img\artist.png')}}" alt="artist pic"/>
                    @endif
                </div>
                    <div class="info">
                        <h2>{{$artist->name}}</h2>
                        <p>{{$artist->email}}</p>
                        
                    </div>
                </div>
                <div class="image-grid">
                    <div class="image-grid-row-2">
                        @if(isset($products[0]))
                        <img src="{{ asset('productImages/'.$products[0]->img) }}" alt="Image 1" />
                        @else
                        <img src="{{asset('assets/img/a2.png')}}" alt="Image 2" />
                        @endif
                    </div> 

                    @for($i=1 ; $i<=6 ; $i++)
                    <div>
                    @if(isset($products[$i]))
                        
                        <img src="{{asset('productImages/'.$products[$i]->img)}}" alt="Image 2" />
                       
                    @else
                      
                    <img src="{{ asset('assets/img/a' . ($i + 1) . '.png') }}" alt="Image {{ $i + 1 }}" />
                      
                    @endif
                    
                    </div>
                    @endfor
                </div>

            </div>
        </div>
            
        </div>
        </div>
    </div>

</div>

</div>


@endsection