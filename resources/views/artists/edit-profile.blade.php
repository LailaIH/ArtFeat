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
              <div class="row gx-3 mb-3">
              <div class="col-md-6">
              
              
                <div class="grid-35">
                  <label for="avatar">Your Photo</label>
                </div>
                <div class="grid-65">
                  <div>
                    <span class="photo" title="Upload your Avatar!" >
                    <img id="profile-image"  src="{{ asset('userImages/'.$user->img) }}" alt="Avatar" class="avatar-image  " />

                    </span>
                    <label for="img" class="btn btn-primary">
                                            Upload New Image
                                        </label>
                    <input style="display: none;" id="img" type="file" name="img" class="btn" onchange="updateProfileImage(event);" />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
              
                <div class="grid-35">
                  <label for="name">Artist Name</label>
                </div>
                <div class="grid-65">
                  <input type="text" name="name" id="name" tabindex="1" value="{{$user->name}}" />
                </div>
              </div></div>
              <fieldset>
                <div class="grid-35">
                  <label for="store_name">Store Name</label>
                </div>
                <div class="grid-65">
                  <input type="text" name="store_name" id="store_name" tabindex="2" value="{{$artist->store_name}}" />
                </div>
              </fieldset>
              <!-- Description about User -->
              <fieldset>
                <div class="grid-35">
                  <label for="description">Country</label>
                </div>
                <div class="grid-65">
                  <textarea
                    name="country"
                    id=""
                    cols="30"
                    rows="auto"
                    tabindex="3"
                  >{{$artist->country}}</textarea>
                </div>
              </fieldset>
              <!-- Location -->
              <fieldset>
                <div class="grid-35">
                  <label for="location">City</label>
                </div>
                <div class="grid-65">
                  <input name="city" type="text" id="location" tabindex="4" value="{{$artist->city}}" />
                </div>
              </fieldset>
              <!-- Artwork provided -->
              <fieldset>
                <div class="grid-35 ">
                  <label for="forHire ">Artwork provided</label>
                </div>
                <div class="grid-65 ">
                  <div class="justifyButtons">
                    
                    <button class="btn btn-outline-secondary ">
                        Photography
                    </button>
                    <button class="btn btn-outline-secondary">Portrait</button>
                  </div>
                </div>
              </fieldset>
              <!-- Language -->
              <fieldset>
                <div class="grid-35">
                  <label for="Language">Language</label>
                </div>
                <div class="grid-65">
                  <select name="language" id="language" tabindex="8">
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
                  <label for="Facebook">Facebook</label>
                </div>
                <div class="grid-65">
                  <input name="facebook" value="{{$artist->facebook}}" type="Facebook" id="position" tabindex="11" />
                </div>
              </fieldset>
              <!-- Instagram URL -->
              <fieldset>
                <div class="grid-35">
                  <label for="Instagram">Instagram</label>
                </div>
                <div class="grid-65">
                  <input type="text" name="instagram" value="{{$artist->instagram}}" id="Instagram" tabindex="12" />
                </div>
              </fieldset>
              <!-- Tiktok URL -->
              <fieldset>
                <div class="grid-35">
                  <label for="Tiktok">Tiktok</label>
                </div>
                <div class="grid-65">
                  <input type="text" name="tiktok" value="{{$artist->tiktok}}" id="Tiktok" tabindex="13" />
                </div>
              </fieldset>
              <!-- Website URL -->
              <fieldset style="border-bottom: none">
                <div class="grid-35">
                  <label for="Twitter">Twitter</label>
                </div>
                <div class="grid-65">
                  <input type="text" name="twitter" value="{{$artist->twitter}}" id="Twitter" tabindex="13" />
                </div>
              </fieldset>
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

@endsection