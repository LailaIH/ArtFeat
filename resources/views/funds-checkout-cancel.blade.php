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
  
        
        <h1>Funds Details</h1>
      </div>
    </div>
  

    <div class="CartDetailsSection">
    <div class="pageContent">
    @if (session('success'))
                            <div class="alert alert-success mb-3">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger mb-3">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
    
    <h3 style="color: red;"> Funds Canceled ,currently  your wallet has ${{Auth::user()->funds}} </h3>
     
    </div>
  </div>




@endsection