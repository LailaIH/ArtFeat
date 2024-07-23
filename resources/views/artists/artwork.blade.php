@extends('commonlanding2')
@section('content')
    <div class="pageHeader">
      <img src="/assets/img/editprofile.png" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        <h1>{{ __('mycustom.artworkDetails') }}</h1>
      </div>
    </div>
    <div class="pageContent">
      <div class="cartInfoSection">
        <div class="wrapperImages">
          <div class="image-grid">

          @if(count($images)>0)
          <div class="scroll">
            @php $i=0; @endphp 

            @foreach($images as $image)

              <div>
                <img @if($i == 0) 
                    style="background-size: cover"
                    @endif
                 
                  src="{{asset('productImages/'.$image)}}"
                  alt="Image 1"
                />
              </div> 
              @php
              $i++
               @endphp
              
              @endforeach

          
            
              
            </div>
           
            
            @endif


           



            
            <div class="BigImg">
              <img src="{{ asset('productImages/'.$product->img) }}" alt="Image 3" />
            </div>
          </div>
        </div>
        <div class="moreDetails">
          <div class="header">
            @if(Auth::user() && $product->artist_id === auth()->user()->id && $product->auction==null)
                    @php
                        $notification1 = DB::table('notifications')->where('user_id',auth()->user()->id)->where('type','add artwork to auctions')
                        ->where('product_id',$product->id)
                        ->where('status','pending')
                        ->orderBy('created_at', 'desc') // Order by 'created_at' in descending order
                        ->first();

                        $notification2 = DB::table('notifications')->where('user_id',auth()->user()->id)->where('type','add artwork to auctions')
                        ->where('product_id',$product->id)
                        ->where('status','rejected')
                        ->orderBy('created_at', 'desc') // Order by 'created_at' in descending order
                        ->first();

                        $existedNotification = DB::table('notifications')->where('user_id',auth()->user()->id)->where('type','add artwork to auctions')
                        ->where('product_id',$product->id)->first();


                    @endphp
                    @if($notification1) 
                       <p style=" padding-top: 10px;">{{__('mycustom.waitingForApproval')}}</p>
                    @elseif ($notification2 || !$existedNotification)
                     

                       <button id="addToAuctionButton" class="detailsButton">{{__('mycustom.addToAuctions')}}</button>
                    @endif
            @endif
         

            @php
            $favorite = DB::table('favorites')->where('user_id',auth()->user()->id)->where('product_id',$product->id)->first();

            @endphp
            @if(!$favorite)
            <form method="post" action="{{route('addToFavorites',$product->id)}}">
              @csrf
            <button type="submit" class="detailsButton">{{__('mycustom.addToFavorites')}}</button>
            </form>

            @else 
            <form method="post" action="{{route('removeFromFavorites',$product->id)}}">
              @csrf
              @method('delete')
             <button type="submit" class="detailsButton">{{__('mycustom.removeFromFav')}}</button>
            </form>
            @endif

        </div>
          <div class="divider"></div>
          <div class="primaryInfo">
            <h1>{{$product->name}}</h1>
            @if(isset($product->section_id))
            <h3>{{$product->section->name}}</h3>
            @else 
            <h3>{{ __('mycustom.productCategory') }}</h3>
            @endif
            <div class="owner">
                @if($product->artist->img !=null && $product->artist->img!='' )
              <img src="{{asset('userImages/'.$product->artist->img)}}" alt="s" />
              @else 
              <img src="/assets/img/artist.png" alt="s" />
              @endif
              <p>{{ __('mycustom.by') }}<span> {{$product->artist->name}}</span></p>
            </div>
          </div>
          <div class="divider"></div>
          <div class="regularPrice">
            <p>{{ __('mycustom.regularPrice') }} $<span>{{$product->price}}</span></p>
            <p><span>20</span>% {{ __('mycustom.off') }} <span> {{ __('mycustom.saleEnds') }}</span></p>
          </div>
          <div class="addToCart">
            <p class="price">$ <span>{{$product->price}}</span></p>
            @auth
                <form method="post" action="{{route('logged_add_to_cart',['id'=>$product['id']])}}" >
                    @csrf
                                            
                    <button type="submit">{{ __('mycustom.addToCart')}}</button></form>

            @else

                <form method="post" action="{{route('non_logged_add_to_cart',['id'=>$product['id']])}}" >
                    @csrf
                                           
                    <button>{{ __('mycustom.addToCart')}}</button></form>

            @endauth
           </div>
          <div class="productDetails">
            <p>{{__('mycustom.productDetails')}}</p>
            <div class="card">
              <div>
                <p>{{__('mycustom.sizeOfArtwork')}}</p>
                @if(isset($product->artwork_dimensions))
                <div class="info">{{$product->artwork_dimensions}}</div>
                @else 
                <div class="info">{{__('mycustom.unknown')}}</div>
                @endif 
              </div>
              <div>
                <p>{{__('mycustom.creationDate')}}</p>
                @if(isset($product->creation_date))
                <div class="info">{{ \Carbon\Carbon::parse($product->creation_date)->format('F j, Y') }}</div> <!-- Formatted Date -->
                @else 
                <div class="info">{{__('mycustom.unknown')}}</div>
                @endif
              </div>
             
            </div>
          </div>
          <div class="discription">
            <p>{{__('mycustom.productDescription')}}</p>
            <p>
              @if(isset($product->description))
              {{$product->description}}
              @else 
              Zion National Park framed print by Michael Zheng. Bring your print to life
              with hundreds of different frame and mat combinations. Our framing staff
              and delivered "ready to hang" with pre-attached hanging wire, mounting hooks,
              and nails.
              @endif
            </p>
          </div>
        </div>
      </div>


      <div class="Categories" style="margin-top: 5rem;">
        @if(count($randomProducts)>0)
             @foreach($randomProducts as $randomProduct)
             <a style="text-decoration: none;" href="{{route('artists.artwork',$randomProduct->id)}}">
            <div class="card">
                <div class="overlay">
                        @if($randomProduct->img)
                            <img src="{{ asset('productImages/' . $randomProduct->img) }}" alt="section pic"/>

                            @else
                            <img src="{{asset('assets\img\sculptures.jpg')}}" alt="artist pic"/>
                            @endif
                    <div class="OverLay2">
                        <p class="Content">{{$randomProduct->name}}</p>
                    </div>
                </div>
            </div></a>

            @endforeach

        @else
        <h6>{{__('mycustom.noArtworkYet')}}</h6>
        @endif
    </div>














    </div>

    <form id="addToAuctionForm" method="get" action="{{route('artists.askToAddToAuction',$product->id)}}">
    @csrf 
  </form>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('addToAuctionButton').addEventListener('click', function (event) {
            event.preventDefault();
            // Submit the hidden form
            document.getElementById('addToAuctionForm').submit();
        });
    });
</script>  
@endsection