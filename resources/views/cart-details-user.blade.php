@extends('commonlanding2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/cartDetail.css')}}">
<meta name="csrf-token" content="{{ Session::token() }}"> 

    <div class="pageHeader">
      <img src="/assets/img/editprofile.png" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        
        <h1>{{__('mycustom.cartDetails')}}</h1>
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
      <h3>{{__('mycustom.cart')}}</h3>
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
                    <div id="subtotal_{{$cart->id}}" class="mydiv">{{__('mycustom.total')}}:${{$cart->product->price*$cart['quantity']}}</div>
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
            <header>{{__('mycustom.orderSummary')}}</header>
            <div>
              <div class="info">
                <div class="subTotal">
                  <p>{{__('mycustom.subtotal')}}</p>
                  <p>$ <span>27.44</span></p>
                </div>
                <div class="Shipping">
                  <p>{{__('mycustom.shipping')}}</p>
                  <p>$ <span>7.44</span></p>
                </div>
              </div>
              <div class="divider"></div>
              <div class="subInfo">
                <div class="item">{{__('mycustom.thisItemIsAGift')}}</div>
                <div class="item">{{__('mycustom.addFrame')}}</div>
              </div>
              <div class="divider"></div>
              <div class="total">
                <p>{{__('mycustom.Total')}}</p>
                <p id="total_{{$cart->id}}">$<span>{{$total}}</span></p>
              </div>
            </div>
            <form action="{{route('checkout')}}" method="POST">
              @csrf
            <button>
            {{__('mycustom.continueToPayment')}}
            </button> 
           
          </form>


         <form method="get" action="{{route('showConfirmPayment')}}">
          @csrf
         <button id="confirm-payment-button" type="submit" class="btn btn-primary" style=" color: white;">{{__('mycustom.showConfirmPayment')}}</button>
         </form>

                  <!-- confirm payment with wallet modal -->
                           
                  <div class="modal fade" id="exampleModalWallet" tabindex="-1" aria-labelledby="exampleModalLabelWallet" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelWallet">{{ __('mycustom.confirmPayment') }}</h5>
                </div>
                <div class="modal-body">
                    <h4 id="total-pay" style="color: green;"></h4>
                </div>
                <div class="modal-footer">
                    <form id="pay-now-form" class="mt-3" method="get" action="{{ route('payWithWallet') }}">
                        @csrf
                        <input name="session_id" type="hidden" id="pay-now-session-id" />
                        <button type="submit" class="btn btn-success">{{ __('mycustom.payNow') }}</button>
                    </form>
                    <form id="cancel-form" class="mt-3" method="get" action="{{ route('cancelWallet') }}">
                        @csrf
                        <input name="session_id" type="hidden" id="cancel-session-id" />
                        <button type="submit" style="background-color: #bd1717;">{{ __('mycustom.cancel') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>                      <!-- end modal -->
          

         <form method="get" action="{{route('paidInvoices')}}">
          @csrf
        
          <button type="submit" style="text-decoration: none; background-color: #198754;">{{__('mycustom.showMyPaidInvoices')}}</button>
         </form>
            
          </div>
        </div>
      </div>
      @else
      <h5 class="mt-4 mb-4" style="color: #35ace8;">{{__('mycustom.noItemsInYourCart')}}</h5>
      
          <a class="btn btn-success btn-sm"   href="{{route('paidInvoices')}}">{{__('mycustom.showMyPaidInvoices')}}</a>
            











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
<script>
document.getElementById('confirm-payment-button').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default button action
    fetch("{{ route('showConfirmPayment') }}", {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('total-pay').textContent = `{{ __('mycustom.totalPay') }} ${data.total}`;
        document.getElementById('pay-now-session-id').value = data.session_id;
        document.getElementById('cancel-session-id').value = data.session_id;
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalWallet'), {});
        myModal.show();
    })
    .catch(error => console.error('Error:', error));
});
</script>

@endsection