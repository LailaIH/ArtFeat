@extends('commonlanding2')
@section('content')

<div class="pageHeader">
      <img src="/assets/img/editprofile.png" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        <h1>{{__('mycustom.profileDetails')}}</h1>
      </div>
    </div>
    <div class="EditProfileSection">

    <div class="pageContent">
      <a style="text-decoration: none; color:black;" href="{{route('artists.profile',auth()->user()->id)}}">
      {{__('mycustom.backToProfile')}}</a>     
      <h3>{{__('mycustom.yourProfileDetails')}}</h3>
      <div class="outerEditProfile">
        <div class="profile">
          <div class="content">
            <form action="{{route('artists.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data" id="image-form">
              @csrf
              @method('PUT')
              <!-- Photo -->
              <fieldset>
                <div class="grid-35">
                  <label for="avatar">{{__('mycustom.yourPhoto')}}</label>
                </div>
                <div class="grid-65">
                  <div>
                  
                    <span class="photo" title="Upload your Avatar!"  >
                  @if(isset($user->img))
                    <img id="profile-image"  src="{{ asset('userImages/'.$user->img) }}" alt="Avatar" class="avatar-image  " />
                  @else
                    <img id="profile-image"  src="{{ asset('assets/img/noprofile.png') }}" alt="Avatar" class="avatar-image  " />
                  @endif
                    </span>
                    <label for="img" class="btn btn-primary text-white">
                    {{__('mycustom.uploadNewImage')}}
                                        </label>
                    <input style="display: none;" id="img" type="file" name="img" class="btn" onchange="updateProfileImage(event);" />
                  </div>
                
              </div>
              </fieldset>
              <fieldset>
              <div class="grid-35">
                  
                  <label  for="name">{{__('mycustom.artistName')}}</label>
              </div>

                <div class="grid-65">
                  <input placeholder="name" type="text" name="name" id="name" tabindex="1" value="{{$user->name}}" />
                </div>
                </fieldset>
             
           
                <fieldset>
                <div class="grid-35">
              
                  <label for="store_name">{{__('mycustom.store')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="store name"  type="text" name="store_name" id="store_name" tabindex="2" value="{{$artist->store_name}}" />
                </div>
              </fieldset>
              <!-- Description about User -->
              <fieldset>
              <div class="grid-35">
               
                  <label for="description">{{__('mycustom.country')}}</label>
              </div>
              <div class="grid-65">
                  <input
                    name="country"
                    placeholder="country"
                    id=""
                    cols="30"
                    rows="auto"
                    tabindex="3"
                    value="{{$artist->country}}"
                  />
              </div>
               
              </fieldset>
              <!-- Location -->
              <fieldset>
                <div class="grid-35">
                
                  <label for="location">{{__('mycustom.city')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="city" name="city" type="text" id="location" tabindex="4" value="{{$artist->city}}" />
                </div>
              </fieldset>
              <!-- Artwork provided -->
              
              <fieldset>
                <div class="grid-35">
                
                  <label for="forHire ">{{__('mycustom.artworkProvided')}}</label>
                </div>
                
                <div class="grid-65">
                <div class="justifyButtons">

                  <!-- Hidden input to store the selected artwork ID -->
                  <input type="hidden" name="artwork_provided_id" id="artwork_provided_id" value="{{ $artist->artwork_provided_id }}">

                  @foreach($artworksProvided as $artwork)
                      @if($artist->artwork_provided_id === $artwork->id)
                          <button type="button" class="btn btn-secondary artwork-button" data-id="{{ $artwork->id }}">
                              {{ $artwork->name }}
                          </button>
                      @else
                          <button type="button" class="btn btn-outline-secondary artwork-button" data-id="{{ $artwork->id }}">
                              {{ $artwork->name }}
                          </button>
                      @endif
                  @endforeach

                  </div>
                </div>
                
              </fieldset>
              <!-- Language -->
              
              <fieldset>
              <div class="grid-35">
                
                  <label class="me-5" for="Language">{{__('mycustom.language')}}</label>
              </div>
              <div class="grid-65">
                  <select class="form-select" name="language" id="language" tabindex="8">
                    <option selected="selected" value="---" disabled>
                      ---
                    </option>
                    <option value="english" {{ $artist->language == 'english' ? 'selected' : '' }}>English</option>
                    <option value="arabic" {{ $artist->language == 'arabic' ? 'selected' : '' }}>Arabic</option>
                  </select>
              </div>
              </fieldset>
              <!-- Facebook URL -->
              <fieldset>
              <div class="grid-35">
                
                  <label for="Facebook">{{__('mycustom.facebook')}}</label>
              </div>
              <div class="grid-65">
                  <input placeholder="facebook" name="facebook" value="{{$artist->facebook}}" type="Facebook" id="position" tabindex="11" />
                </div>
              </fieldset>

              <!-- Instagram URL -->
              <fieldset>
                <div class="grid-35">
                
                  <label for="Instagram">{{__('mycustom.instagram')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="instagram" type="text" name="instagram" value="{{$artist->instagram}}" id="Instagram" tabindex="12" />
                </div>
              </fieldset>
              <!-- Tiktok URL -->
              <fieldset>
              <div class="grid-35">
                
                  <label for="Tiktok">{{__('mycustom.tiktok')}}</label>
              </div>
              <div class="grid-65">
                  <input placeholder="tiktok" type="text" name="tiktok" value="{{$artist->tiktok}}" id="Tiktok" tabindex="13" />
              </div>
              </fieldset>
              <!-- Website URL -->
              <fieldset style="border-bottom: none">
                <div class="grid-35">
                
                  <label for="Twitter">{{__('mycustom.twitter')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="twitter" type="text" name="twitter" value="{{$artist->twitter}}" id="Twitter" tabindex="14" />
                </div>
              </fieldset>


              <fieldset>
              <div class="grid-35">
                
                  <label for="website">{{__('mycustom.website')}}</label>
              </div>
              <div class="grid-65">
                  <input placeholder="website" name="website" value="{{$artist->website}}" type="text" id="website" tabindex="15" />
              </div>
              </fieldset>

              <!-- Instagram URL -->
              <fieldset>
              <div class="grid-35">
                  <label for="behance">{{__('mycustom.behance')}}</label>
              </div>
              <div class="grid-65">
                  <input placeholder="behance" type="text" name="behance" value="{{$artist->behance}}" id="behance" tabindex="16" />
              </div>
              </fieldset>




              <fieldset>
                <div class="justifyButtons">
                <a href="{{route('artists.profile',auth()->user()->id)}}"> <input type="button" class="Btn cancel" value="{{__('mycustom.cancel')}}" /></a>
                  <input type="submit" class="Btn" value="{{__('mycustom.saveChanges')}}" />
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>


<script>
    function updateProfileImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profile-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Submit form after selecting image
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.artwork-button');
        const hiddenInput = document.getElementById('artwork_provided_id');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                // Remove 'btn-secondary' class from all buttons and add 'btn-outline-secondary'
                buttons.forEach(btn => {
                    btn.classList.remove('btn-secondary');
                    btn.classList.add('btn-outline-secondary');
                });

                // Add 'btn-secondary' class to the clicked button and remove 'btn-outline-secondary'
                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-secondary');

                // Update the hidden input value with the selected artwork ID
                hiddenInput.value = this.getAttribute('data-id');
            });
        });
    });
</script>

@endsection