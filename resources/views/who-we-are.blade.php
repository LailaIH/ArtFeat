@extends('commonlanding2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/WhoWeAre.css')}}">

    <div class="WhoWeAre" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
      <div class="WhoFirstSection row">
        <div class="Right col-lg-5">
          <div class="header">
          @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
            <h1>{{__('mycustom.whoWeAreTitle')}}</h1>
            <h3>
            {{__('mycustom.expressYour')}}
            </h3>
          </div>
          <div class="content">
            <p>
            {{__('mycustom.newlyEstablished')}}
           
            </p>
          </div>
        </div>
        <div class="LeftImages col-lg-6">
          <div>
            <img src="{{asset('assets/img/WhoWeAre1.svg')}}" alt="" />
          </div>
        </div>
      </div>
      <div class="WhoSecondSection row">
        <div class="RightImage col-lg-3">
          <div><img src="{{asset('assets/img/WhoWeAre2.svg')}}" alt="img" /></div>
        </div>
        <div class="Left col-lg-8">
          <div class="header">
            <h1>{{__('mycustom.ourValue')}}</h1>
          </div>
          <div class="content">
            <p>
            {{__('mycustom.indeedYour')}}
            </p>
            <p>
            {{__('mycustom.creativityIs')}}
            </p>

            <p>
            {{__('mycustom.weStrive')}}
            </p>
            <p>
            {{__('mycustom.theseValues')}}
            </p>

          </div>
        </div>
      </div>
      <div class="WhoFirstSection row">
        <div class="Right col-lg-6">
          <div class="header">
            <h1>{{__('mycustom.joinOurArtists')}}</h1>
          </div>
          <div class="content">
            <p>
            {{__('mycustom.joinDesc')}}
            
            </p>
          </div>
        </div>
        <div class="LeftImages col-lg-6">
          <div>
            <img src="{{asset('assets/img/WhoWeAre3.svg')}}" alt="" />
          </div>
        </div>
      </div>



      <div class="WhoSecondSection row">
        <div class="RightImage col-lg-3">
          <div class="overLay"><img src="{{asset('assets/img/supporters.jpg')}}" alt="img" /></div>
        </div>
        <div class="Left col-lg-8">
          <div class="header">
            <h3 style="margin-left: 20rem;">{{__('mycustom.supporters')}}</h3>
          </div>
        
        </div>
      </div>

      <div class="WhoFirstSection row">
        <div class="Right col-lg-5">
          <div class="header">
            <h1>{{__('mycustom.Dedication')}}</h1>
           
          </div>
          <div class="content">
            <p>
            {{__('mycustom.weDedicate')}}
            </p>
            <p>
            {{__('mycustom.weAreCommited')}}
            </p>

            <p>
            {{__('mycustom.weBelieveThat')}}
            </p>
          </div>
        </div>
        <div class="LeftImages col-lg-6">
          <div>

            <img class="mt-4 rounded-circle dirImg" src="{{asset('assets/img/kareem.jpg')}}" width="320" height="320" alt="" />
          
          </div>
        </div>
      </div>


    </div>

@endsection