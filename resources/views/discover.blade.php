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
            <h1>Discover our artists</h1>
            <p>
                Look for their artworks, read about their, and if you like the
                artwork.. GET IT!
            </p>
            
            <input type="text" class="form-control" />
            
        </div>
    </div>
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
                $products = DB::table('products')->where('artist_id', $artist->id)->get();
            @endphp
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
                    @if(isset($products[$i]))
                    <div>
                        <img src="{{asset('productImages/'.$products[$i]->img)}}" alt="Image 2" />
                    </div>
                    @else
                    <img src="assets/img/a{{ $i + 1 }}.png" alt="Image 2" />
                    @endif
                    @endfor
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>




@endsection



