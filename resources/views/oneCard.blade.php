@extends('commonlanding2')
@section('content')
<style>
html[dir="rtl"] .custom-search-botton {
  right: auto;
  
  left: 3px;
}
</style>

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/discover.css')}}">

<div class="discoverSection">
    <div class="pageHeader">
        <img src="{{asset('assets/img/editprofile.png')}}" />
        <div class="overLay">
            <img src="{{asset('assets/img/shadowBlue.svg')}}" />
        </div>
        <div class="header">
        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
            <h1>{{__('mycustom.discoverOurArtists')}}</h1>
            <p>
               {{__('mycustom.discoverOurArtistsDes')}}
            </p>


            <div class="custom-search">
                <form method="get" action="{{route('artists.search')}}">
                    @csrf
                <input name="name" type="text" class="custom-search-input" placeholder="{{__('mycustom.descoverSaerch')}}">
                <button class="custom-search-botton" type="submit">{{__('mycustom.descoverSaerchButton')}}</button>  
                </form>
            </div>           
       
       
       
       
        </div>
    </div>
    <div class="pageContent">
       
        
        <div class="divider"></div>    
        @if(!$artist)
        <h5 class="mt-3">{{__('mycustom.noArtist')}}</h5>
        @else
           <div class="wrapperDiscoverCards" >
        
        

        
           
            @php   
                
                $products = DB::table('products')->where('artist_id', $artist->id)->where('is_online', 1)->get();
            @endphp
            
            <a style="text-decoration: none;" href="{{ route('artists.showArtist', ['id' => $artist->id]) }}">

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
                </div></a>

            </div>
        @endif
            
        </div>
        </div>
        
    </div>




@endsection