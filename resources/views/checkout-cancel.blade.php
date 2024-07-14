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
        
        <h1>Payment Details</h1>
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
    
    <h3> Canceled </h3>
     
    </div>
  </div>




@endsection