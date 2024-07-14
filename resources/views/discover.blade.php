@extends('commonlanding2')
@section('content')
<style>
    .custom-search {
  position: relative;
  width: 100%;
}
.custom-search-input {
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 100px;
  padding: 10px 100px 10px 20px; 
  line-height: 1;
  box-sizing: border-box;
  outline: none;
}
.custom-search-botton {
  position: absolute;
  right: 3px; 
  top: 3px;
  bottom: 3px;
  border: 0;
  background:#00a5f2;
  color: #fff;
  outline: none;
  margin: 0;
  padding: 0 10px;
  border-radius: 12px;
  z-index: 2;
}

html[dir="rtl"] .custom-search-botton {
  right: auto;
  
  left: 3px;
}
</style>

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
                <form method="get" action="{{route('artists.search')}}">
                    @csrf
                <input name="name" type="text" class="custom-search-input" placeholder="{{__('mycustom.descoverSaerch')}}">
                <button class="custom-search-botton" type="submit" >{{__('mycustom.descoverSaerchButton')}}</button>  
                </form>
            </div>        
       
          
       
       
        </div>
    </div>

    @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
    <div class="pageContent">
        <div aria-label="Page navigation example">
        <ul class="pagination">
        @if ($artists->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true"><</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $artists->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true"><</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif

        @foreach ($artists->getUrlRange(1, $artists->lastPage()) as $page => $url)
            @if ($page == $artists->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        @if ($artists->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $artists->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">></span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">></span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        @endif
    </ul>
        </div>
        
        <div class="divider"></div>    
       
        <div class="wrapperDiscoverCards" >
        
        
            @foreach($artists as $artist)
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

                        <h2>{{ $artist->name }}</h2>
                                         
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
                      
                    <img src="assets/img/a{{ $i + 1 }}.png" alt="Image 2" />
                      
                    @endif
                    
                    </div>
                    @endfor
                </div>

            </div></a>
            @endforeach
        
        
    </div>

</div>

</div>




@endsection