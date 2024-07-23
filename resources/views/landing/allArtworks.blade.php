@extends('commonlanding2')
@section('content')


<style>
 .custom-search {
    position: relative;
    width: 100%;
  }
  .custom-search-input {
    width: 500px;
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

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/profile.css') }}">
<div class="discoverSection">
  <div class="pageHeader">
    <img src="/assets/img/termsconditions.svg" />
    <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
    </div>
    <div class="header">
          <h1>{{ __('mycustom.allArtworks') }}</h1>
          

          <div class="custom-search">
                <form method="get" action="{{route('artists.searchArtwork')}}">
                    @csrf
                <input name="name" type="text" class="custom-search-input" placeholder="{{__('mycustom.searchArtwork')}}">
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


<div style="padding-top: 5rem;">
    <div class="container mb-4">
        @if(count($products)==0)
        <h5 class="p-3 mt-2 mb-3 text-center">{{ __('mycustom.noArtwork') }}</h5>
        @else
        <div class="row">
        @foreach($products as $product)

                <div class="col-md-4 mb-3">
                <a style="text-decoration: none;" href="{{ route('artists.artwork', ['id' => $product->id]) }}">

                    <div class="card custom-card">
                        <img src="{{ asset('productImages/'.$product->img) }}" alt="Image" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{$product->name}}</h5>
                        </div>
                    </div>
                </div></a>
            @endforeach
        </div>
        @endif
    </div>
</div>
</div>

<style>
    .custom-card {
    border-radius: 20px; /* Applies border radius to the entire card */
    overflow: hidden; /* Ensures content does not overflow the rounded corners */
}

.custom-card .card-img-top {
    border-top-left-radius: 20px; /* Applies border radius to the top-left of the image */
    border-top-right-radius: 20px; /* Applies border radius to the top-right of the image */
    height: 200px; /* Adjust height as needed */
    object-fit: cover; /* Ensures image covers the container */
}

.custom-card .card-body {
    border-bottom-left-radius: 20px; /* Applies border radius to the bottom-left of the card body */
    border-bottom-right-radius: 20px; /* Applies border radius to the bottom-right of the card body */
}

</style>

@endsection
