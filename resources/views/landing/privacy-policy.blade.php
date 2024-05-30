@extends('commonlanding')
@section('content')
    <div class="pageHeader">
      <img src="/assets/img/termsconditions.svg" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        <h1>{{__('mycustom.privacyPolicy')}}</h1>
      </div>
    </div>
    <div class="outerPrivacy" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="pageContent">
      <div aria-label="Breadcrumb" class="breadcrumb">
        <ul>
          <li><a href="../index.html">ArtFeat</a></li>
          <li class="active">{{__('mycustom.privacyPolicy')}}</li>
        </ul>
      </div>

      <p>
      {{__('mycustom.usWeOrOur')}}
      </p>
      <p>
      {{__('mycustom.thisPage')}}
      </p>
      <p>
      {{__('mycustom.weWillNot')}}
      </p>
      <p>
      {{__('mycustom.weUseYour')}}
      </p>

      <h5>{{__('mycustom.infoCollection')}}</h5>
      <p>
      {{__('mycustom.whileUsingOur')}}
      </p>
      <h5>{{__('mycustom.cookies')}}</h5>
      <p>
      {{__('mycustom.cookiesAreFiles')}}
      </p>
      <h5>{{__('mycustom.logData')}}</h5>
      <p>
      {{__('mycustom.weCollectInfo')}}
      </p>
      <h5>{{__('mycustom.serviceProvider')}}</h5>
      <p>
      {{__('mycustom.weMayEmploy')}}
      </p>
      <ul>
        <li>{{__('mycustom.toFacilitate')}}</li>
        <li>{{__('mycustom.toProvide')}}</li>
        <li>{{__('mycustom.toPerform')}}</li>
        <li>{{__('mycustom.toAssist')}}</li>
      </ul>
      <p>
      {{__('mycustom.weWantToInform')}}
      </p>
      <h5>{{__('mycustom.security')}}</h5>
      <p>
      {{__('mycustom.theSecurityOfYourPersonal')}}
      </p>

  
      <h5>{{__('mycustom.otherSites')}}</h5>
      <p>
      {{__('mycustom.ourServiceMayContainLinks')}}
      </p>

      <h5>{{__('mycustom.childrenPrivacy')}}</h5>
      <p>
      {{__('mycustom.ourServiceDoesnt')}}
      </p>
      <h5>{{__('mycustom.changesToThis')}}</h5>
      <p>
      {{__('mycustom.weMayUpdate')}}
      </p>
      <h5>{{__('mycustom.contactUs')}}</h5>
      <p>
      {{__('mycustom.ifYouHaveAnyQuestions')}}      </p>
      <ul>
        <li>{{__('mycustom.byEmail')}}</li>
        <li>{{__('mycustom.byVisitingThisPage')}}</li>
      </ul>
    </div>
  </div>

<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"
></script>

@endsection