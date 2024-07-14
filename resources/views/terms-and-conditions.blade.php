@extends('commonlanding2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/termsAndConditions.css')}}">

    <div class="pageHeader" >
      <img src="/assets/img/termsconditions.svg" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
      @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
        <h1>{{__('mycustom.termsAndConditions')}}</h1>
      </div>
    </div>
    <div class="outerPrivacy" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="pageContent">
      <div aria-label="Breadcrumb" class="breadcrumb">
        <ul>
          <li><a href="/">ArtFeat</a></li>
          <li class=""><a href="#">{{__('mycustom.termsAndConditions')}}</a></li>
        </ul>
        
      </div>
      <p>
        <br><br><br>
        {{__('mycustom.pleaseRead')}}
      </p>
      <p>
      {{__('mycustom.yourAccess')}}
      </p>
      <p>
      {{__('mycustom.byAccessing')}}
      </p>
      <h5>{{__('mycustom.content')}}</h5>
      <p>
      {{__('mycustom.ourServiceAllow')}}
      </p>
      <h5>{{__('mycustom.intellectualProperty')}}</h5>
      <p dir="rtl">
      {{__('mycustom.theService')}}
      </p>
      <h5>{{__('mycustom.linksToWebsites')}}</h5>
      <p>
      {{__('mycustom.ourServiceMayContain')}}
      </p>
      <h5>{{__('mycustom.termination')}}</h5>
      <p>
      {{__('mycustom.weMayTerminate')}}
      </p>
      <h5>{{__('mycustom.governingLaw')}}</h5>
      <p>
      {{__('mycustom.theseTermsShall')}}
      </p>
      <h5> {{__('mycustom.changes')}}</h5>
      <p>
      {{__('mycustom.weReserve')}}
      </p>
    </div>
    </div>
@endsection