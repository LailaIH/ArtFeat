@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/edit.css')}}">
<div class="pageHeader">
      <img src="/assets/img/editprofile.png" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        <h1>Add New Collection</h1>
      </div>
    </div>
    <div class="EditProfileSection">

    <div class="pageContent">
      <div>
      <a href="{{route('artists.profile',['id'=>auth()->user()->id])}}"> < Back to Profile</a>
      </div> <br>
      <h3>Your Collection Details</h3>
      <div class="outerEditProfile" style="justify-content: center;
        align-items: center;">
        <div class="profile">
          <div class="content">
            <form  action="{{route('artists.add_collection',['id'=>auth()->user()->id] )}}" method="POST">
              @csrf
              
                <div>
                  <label for="name">Collection Name</label>
                  <input style="width:300px; margin-left:20px;" type="text" name="name" id="name" tabindex="1" value="{{old('name')}}" />
                  @error('name')
                      {{$message}}
                  @enderror
                </div>

            
              <fieldset>
                <div class="justifyButtons ">
                  <input type="button" class="Btn cancel" value="Cancel" />
                  <input type="submit" class="Btn " value="Create Collection" />
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>




@endsection