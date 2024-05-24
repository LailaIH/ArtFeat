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


        @if (session('success'))
                            <div class="alert alert-success m-3">{{ session('success') }}</div>
                        @endif


                  <div class="row m-5">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">User Picture</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        @if($user->img)
                                        <img id="profile-image" width="160" height="160" class="img-account-profile rounded-circle mb-1" src="{{ asset('userImages/'.$user->img) }}" alt=" user pic " />
                                        @else
                                        <img id="profile-image" width="160" height="140" class="img-account-profile rounded-circle mb-1" src="{{ asset('assets/img/nopro.png') }}" alt=" user pic " />
                                        @endif
                                        <!-- Profile picture help block-->
                                       
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <form  method="POST" action="{{ route('users.nonArtists.update', ['id'=>$user['id']]) }}" enctype="multipart/form-data" id="image-form">
                                        @csrf
                                        @method('PUT')
                                        
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
                                    <div class="card-header">User Details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="name">Name</label>
                                                    <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required />
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="email">Email</label>
                                                    <input value="{{$user->email}}" type="text" name="email" id="email" class="form-control" required readonly>
                                                        
                                                                                         
                                                        </div>
                                            </div>
                                           
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                            <label class="small mb-1" for="job_title_id">Job Title</label>
                                            <select name="job_title_id" id="job_title_id" class="form-control form-control-solid" required>
                                                <option value="" disabled selected>Select a job title</option>
                                                @foreach ($jobs as $job)
                                                    <option value="{{ $job->id }}" @if ($user->job_title_id == $job->id) selected @endif>{{ $job->name }}</option>
                                                @endforeach
                                            </select>


                                            </div>

                                            
                                               
                                            <div class="col-md-6">
                                                   <label class="small mb-1" for="price">Points</label>
                                                   <input class="form-control" id="price" type="number" name="points" value="{{ $user->points }}"  />
                                               </div> </div>
                                           
                  <br>
                                            <div class="row gx-3 mb-3">
                                               <div class="col-md-4">
                                               <label class="form-check-label small mb-1 " for="is_artist">Is Artist</label>

                                            <input class="form-check-input ml-3" type="checkbox" name="is_artist"  @if ($user->is_artist) checked @endif>


                                            </div> 

                                            
                                           
                                            <div class="col-md-4 form-check form-check-solid">
                                            <label class="form-check-label small mb-1 "  for="is_ban" >Is Ban</label>

                                            <input class="form-check-input ml-3" id ="is_ban" name="is_ban" type="checkbox"  @if ($user->is_ban) checked @endif>

                                                    
                                            </div>


                                            <div class="col-md-4 form-check form-check-solid">
                                            <label class="form-check-label small mb-1 "  for="is_dealer" >Is Dealer</label>

                                            <input class="form-check-input ml-3" id ="is_dealer" name="is_dealer" type="checkbox" @if ($user->is_dealer) checked @endif >

                                 
                                           </div> </div>

                                            <!-- Submit button-->
                                            <br>
                                            <button class="btn btn-primary" type="submit">Save changes</button>
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
            var output = document.getElementById('profile-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Submit form after selecting image
    }
</script>

@endsection                       