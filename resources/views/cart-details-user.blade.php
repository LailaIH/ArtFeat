@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/cartDetail.css')}}">
<meta name="csrf-token" content="{{ Session::token() }}"> 

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
    @if(!$carts->isEmpty())
      <h3>Cart</h3>
      <div class="cartSection">
        <div class="wrapperCards">


        @foreach($carts as $cart)
        <input hidden value="{{$cart->id}}" id="cartId"/>
          
          <div class="cartDetails">
            <div class="cartImg">  
              <img src="{{ asset('productImages/'.$cart->product->img) }}" alt="" />
            </div>
            <div class="outerCart">
              <div class="innerCart">
                <div class="info">
                  <div class="primaryInfo">
                    <div class="name">
                      <p>{{$cart->product->name}}</p>
                    </div>
                    <div class="author">
                      @php 
                      $artist = DB::table('users')->where('id',$cart->product->artist_id)->first();
                      @endphp
                      <p>By: <span>{{$artist->name}}</span></p>
                    </div>
                    <div class="size">182 x 45 x 22 cm</div>
                  </div>
                  <div class="price">
                    <p>$<span>{{$cart->product->price}}</span></p>
                    <div id="subtotal" class="mydiv">total:${{$cart->product->price*$cart['quantity']}}</div>
                  </div>
                </div>
                <div class="actions">
                  <div class="Quantity">
                    <div class="quantity d-flex">
                      <a href="#" class="quantity__minus"  >
                        <span>
                          <img src="/assets/img/minus.svg" alt="" />
                        </span>
                      </a>
                      <input
                        id="{{$cart->id}}"
                        name="quantity"
                        type="text"
                        class="quantity__input"
                        value="{{$cart['quantity']}}"
                      />
                      <a href="#" class="quantity__plus" >
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
                <p id="total">$<span>{{$total}}</span></p>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $(".quantity__plus").click(function(e) {
        e.preventDefault();
        
        var input = $('.quantity__input');
        var currentQuantity = parseInt(input.val());
        
        input.val(currentQuantity + 1);
        updateCart(input);
    });
    
    $(".quantity__minus").click(function(e) {
        e.preventDefault();
        
        var input = $(this).closest('.quantity d-flex').find('.quantity__input');
        var currentQuantity = parseInt(input.val());
        
        if (currentQuantity > 1) {
            input.val(currentQuantity - 1);
            updateCart(input);
        }
    });
    
    function updateCart(input) {
        var quantity = input.val();
        var id = parseInt($('#cartId').val());
        
        $.post(
            'http://localhost:8000/updateLoggedUserCart/' + id,
            
            {
              '_token': $('meta[name=csrf-token]').attr('content'),
                quantity: quantity,
            },
            
            function(response) {
                // Update values on the page
                $(".quantity__input").val(response.quantity);
                // Update subtotal and total (assuming you get them in the response)
                 $("#subtotal").text(response.subtotal);
                 $("#total").text(response.total);
            },
             function(error) {
                console.log(error);
            }
          )
    }
});
</script>


@endsection