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
    
    <h3> Failed </h3>
     
    </div>
  </div>




@endsection