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
        
        <h1>Invoice Details</h1>
      </div>
    </div>
   

  

    <div class="CartDetailsSection">
    <div class="pageContent">

    @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif


    @if($invoices->isEmpty())
    <h5 class="mt-4 mb-4" style="color: #35ace8;">No Paid Invoices</h5>      
    @else              
    
    <table class="table table-hover">
      <thead>
        <tr>

        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th>Sub Total</th>
        <th>Image</th>
        <th></th>
        <th>Paid At</th>
       

        </tr>
        
        
      </thead>

      <tbody>
    @foreach($invoices as $invoice)

      <tr>


        <td>{{$invoice->order->product->name}}</td>

        <td style="color: green;"><b>${{$invoice->order->product->price}}</b></td>

        <td>{{$invoice->total_price / $invoice->order->product->price}}</td>

        <td style="color: green;"><b>${{$invoice->total_price}}</b></td>
        <td>
        @if(isset($invoice->order->product->img))
                  <img src="{{ asset('productImages/'.$invoice->order->product->img) }}" alt="Product Picture" width="60" height="60">
        @else
                  <img src="{{ asset('assets/img/a4.png') }}" alt="Product Picture" width="60" height="60">
        @endif

        </td>
        <td></td>
        <td style="color:blueviolet;">{{ $invoice->updated_at->format('F j, Y, g:i a') }}</td>
      </tr>
     

    @endforeach
    <tr>
      <th>Total</th>
      <td style="color: green;"><b>${{$total}}</b></td>
      </tr>
      </tbody>
     </table>


    @endif

    </div>
  </div>




@endsection