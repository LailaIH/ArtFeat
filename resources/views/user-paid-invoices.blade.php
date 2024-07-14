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
        
        <h1>{{__('mycustom.invoiceDetails')}}</h1>
      </div>
    </div>
   

  

    <div class="CartDetailsSection">
    <div class="pageContent">

    @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif


    @if($invoices->isEmpty())
    <h5 class="mt-4 mb-4" style="color: #35ace8;">No Paid Invoices</h5>      
    @else              
    
    <table class="table table-hover">
      <thead>
        <tr>

        <th>{{__('mycustom.productName')}}</th>
        <th>{{__('mycustom.productPrice')}}</th>
        <th>{{__('mycustom.Quantity')}}</th>
        <th>{{__('mycustom.subtotal')}}</th>
        <th>{{__('mycustom.Image')}}</th>
        <th></th>
        <th>{{__('mycustom.paymentType')}}</th>
        <th>{{__('mycustom.PaidAt')}}</th>
       

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

        <td>
         @if($invoice->status =='paid')
          {{__('mycustom.visa')}}
         @elseif($invoice->status =='paid wallet')
         {{__('mycustom.wallet')}}
         @else 
         {{__('mycustom.unknown')}}
         @endif

        </td>
        <td style="color:blueviolet;">{{ $invoice->updated_at->format('F j, Y, g:i a') }}</td>
      </tr>
     

    @endforeach
    <tr>
      <th>{{__('mycustom.Total')}}</th>
      <td style="color: green;"><b>${{$total}}</b></td>
      </tr>
      </tbody>
     </table>


    @endif

    </div>
  </div>




@endsection