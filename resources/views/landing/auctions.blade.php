@extends('commonlanding2')



    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/index3.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/sale.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous"/>
    <link rel="icon" type="image/x-icon" href="/assets/img/fave.svg"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/event.css')}}"/>
    <title>ArtFeat</title>




@section('content') 


<section class="hero">
    <div class="container">
        <h2>Welcome to our Auction</h2>
        <p>Find unique items and start bidding today!</p>
        <a href="#auctions1" class="btn">View Auctions</a>
    </div>
</section>
<section class="auctions" id="auctions1">
    <div class="container">
    @if ($errors->has('fail'))
                        <div class="alert alert-danger m-3">
                            {{ $errors->first('fail') }}
                        </div>
    @endif

    @if (session('success'))

        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
    @endif                
                    
        <div class="row">

        @foreach($auctions as $auction)
            <div class="auction-item col-md-4 " data-item-id="{{$auction->id}}">
                @if(isset($auction->product_id))
                <img src="{{asset('productImages/'.$auction->product->img)}}" alt="product img" class="auction-img">

                @else
                <img src="{{asset('assets/img/saleImages/pawel-czerwinski-ruJm3dBXCqw-unsplash (1).jpg')}}" alt="Item img" class="auction-img">

                @endif
                    <h3>{{$auction->title}}</h3>
                    <p>Starting At {{ \Carbon\Carbon::parse($auction->start_time)->format('F j, Y, g:i a') }}</p>
                    <p>Ending At {{ \Carbon\Carbon::parse($auction->end_time)->format('F j, Y, g:i a') }}</p>
                    <p>Current Bid: <span class="current-bid">${{  $auction->ending_price==0? $auction->starting_price : max($auction->ending_price , $auction->starting_price)}}</span></p>
                   <form method="post" action="{{route('addPrice' , $auction->id)}}">
                    @csrf
                    <label for="bidAmount1">Enter your bid:</label>
                    <input name="ending_price" type="number" id="bidAmount1" min="0" step="1" required>
                    <button type="submit" class="bid-button">Place Bid</button>
                   
                   </form>
            </div>
        @endforeach
           
           
            
            <!-- Add more auction items as needed -->
        </div>
    </div>
</section>

@section('footer')

@endsection
<script src="{{asset('js/sale.js')}}"></script>

@endsection

