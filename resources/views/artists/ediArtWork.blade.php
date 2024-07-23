@extends('commonlanding2')
@section('content')




<div class="pageHeader">
      <img src="{{asset('assets/img/editprofile.png')}}" />
      <div class="overLay">
        <img src="{{asset('assets/img/shadowBlue.svg')}}" />
      </div>
      <div class="header">
        <h1>{{__('mycustom.EditArtwork')}}</h1>
      </div>
    </div>
    <div class="EditProfileSection" >
    <div class="pageContent">
    @if ($errors->has('fail'))
    <div class="alert alert-danger">
           {{ $errors->first('fail') }}
      </div>
 @endif 
 <a style="text-decoration: none; color:black;" href="{{route('artists.profile',auth()->user()->id)}}">
 {{__('mycustom.backToProfile')}}</a> 
       <h3>{{__('mycustom.EditArtwork')}}</h3>
      <div class="outerEditProfile addNewWork" >
        <div class="profile">
          <div class="content">
            <form action="{{route('artists.updateArtWork',['id'=>$product['id']])}}" method="POST" enctype="multipart/form-data" id="image-form">
              @csrf
              @method('PUT')
             <fieldset>
                <div class="grid-35">
                  <label for="name">{{__('mycustom.imgTitle')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="Name" name="name" type="text" id="name" tabindex="1" value="{{$product->name}}" required />
                @error('name')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Type -->
              <fieldset>
                <div class="grid-35">
                  <label for="type">{{__('mycustom.artworkType')}}</label>
                </div>
                <div class="grid-65">
                <select name="artwork_type" id="artwork_type" tabindex="8"  class="form-select" aria-label="Default select example" dir="ltr">
                                    <option selected="selected" value="" disabled>---</option>
                                    <option value="digital" @if ($product->artwork_type === 'digital') selected @endif>Digital</option>
                                    <option value="installation" @if ($product->artwork_type === 'installation') selected @endif>Installation</option>
                                    <option value="classic" @if ($product->artwork_type === 'classic') selected @endif>Classic</option>
                </select>
                 
                </div>
              </fieldset>
              <!-- Upload Digital Work File -->
              <fieldset>
                <div class="grid-35">
                  <label for="Type">{{__('mycustom.uploadDigital')}}</label>
                </div>
                <div class="grid-65">
                  <div class="file-upload-wrapper" id="fileUploadWrapper" >
                    <input
                      id="fileUploadField"
                      name="file-upload-field"
                      type="file"
                      class="file-upload-field"
                      value="$product->digital_work_file"
                      
                     
                    />
                  </div>
                </div>
              </fieldset>
              <!-- Artwork Category -->
              <fieldset>
                <div class="grid-35">
                  <label for="section">{{__('mycustom.artworkCategory')}}</label>
                </div>
                <div class="grid-65">
                  <select name="section_id" id="section_id" tabindex="8" class="form-select" aria-label="Default select example" dir="ltr" >
                    
                    <option  selected="selected" value="" disabled {{ old('section_id') == '' ? 'selected' : '' }}>
                   
                    </option>
                    @foreach($sections as $section)
                    <option value="{{$section->id}}" {{ $product->section_id== $section->id ? 'selected' : '' }}>{{$section->name}}</option>
                    @endforeach
                  </select>
                </div>
              </fieldset>
              <!-- Artwork provided -->
             
              <!-- Description-->
             
              <fieldset>
                <div class="grid-35">
                  <label for="Description">{{__('mycustom.description')}}</label>
                </div>
                <div class="grid-65">
                  <textarea
                    name="description"
                    id="description"
                    cols="180"
                    rows="auto"
                    tabindex="8"
                    placeholder="{{__('mycustom.description')}}"
                    required
                  >{{$product->description}}</textarea>
                  
                  
                
                  @error('description')
                {{$message}}
                @enderror
                </div>
              </fieldset>
            
              <!-- Date of creation -->
            
              <fieldset>
                <div class="grid-35">
                  <label for="date">{{__('mycustom.dateOfCreation')}}</label>
                </div>
                <div class="grid-65">
                  <input name="creation_date" type="date" id="creation_date" tabindex="11"  value="{{$product->creation_date}}" />
                  @error('creation_date')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Artwork Dimensions -->
              
              <fieldset>
                <div class="grid-35">
                  <label for="artwork_dimensions">{{__('mycustom.artworkDimensions')}}</label>
                </div>
                <div class="grid-65">
                  <input
                    type="text"
                    id="artwork_dimensions"
                    name="artwork_dimensions"
                    tabindex="11"
                    required
                    value="{{$product->artwork_dimensions}}"
                    placeholder="{{__('mycustom.artworkDimensions')}}"
                  />
                  @error('artwork_dimensions')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Price -->
              <fieldset>
                <div class="grid-35">
                  <label for="price">{{__('mycustom.price')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="{{__('mycustom.price')}} $" name="price" type="number" id="price" tabindex="12" required value="{{$product->price}}" />
                  @error('price')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!-- Price After Discount -->
              <fieldset>
                <div class="grid-35">
                  <label for="discount_price">{{__('mycustom.priceAfterDiscount')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="{{__('mycustom.priceAfterDiscount')}}" name="price_after_discount" type="number" id="price_after_discount" tabindex="13" value="{{$product->price_after_discount}}" />
                  @error('price_after_discount')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <!--Quantity -->
              <fieldset style="border-bottom: none">
                <div class="grid-35">
                  <label for="quantity">{{__('mycustom.quantity')}}</label>
                </div>
                <div class="grid-65">
                  <input placeholder="{{__('mycustom.quantity')}}" name="stock_quantity" type="number" id="stock_quantity" tabindex="13" value="{{$product->stock_quantity}}" required />
                  @error('stock_quantity')
                {{$message}}
                @enderror
                </div>
              </fieldset>
              <fieldset>
                <div class="justifyButtons">
                <a href="{{route('artists.profile',auth()->user()->id)}}"><input type="button" class="Btn cancel" value="{{__('mycustom.cancel')}}" /></a>
                  <input type="submit" class="Btn" value="{{__('mycustom.saveChanges')}}" />
                </div>
              </fieldset>
          
            
          </div>
        </div>
        <div class="content">
          
         
            <div class="imagesSection">
              <div class="file-upload-wrapper file-upload-wrapper2 " data-text="{{__('mycustom.addNewImage')}}">
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
              <div class="container">
                 <div class="image-wrapper big" id="uploadedImageContainer">
                   
                    <img src="{{asset('productImages/'.$product->img)}}"  id="bigImage">

                    </div>
                    
                   
                    
                 


                    @for($i=1;$i<=3;$i++)
                            <input
                                name="images[]"
                                id="img{{$i}}"
                                type="file"
                                class="file-upload-field"
                                style="display:none"
                                onchange="previewNewImage(event, {{$i}})"
                            />
                            <!-- new img -->
                            <div class="image-wrapper myImg" id="uploadedNewImageContainer{{$i}}">
                              
                                @if(isset($images[$i-1]))
                                <img src="{{asset('productImages/'.$images[$i-1])}}" id="new-img{{$i}}" />
                                <button type="button" class="delete-button" data-index="{{$i}}" onclick="deleteExistingImage(this)">Delete</button>
                                <button type="button" class="add-button" style="display: none;" data-index="{{$i}}" onclick="triggerFileInput(this)">Add</button>

                                @else
                                <img  id="new-img{{$i}}" />
                                <button type="button" class="add-button" data-index="{{$i}}" onclick="triggerFileInput(this)">Add</button>
                                <button type="button" class="delete-button" style="display: none;" data-index="{{$i}}" onclick="deleteNewImage(this)">Delete</button>

                                @endif
                            </div>


                    @endfor
                    <input type="hidden" id="deletedImages" name="deletedImages" value="[]">




            

       

              </div>
              <style>
                .container {
                  padding-top: 20px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px;
        }
        .image-wrapper {
            position: relative;
        }
        .image-wrapper img  {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
        .image-wrapper .delete-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: red;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
            border-radius: 100px;
            font-weight: lighter;
            
        }

        .image-wrapper .add-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #43494a;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
            border-radius: 100px;
            font-weight: lighter;
        }
        .big {
            grid-column: span 2;
            border: 2px solid #ccc;
            width: 100%;
            height: 300px;
            object-fit: cover;
 
        }
        
               
            </style>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




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

<script>


        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('bigImage');
                var buttonElement = document.querySelector('#uploadedImageContainer #deleteBigImage');

                output.src = reader.result;
               
                buttonElement.style.display = 'inline-block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function deleteImage() {
            var output = document.getElementById('bigImage');
            var buttonElement = document.querySelector('#uploadedImageContainer #deleteBigImage');

            output.src = '';
            buttonElement.style.display = 'none';

            // Clear the file input field
            document.getElementById('img').value = '';
        }

        function triggerFileInput(button) {
        var index = button.getAttribute('data-index');
        document.getElementById('img' + index).click();
}

function previewNewImage(event, index) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var imgElement = document.getElementById('new-img' + index);
        imgElement.src = reader.result;
        imgElement.style.display = 'block';

        document.querySelector('#uploadedNewImageContainer' + index + ' .add-button').style.display = 'none';
        document.querySelector('#uploadedNewImageContainer' + index + ' .delete-button').style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
}

function deleteNewImage(button) {
    var index = button.getAttribute('data-index');
    var imgElement = document.getElementById('new-img' + index);
    imgElement.src = '';
    imgElement.style.display = 'none';

    document.querySelector('#uploadedNewImageContainer' + index + ' .add-button').style.display = 'block';
    document.querySelector('#uploadedNewImageContainer' + index + ' .delete-button').style.display = 'none';
}

function deleteExistingImage(button){
  var deletedImages = [];
  var index = button.getAttribute('data-index');
    var imgElement = document.getElementById('new-img' + index);
    var imgSrc = imgElement.getAttribute('src').split('/').pop();
    imgElement.src = '';
    imgElement.style.display = 'none';

    // Add the image to the deletedImages array
    
    deletedImages.push(imgSrc);

    // Update the hidden input field
    document.getElementById('deletedImages').value = JSON.stringify(deletedImages);

    document.querySelector('#uploadedNewImageContainer' + index + ' .add-button').style.display = 'block';
    button.style.display = 'none'; // Hide the delete button
}



    </script>



@endsection