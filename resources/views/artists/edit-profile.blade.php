@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/edit.css')}}">
<div class="pageHeader">
      <img src="/assets/img/editprofile.png" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
        <h1>Profile Details</h1>
      </div>
    </div>
    <div class="EditProfileSection">

    <div class="pageContent">
      <div>
      <a href="{{route('artists.profile',['id'=>$user->id])}}"> < Back to Profile</a>
      </div> <br>
      <h3>Your Profile Details</h3>
      <div class="outerEditProfile">
        <div class="profile">
          <div class="content">
            <form action="{{route('artists.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data" id="image-form">
              @csrf
              @method('PUT')
              <!-- Photo -->
              <div class="row gx-3 mb-3 mydiv">
              <div class="col-md-6">
              
              
                <div class="ddd">
                  <label for="avatar">Your Photo</label>
               
                  
                    <span class="photo" title="Upload your Avatar!" >
                    <img id="profile-image"  src="{{ asset('userImages/'.$user->img) }}" alt="Avatar" class="avatar-image  " />

                    </span></div>
                    <label for="img" class="btn btn-primary">
                                            Upload New Image
                                        </label>
                    <input style="display: none;" id="img" type="file" name="img" class="btn" onchange="updateProfileImage(event);" />
               
                
              </div>
              <div class="col-md-6">
              
                <fieldset>
                  
                  <label  for="name">Artist Name</label>
                
                
                  <input type="text" name="name" id="name" tabindex="1" value="{{$user->name}}" />
                  
                </fieldset>
              </div></div>
              <div class="row gx-3 mb-3 ">
              <div class="col-6">
              <fieldset class="mydiv">
              
                  <label for="store_name">Store </label>
             
                  <input type="text" name="store_name" id="store_name" tabindex="2" value="{{$artist->store_name}}" />
              
              </fieldset></div>
              <!-- Description about User -->
              <div class="col-6">
              <fieldset>
               
                  <label for="description">Country</label>
                
                  <input
                    name="country"
                    id=""
                    cols="30"
                    rows="auto"
                    tabindex="3"
                    value="{{$artist->country}}"
                  />
               
              </fieldset></div></div>
              <!-- Location -->
              <div class="row gx-3 mb-3 ">
              <div class="col-md-6">
              <fieldset>
                
                  <label for="location">City</label>
               
                  <input name="city" type="text" id="location" tabindex="4" value="{{$artist->city}}" />
                
              </fieldset></div>
              <!-- Artwork provided -->
              
              <div class="col-md-6">
              <fieldset>
                
                  <label for="forHire ">Artwork provided</label>
                
                
                  <div class="justifyButtons ">

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
                
              </fieldset></div></div>
              <!-- Language -->
              
              <fieldset>
                
                  <label class="me-5" for="Language">Language</label>
                
                  <select class="form-select" name="language" id="language" tabindex="8">
                    <option selected="selected" value="---" disabled>
                      ---
                    </option>
                    <option value="english" {{ $artist->language == 'english' ? 'selected' : '' }}>English</option>
                    <option value="arabic" {{ $artist->language == 'arabic' ? 'selected' : '' }}>Arabic</option>
                  </select>
                
              </fieldset>
              <!-- Facebook URL -->
              <div class="row gx-3 mb-3 mydiv">
              <div class="col-md-6">
              <fieldset>
                
                  <label for="Facebook">Facebook</label>
                
                  <input name="facebook" value="{{$artist->facebook}}" type="Facebook" id="position" tabindex="11" />
                
              </fieldset></div>

              <!-- Instagram URL -->
              <div class="col-md-6">
              <fieldset>
                
                  <label for="Instagram">Instagram</label>
               
                  <input type="text" name="instagram" value="{{$artist->instagram}}" id="Instagram" tabindex="12" />
                
              </fieldset></div></div>
              <!-- Tiktok URL -->
              <div class="row gx-3 mb-3 mydiv">
              <div class="col-md-6">
              <fieldset>
                
                  <label for="Tiktok">Tiktok</label>
                
                  <input type="text" name="tiktok" value="{{$artist->tiktok}}" id="Tiktok" tabindex="13" />
                
              </fieldset></div>
              <!-- Website URL -->
              <div class="col-md-6">
              <fieldset style="border-bottom: none">
                
                  <label for="Twitter">Twitter</label>
                
                  <input type="text" name="twitter" value="{{$artist->twitter}}" id="Twitter" tabindex="14" />
                
              </fieldset></div></div>


              <div class="row gx-3 mb-3 mydiv">
              <div class="col-md-6">
              <fieldset>
                
                  <label for="website">Website</label>
                
                  <input name="website" value="{{$artist->website}}" type="text" id="website" tabindex="15" />
                
              </fieldset></div>

              <!-- Instagram URL -->
              <div class="col-md-6">
              <fieldset>
                
                  <label for="behance">Behance</label>
               
                  <input type="text" name="behance" value="{{$artist->behance}}" id="behance" tabindex="16" />
                
              </fieldset></div></div>




              <fieldset>
                <div class="justifyButtons">
                  <input type="button" class="Btn cancel" value="Cancel" />
                  <input type="submit" class="Btn" value="Save Changes" />
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