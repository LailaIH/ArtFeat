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
          <section class="Creators">
            <div class="inner">
              <div class="info">
              <div class="info"></div></div>
          <div class="users">
          @for($i=0 ; $i<5; $i++)
            @if(isset($creators[$i])) 
            <div class="user{{$i+1}}" data-bs-toggle="modal" data-bs-target="#exampleModalLongCreator{{$i}}"  >
                <img class="creatorImg" src="{{isset($creators[$i]->img) ? asset('creatorsImages/'.$creators[$i]->img) : asset('assets/img/p2.png') }}" id="profileImage" 
                    />
                <div>
                    <p>{{ __('mycustom.viewProfile')}}</p>
                </div>
            </div>

      <!-- Creators Modal -->
      <div class="modal fade" id="exampleModalLongCreator{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <!-- Vertically centered scrollable modal -->
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="artistModal1Label">{{$creators[$i]->name}}</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <style>
                                                            .close{
                                                            background-color: white;
                                                            border-radius: 20px;
                                                            border: none;
                                                            padding: 5px;
                                                            }
                                                        </style>
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if(isset($creators[$i]->img))
                                                            <img src="{{ asset('creatorsImages/'.$creators[$i]->img) }}" alt="artist" class="img-fluid"/>
                                                        @else
                                                            <img src="{{asset('\assets\img\artist.png')}}" alt="artist pic" class="img-fluid"/>
                                                        @endif                                                       
                                                        <p>{{$creators[$i]->description}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
                                                    </div>
                                                </div>
                                                </div>
                                            
                                            </div>
                                            <!-- end modal -->





            @else
            <div class="user{{$i+1}}" data-bs-target="#exampleModalLong" data-bs-toggle="modal">
                <img class="creatorImg"  src="/assets/img/p2.png" id="profileImage"  />
                <div>
                    <p>{{ __('mycustom.viewProfile')}}</p>
                </div>
            </div>

            @endif



 






            @endfor
          </div></div></section>

            <!-- <img class="mt-4 rounded-circle dirImg" src="{{asset('assets/img/kareem.jpg')}}" width="320" height="320" alt="" /> -->
          
          </div>
        </div>
      </div>


    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <!-- Vertically centered scrollable modal -->
     <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5  class="modal-title" id="artistModal1Label">Andrii Kovalyk</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <style>
                .close{
                  background-color: white;
                  border-radius: 20px;
                  border: none;
                  padding: 5px;
                }


              </style>
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <img src="/assets/img/p2.png" alt="Avatar" class="img-fluid">
            <p>Additional information about Andrii Kovalyk.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lobortis turpis. Nullam malesuada et erat ac gravida. Ut nec dui in sem consequat bibendum. Integer feugiat, arcu sit amet blandit facilisis, enim turpis fermentum lorem, a pharetra nulla felis in nunc. Cras at bibendum leo. Integer sit amet bibendum ex. Integer euismod lorem eu ligula dictum, a mollis turpis condimentum. Etiam euismod dapibus convallis. Nulla luctus posuere sem. Mauris consequat nisi sed urna tincidunt, quis ultricies purus varius. Nullam scelerisque, dolor nec congue sollicitudin, libero eros efficitur arcu, in bibendum est sapien non nisi. Quisque et efficitur sapien. Quisque gravida libero non vestibulum vestibulum. Curabitur consectetur convallis lorem et accumsan.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
        </div>
    </div>
     </div>
  
</div>
<!-- end modal -->
    

@endsection