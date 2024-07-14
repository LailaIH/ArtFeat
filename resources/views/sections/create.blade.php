@extends('layout')
@section('content')

<main>
        <header class="page-header page-header-dark bg-danger pb-5">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-md-6 mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Welcome {{ Auth::user()->name }}
                            </h1>
                            <div class="page-header-subtitle text-white-75">This panel is shown only to those who have the special permission. Please be careful when using the options.</div>
                        </div>
                        <div class="col-12 col-md-6 mt-4 text-right">
                            <a href="/options" class="btn btn-outline-white rounded-pill btn-sm" role="button">Panel Settings <i class="fas fa-cog ml-1"></i></a>
                            <a href="/" class="btn btn-outline-white rounded-pill btn-sm ml-1" role="button">Exit <i class="fas fa-arrow-left ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">




                  <div class="row m-5">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Section Picture</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img id="product-image" width="160" height="160" class="img-account-profile rounded-circle mb-1" src="/assets/img/noproduct.png" alt="section pic" />
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <form  method="POST" action="{{ route('sections.store') }}" enctype="multipart/form-data" id="image-form">
                                        @csrf
                                        
                                        <label for="img" class="custom-file-upload">
                                            Upload New Image
                                        </label>
                                        <input style="display: none;" type="file" name="img" id="img" class="form-control-file" multiple onchange="updateProfileImage(event);">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Section Details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="name">Name</label>
                                                    <input class="form-control" id="name" type="text" name="name"  required />
                                                    @error('name')
                                                        {{$message}}
                                                        @enderror
                                               
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="description">Description</label>
                                                    <textarea name="description" id="description" class="form-control" required >
                                                        
                                                       
                                                    </textarea>  
                                                    @error('description')
                                                        {{$message}}
                                                        @enderror                                      
                                                        </div>
                                            </div>
                                           
       
                                            <div class="row gx-3 mb-3">
                                           <div class="col-12">


                                            <label class="form-check-label small mb-1 " for="is_online">Is Online</label>
                                            <input class="form-check-input ml-3" type="checkbox" name="is_online" >

                                            </div>
                                        </div> 
                                            <!-- Submit button-->
                                            <div class="row gx-3 mb-3">
                                            <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Save changes</button></div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

</main>

<script>
    function updateProfileImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('product-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Submit form after selecting image
    }
</script>
@endsection                       