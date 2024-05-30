@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/edit.css')}}">
<div class="pageHeader">
      <img src="/assets/img/editprofile.png" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        <h1>{{__('mycustom.addNewCollection')}}</h1>
      </div>
    </div>
    <div class="EditProfileSection">

    <div class="pageContent">
      <div>
      <a href="{{route('artists.profile',['id'=>auth()->user()->id])}}"> {{__('mycustom.backToProfile')}}</a>
      </div> <br>
      <h3>{{__('mycustom.yourCollectionDetails')}}</h3>
      <div class="outerEditProfile" style="justify-content: center;
        align-items: center;">
        <div class="profile">
          <div class="content">
            <form  action="{{route('artists.add_collection',['id'=>auth()->user()->id] )}}" method="POST">
              @csrf
              
                <div>
                  <label for="name">{{__('mycustom.collectionName')}}</label>
                  <input style="width:300px; margin-left:20px;" type="text" name="name" id="name" tabindex="1" value="{{old('name')}}" />
                  @error('name')
                      {{$message}}
                  @enderror
                </div>

            
              <fieldset>
                <div class="justifyButtons ">
                  <input type="button" class="Btn cancel" value="{{__('mycustom.cancel')}}" />
                  <input type="submit" class="Btn " value="{{__('mycustom.createCollection')}}" />
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>




@endsection