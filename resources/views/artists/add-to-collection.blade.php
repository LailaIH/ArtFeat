@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/edit.css')}}">

<div class="pageHeader">
      <img src="{{asset('assets/img/editprofile.png')}}" />
      <div class="overLay">
        <img src="{{asset('assets/img/shadowBlue.svg')}}" />
      </div>
      <div class="header">
        <h1>Add Artwork </h1>
      </div>
    </div>
    <div class="EditProfileSection">
    <div class="pageContent">
      <a href="{{route('artists.profile',auth()->user()->id)}}">Back to Profile</a>
      <h3>Add New Artwork To Your Collection</h3>
      <div class="outerEditProfile addNewWork">
        <div class="profile">
          <div class="content">
            <form action="{{route('artists.add_to_collection',['id'=>$collection['id']])}}" method="POST" enctype="multipart/form-data" id="image-form">
              @csrf
             <fieldset>
                <div class="grid-35">
                  <label for="name">Image Title</label>
                </div>
                <div class="grid-65">
                  <input name="name" type="text" id="name" tabindex="1" value="{{old('name')}}" required />
                @error('name')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Type -->
              <fieldset>
                <div class="grid-35">
                  <label for="type">Artwork Type</label>
                </div>
                <div class="grid-65">
                  <select name="type" id="type" tabindex="8" required class="form-select" aria-label="Default select example">
                    <option selected="selected" value="" disabled>---</option>
                    <option value="digital" @if (old('type') === 'digital') selected @endif>Digital</option>
                    <option value="installation" @if (old('type') === 'installation') selected @endif>Installation</option>
                    <option value="classic" @if (old('type') === 'classic') selected @endif>Classic</option>
                  </select>
                  @error('type')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Upload Digital Work File -->
              <fieldset>
                <div class="grid-35">
                  <label for="Type">Upload Digital Work File</label>
                </div>
                <div class="grid-65">
                  <div class="file-upload-wrapper" id="fileUploadWrapper" >
                    <input
                      id="fileUploadField"
                      name="file-upload-field"
                      type="file"
                      class="file-upload-field"
                      value=""
                    />
                  </div>
                </div>
              </fieldset>
              <!-- Artwork Category -->
              <fieldset>
                <div class="grid-35">
                  <label for="section">Artwork Category</label>
                </div>
                <div class="grid-65">
                  <select name="section_id" id="section_id" tabindex="8" class="form-select" aria-label="Default select example">
                    
                    <option selected="selected" value="" disabled {{ old('section_id') == '' ? 'selected' : '' }}>
                      Choose Category
                    </option>
                    @foreach($sections as $section)
                    <option value="{{$section->id}}" {{ old('section_id') == $section->id ? 'selected' : '' }}>{{$section->name}}</option>
                    @endforeach
                  </select>
                </div>
              </fieldset>
              <!-- Artwork provided -->
             
              <!-- Description-->
             
              <fieldset>
                <div class="grid-35">
                  <label for="Description">Description</label>
                </div>
                <div class="grid-65">
                  <textarea
                    name="description"
                    id="description"
                    cols="180"
                    rows="auto"
                    tabindex="8"
                    placeholder="Description more than 20 characters"
                    required
                  >
                  {{old('description')}}
                </textarea>
                  @error('description')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <fieldset>
                <div class="grid-35">
                  <label for="">Did you create this art piece?</label>
                </div>
                <div class="grid-65">
                  <div class="RadioButtons">
                    <div class="form">
                      <label
                        ><input type="radio" class="input-radio" name="created" value="yes" @if(old('geckoHatchling')==='yes') checked @endif  />
                        Yes</label
                      >
                      <label
                        ><input
                          type="radio"
                          class="input-radio"
                          checked
                          value="no"
                          name="created"
                          @if(old('geckoHatchling')==='no') checked @endif
                         
                        />
                        No</label
                      >
                    </div>
                  </div>
                </div>
              </fieldset>
              <!-- Date of creation -->
            
              <fieldset>
                <div class="grid-35">
                  <label for="date">Date of creation</label>
                </div>
                <div class="grid-65">
                  <input name="date" type="date" id="date" tabindex="11" required value="{{old('date')}}" />
                  @error('date')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Artwork Dimensions -->
              
              <fieldset>
                <div class="grid-35">
                  <label for="Artwork Dimensions">Artwork Dimensions</label>
                </div>
                <div class="grid-65">
                  <input
                    type="text"
                    id="dimensions"
                    name="dimensions"
                    tabindex="11"
                    required
                    value="{{old('dimensions')}}"
                  />
                  @error('dimensions')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Price -->
              <fieldset>
                <div class="grid-35">
                  <label for="price">Price</label>
                </div>
                <div class="grid-65">
                  <input name="price" type="number" id="price" tabindex="12" required value="{{old('price')}}" />
                  @error('price')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Price After Discount -->
              <fieldset>
                <div class="grid-35">
                  <label for="discount_price">Price After Discount</label>
                </div>
                <div class="grid-65">
                  <input name="discount_price" type="number" id="discount_price" tabindex="13" value="{{old('discount_price')}}" />
                  @error('discount_price')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!--Quantity -->
              <fieldset style="border-bottom: none">
                <div class="grid-35">
                  <label for="quantity">Quantity</label>
                </div>
                <div class="grid-65">
                  <input name="quantity" type="number" id="quantity" tabindex="13" value="{{old('quantity')}}" required />
                  @error('quantity')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <fieldset>
                <div class="justifyButtons">
                  <input type="button" class="Btn cancel" value="Cancel" />
                  <input type="submit" class="Btn" value="Save Changes" />
                </div>
              </fieldset>
            
          </div>
        </div>
        <div class="content">
          
            <div class="switcher">
              <div>Product Visibility</div>
              <div>
                <input name="visibility" type="checkbox" id="switch" {{ old('visibility') ? 'checked' : '' }} /><label for="switch"
                  >Toggle</label
                >
              </div>
            </div>
            <div class="imagesSection">
              <div class="file-upload-wrapper file-upload-wrapper2 mt-4 " data-text="Add New Image">
                <input
                  name="img"
                  id="img"
                  type="file"
                  class="file-upload-field"
                  value=""
                  placeholder="Add Image"
                  onchange="previewImage(event)"
                />
              
              </div>
              <div class="wrapperImages">

                @for($i=0;$i<3;$i++)
                <div class="outerImg">
                  @if(isset($products[$i]))
                  <img  class="myImg" src="{{ asset('productImages/'.$products[$i]->img) }}" alt="product img" />
                  @else
                  <img class="myImg" src="/assets/img/a2.png" alt="" />
                  @endif
                 
                </div>
                @endfor

                @error('img')
                {{$message}}
                @enderror

                <!-- new img -->
                <div class="outerImg" id="uploadedImageContainer">
               
                
            </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var imgElement = document.createElement('img');
        var buttonElement = document.createElement('button');
        var deleteImg = document.createElement('img');

        deleteImg.setAttribute('src','/assets/img/Delete.svg');
        buttonElement.setAttribute('class','delete');
        buttonElement.appendChild(deleteImg);
        
        imgElement.setAttribute('class', 'myImg');
        imgElement.setAttribute('src', reader.result);
        imgElement.setAttribute('alt', 'uploaded image');
        document.getElementById('uploadedImageContainer').appendChild(imgElement);
        document.getElementById('uploadedImageContainer').appendChild(buttonElement);

    }
    reader.readAsDataURL(event.target.files[0]);
}


</script> 

<script>
  // JavaScript to update file name in file upload wrapper
document.addEventListener("DOMContentLoaded", function () {
    var fileUploadField = document.getElementById("fileUploadField");
    var fileUploadWrapper = document.getElementById("fileUploadWrapper");

    fileUploadField.addEventListener("change", function () {
        var fileName = this.files[0].name;
        fileUploadWrapper.setAttribute("data-text", fileName);
    });
});

</script>

@endsection