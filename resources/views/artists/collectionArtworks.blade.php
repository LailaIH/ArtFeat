@extends('commonlanding2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/profile.css') }}">

<div class="pageHeader">
    <img src="/assets/img/termsconditions.svg" />
    <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
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
        <h1>{{ __('mycustom.collectionArtwork') }}</h1>
    </div>
</div>
<h1 class="text-center mt-2">{{$collection->name}}</h1>

<div class="artwork mt-5">
    <div class="container mb-4">
        @if(count($products)==0)
        <div class="container mb-4">
   <div style="  height: 1px;
    width: 100%;
    background-color: #999;"></div>
    <h5 class="p-3 mt-2 mb-3">{{ __('mycustom.noArtwork') }}</h5>
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
