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
        
        <h1>Invoice Details</h1>
      </div>
    </div>
  

    <div class="CartDetailsSection">
    <div class="pageContent">

    @if (session('success'))
                            <div class="alert alert-success mb-2">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger mb-2">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
    
    <table class="table table-hover">
      <thead>
        <tr>

        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th>Sub Total</th>
        <th>Image</th>
       

        </tr>
        
        
      </thead>

      <tbody>
    @foreach($products as $product)

      <tr>


        <td>{{$product['name']}}</td>
        <td style="color: green;"><b>${{$product['price']}}</b></td>
        <td>{{$product['quantity']}}</td>
        <td style="color: green;"><b>${{$product['invoice']}}</b></td>
        <td>
        @if(isset($product['image']))
                  <img src="{{ asset('productImages/'.$product['image']) }}" alt="Product Picture" width="60" height="60">
        @else
                  <img src="{{ asset('assets/img/a4.png') }}" alt="Product Picture" width="60" height="60">
        @endif

        </td>
      </tr>
     

    @endforeach
    <tr>
      <th>Total</th>
      <td style="color: green;"><b>${{$total}}</b></td>
      </tr>
      </tbody>
     </table>


    </div>
  </div>




@endsection