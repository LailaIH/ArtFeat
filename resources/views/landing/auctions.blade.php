@extends('commonlanding')
@section('head')
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>

    <link rel="stylesheet" href="{{asset('assets/css/sale.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous"/>
    <link rel="icon" type="image/x-icon" href="/assets/img/fave.svg"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/index2.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/event.css')}}"/>
    <title>ArtFeat</title>
 @endsection



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
        <div class="row">
            <div class="auction-item col-md-4 " data-item-id="1">
                <img src="{{asset('assets/img/saleImages/pawel-czerwinski-ruJm3dBXCqw-unsplash (1).jpg')}}" alt="Item 1" class="auction-img">
                    <h3>Item 1 Name</h3>
                    <p>Description of item 1.</p>
                    <p>Current Bid: <span class="current-bid">$100</span></p>
                    <label for="bidAmount1">Enter your bid:</label>
                    <input type="number" id="bidAmount1" min="0" step="1">
                    <button class="bid-button">Place Bid</button>
                    <p class="bid-message"></p>
            </div>
            <div class="auction-item col-md-4 " data-item-id="2">
                <img src="{{asset('assets/img/saleImages/pawel-czerwinski-8uZPynIu-rQ-unsplash.jpg')}}" alt="Item 1" class="auction-img">
                <h3>Item 1 Name</h3>
                <p>Description of item 1.</p>
                <p>Current Bid: <span class="current-bid">$100</span></p>
                <label for="bidAmount1">Enter your bid:</label>
                <input type="number" id="bidAmount1" min="0" step="1">
                <button class="bid-button">Place Bid</button>
                <p class="bid-message"></p>
            </div>
            <div class="auction-item col-md-4 " data-item-id="3">
                <img src="{{asset('assets/img/saleImages/geordanna-cordero-2Qg4y32pdCc-unsplash.jpg')}}" alt="Item 1" class="auction-img">
                    <h3>Item 1 Name</h3>
                    <p>Description of item 1.</p>
                    <p>Current Bid: <span class="current-bid">$100</span></p>
                    <label for="bidAmount1">Enter your bid:</label>
                    <input type="number" id="bidAmount1" min="0" step="1">
                    <button class="bid-button">Place Bid</button>
                    <p class="bid-message"></p>
            </div>
            <div class="auction-item col-md-4 " data-item-id="4">
                <img src="{{asset('assets/img/saleImages/david-pisnoy-46juD4zY1XA-unsplash.jpg')}}" alt="Item 1" class="auction-img">
                    <h3>Item 1 Name</h3>
                    <p>Description of item 1.</p>
                    <p>Current Bid: <span class="current-bid">$100</span></p>
                    <label for="bidAmount1">Enter your bid:</label>
                    <input type="number" id="bidAmount1" min="0" step="1">
                    <button class="bid-button">Place Bid</button>
                    <p class="bid-message"></p>
            </div>
            <!-- Add more auction items as needed -->
        </div>
    </div>
</section>

@section('footer')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script src="{{asset('js/sale.js')}}"></script>
@endsection

@endsection

