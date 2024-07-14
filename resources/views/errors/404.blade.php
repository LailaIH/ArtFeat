@extends('commonlanding2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/error.css')}}">

<div class="pageHeader">
      <img src="/assets/img/404.svg" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        <h1>Ups!...</h1>
      </div>
    </div>
    <div class="pageContent">
    @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



      <div aria-label="Breadcrumb" class="breadcrumb">
        <ul>
          <li><a href="#">ArtFeat</a></li>
          <li class=""><a href="#">{{__('mycustom.searchh')}}</a></li>
        </ul>
      </div>

      <div class="errorPage">
        <h3>{{__('mycustom.noResult')}}</h3>
        <a href="{{ route('welcome') }}"><button>{{__('mycustom.homePage')}}</button></a>
      </div>
    </div>
   
@endsection

