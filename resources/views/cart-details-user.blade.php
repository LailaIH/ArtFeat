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
    @if (session('success'))
                  <div class="alert alert-success ">{{ session('success') }}</div>
        @endif


    
        @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
          @endif

    <div class="CartDetailsSection">
    <div class="pageContent">
    @if(!$carts->isEmpty())
      <h3>Cart</h3>
      <div class="cartSection">
        <div class="wrapperCards">


        @foreach($carts as $cart)
          
          <div class="cartDetails" data-cart-id="{{$cart->id}}">
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
                    <div id="subtotal_{{$cart->id}}" class="mydiv">total:${{$cart->product->price*$cart['quantity']}}</div>
                  </div>
                </div>
                <div class="actions">
                  <div class="Quantity">
                    <div class="quantity d-flex">
                      <form method="POST" action="{{route('updateLoggedUserCart',$cart->id)}}">
                        @csrf 
                        @method('PUT')
                        <button class="quantity__button" type="submit" name="action" value="minus" >
                      <a href="#" class="quantity__minus" >
                        <span>
                          <img src="/assets/img/minus.svg" alt="" />
                        </span>
                      </a></button>
                      <input
                        id="{{$cart->id}}"
                        name="quantity"
                        type="text"
                        class="quantity__input"
                        value="{{$cart['quantity']}}"
                      />
                      <button  class="quantity__button" type="submit" name="action" value="plus">
                      <a href="#" class="quantity__plus" >
                        <span>
                          <img src="/assets/img/plus.svg" alt="" />
                        </span>
                      </a></button>
                      </form>
                    </div>
                  </div>
                 
                  <form method="POST" action="{{route('deleteLoggedUserCart',$cart->id)}}">
                 @csrf 
                 @method('DELETE')
                  <button type="submit" class="remove" onclick="return confirm('Are you sure you want to delete this cart?')">
                    <img src="/assets/img/minus-circle.svg" alt="" />
                  </button></form>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach




        </div>
        <div class="saleDetails">
          <div class="saleCard" id="saleCard_{{$cart->id}}">
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
                <p id="total_{{$cart->id}}">$<span>{{$total}}</span></p>
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

<script>
// $(document).ready(function() {
//     // Listen for click event on plus button
//     $(".quantity__plus").click(function(e) {
//         e.preventDefault();
        
//         // Get the input element and current quantity
//         var input = $(this).closest('.Quantity').find('.quantity__input');
//         var currentQuantity = parseInt(input.val());
        
//         // Increase quantity
//         var newQuantity = currentQuantity + 1;
        
//         // Update input value
//         input.val(newQuantity);
        
//         // Get cart ID
//         var cartId = input.attr('id');
        
//         // Send AJAX request to update cart
//         updateCartQuantity(cartId, newQuantity);
//     });

//     // Listen for click event on minus button
//     $(".quantity__minus").click(function(e) {
//         e.preventDefault();
        
//         // Get the input element and current quantity
//         var input = $(this).closest('.Quantity').find('.quantity__input');
//         var currentQuantity = parseInt(input.val());
        
//         // Decrease quantity if greater than 1
//         if (currentQuantity > 1) {
//             var newQuantity = currentQuantity - 1;
            
//             // Update input value
//             input.val(newQuantity);
            
//             // Get cart ID
//             var cartId = input.attr('id');
            
//             // Send AJAX request to update cart
//             updateCartQuantity(cartId, newQuantity);
//         }
//     });

//     // Function to update cart quantity via AJAX
//     function updateCartQuantity(cartId, newQuantity) {
//         $.ajax({
//             url: '/updateLoggedUserCart/' + cartId,
//             method: 'POST',
//             data: {
//                 _token: $('meta[name="csrf-token"]').attr('content'),
//                 quantity: newQuantity
//             },
//             success: function(response) {
//                 // Update subtotal and total for the specific cart
//                 $('#subtotal_' + cartId).text('total: $' + response.subtotal);
//                 $('#total_' + cartId + ' span').text(response.total);
//             },
//             error: function(error) {
//                 console.log(error);
//             }
//         });
//     }
// });

</script>


@endsection