@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/cartDetail.css')}}">

    <div class="pageHeader">
      <img src="/assets/img/editprofile.png" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        
        <h1>Cart Details</h1>
      </div>
    </div>
    <div class="CartDetailsSection">
    <div class="pageContent">
    @if(session('cart'))
      <h3>Cart</h3>
      <div class="cartSection">
        <div class="wrapperCards">


        @foreach(session('cart') as $key => $productDetails)
          
          <div class="cartDetails">
            <div class="cartImg">  
              <img src="{{ asset('productImages/'.$productDetails['product']->img) }}" alt="" />
            </div>
            <div class="outerCart">
              <div class="innerCart">
                <div class="info">
                  <div class="primaryInfo">
                    <div class="name">
                      <p>{{$productDetails['product']->name}}</p>
                    </div>
                    <div class="author">
                      @php 
                      $artist = DB::table('users')->where('id',$productDetails['product']->artist_id)->first();
                      @endphp
                      <p>By: <span>{{$artist->name}}</span></p>
                    </div>
                    <div class="size">182 x 45 x 22 cm</div>
                  </div>
                  <div class="price">
                    <p>$<span>{{$productDetails['product']->price}}</span></p>
                    <div  class="mydiv">total:${{$productDetails['product']->price*$productDetails['quantity']}}</div>
                  </div>
                </div>
                <div class="actions">
                  <div class="Quantity">
                    <div class="quantity d-flex">
                      <a href="#" class="quantity__minus" data-product-id="{{ $key }}" data-action="minus">
                        <span>
                          <img src="/assets/img/minus.svg" alt="" />
                        </span>
                      </a>
                      <input
                        id="quantity_{{ $key }}"
                        name="quantity"
                        type="text"
                        class="quantity__input"
                        value="{{$productDetails['quantity']}}"
                      />
                      <a href="#" class="quantity__plus" data-product-id="{{ $key }}" data-action="plus">
                        <span>
                          <img src="/assets/img/plus.svg" alt="" />
                        </span>
                      </a>
                    </div>
                  </div>
                  <button class="remove">
                    <img src="/assets/img/minus-circle.svg" alt="" />
                  </button>
                </div>
              </div>
            </div>
          </div>
          @endforeach




        </div>
        <div class="saleDetails">
          <div class="saleCard">
            <header>Order summary</header>
            <div>
              <div class="info">
                <div class="subTotal">
                  <p>Subtotal</p>
                  <p>$ <span>27.44</span></p>
                </div>
                <div class="Shipping">
                  <p>Shipping</p>
                  <p>$ <span>7.44</span></p>
                </div>
              </div>
              <div class="divider"></div>
              <div class="subInfo">
                <div class="item">This Item Is A Gift</div>
                <div class="item">Add Frame</div>
              </div>
              <div class="divider"></div>
              <div class="total">
                <p>Total</p>
                <p>$<span>{{$total}}</span></p>
              </div>
            </div>
            <button>Continue to payment</button>
          </div>
        </div>
      </div>
      @else
      <h3 style="color: #35ace8;">No Items</h3>
      @endif
    </div>
  </div>













@endsection