@extends('commonlanding2')
@section('content')

@if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif

@if($carts->isEmpty())
    <h5 class="mt-4 p-5" style="color: #35ace8; margin-bottom:4rem;">{{__('mycustom.noItemsInYourCart')}}</h5>
@else
<section class="CategoriesSection" style="margin-bottom:150px;">
        
    <h1>{{ __('mycustom.yourCartItems')}}</h1>
    <div class="Categories" style="gap:10px;">
    @foreach($carts as $cart)
       
        <div class="card mt-5" >
           
            @if($cart->product->img)
                <img src="{{ asset('productImages/' . $cart->product->img) }}" alt="product pic"/>
                <p> {{ __('mycustom.price')}}: {{$cart->product->price}}$ {{ __('mycustom.quantity')}}:{{$cart->quantity}} {{ __('mycustom.total')}}: {{$cart->product->price*$cart->quantity}}</p>
                @else
                <img src="{{asset('assets\img\a1.png')}}" alt="artist pic"/>
                <p>{{$cart->product->name}} : {{$cart->product->price}}$</p>
                @endif
               <div class="OverLay2">
          
               <p class="Content">{{$cart->product->name}}</p>

        </div>
        
        </div>
        @endforeach

        </div>

       
  
</section>
<div class="m-5 p-5">
<h4  style="color: green;">{{ __('mycustom.totalPay')}}{{$total}}</h4>

<form class="mt-3" method="get" action="{{route('payWithWallet')}}">
  @csrf 
    <input name="session_id" type="hidden" value="{{$session_id}}"/>
    <button class="btn btn-success" type="submit">{{ __('mycustom.payNow')}}</button>
</form>

<form class="mt-3" method="get" action="{{route('cancelWallet')}}">
  @csrf 
    <input name="session_id" type="hidden" value="{{$session_id}}"/>
    <button class="btn btn-danger" type="submit">{{ __('mycustom.cancel')}}</button>
</form>


</div>


@endif

@endsection