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
                            <a href="/options/settings" class="btn btn-outline-white rounded-pill btn-sm" role="button">Panel Settings <i class="fas fa-cog ml-1"></i></a>
                            <a href="/home" class="btn btn-outline-white rounded-pill btn-sm ml-1" role="button">Exit <i class="fas fa-arrow-left ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n5">




                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Edit {{$nonArtist->name}}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('users.nonArtists.update' , ['id'=>$nonArtist->id] )}})" enctype="multipart/form-data" id="image-form">
                          @csrf
                          @method('PUT')
                          <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                    <label class="small mb-1" for="name" >Name</label>
                                    <input class="form-control" id ="name" name="name" type="text"  value="{{$nonArtist->name}}" required>
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                <label class="small mb-1" for="job_title_id">Job Title:</label>
                                <select name="job_title_id" id="job_title_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                    <option value="">Select a job title</option>
                                    @foreach ($jobTitles as $jobTitle)
                                        <option value="{{ $jobTitle->id }}" @if ($jobTitle->id == $nonArtist->job_title_id) selected @endif>{{ $jobTitle->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                          </div><br>


                          
                        @if(isset($nonArtist->img))
                        <div class="col-12">
                          <img id="profile-image" class="img-account-profile rounded-circle mb-1" width="160" height="160"  src="{{ asset('userImages/'.$nonArtist->img) }}" alt="artist pic" />
                        </div>
                          @else
                          <div class="col-12">
                        <img id="profile-image" class="img-account-profile rounded-circle mb-1" width="160" height="160"  src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}" alt="artist pic" />
                          </div>
                        @endif  
                          
                        <label for="img" class="custom-file-upload ">
                               Upload New Image
                        </label>
                          <input style="display: none;" type="file" name="img" id="img" class="form-control-file" multiple onchange="updateProfileImage(event);">

                          

     <br><br>
                          <div class="row gx-3 mb-3 ">
                            <br>
                          <div class="col-md-4 form-check form-check-solid">

                           <label class="form-check-label small mb-1 "  for="is_ban" >Is Ban</label>
                           <input class="form-check-input ml-3" id ="is_ban" name="is_ban" type="checkbox"  @if ($nonArtist->is_ban) checked @endif>

                                </div>


                                <div class="col-md-4 form-check form-check-solid">

                                    <label class="form-check-label small mb-1 "  for="is_dealer" >Is Dealer</label>
                                    <input class="form-check-input ml-3" id ="is_dealer" name="is_dealer" type="checkbox" @if ($nonArtist->is_dealer) checked @endif >

                                </div>


                                <div class="col-md-4 form-check form-check-solid">

                                    <label class="form-check-label small mb-1 "  for="is_artist" >Is Artist</label>
                                    <input class="form-check-input ml-3" id ="is_artist" name="is_artist" type="checkbox"  >

                                </div>
                          </div>
                          <div class="col-12">
                                <label class="small mb-1" for="points" >Points</label>
                                    <input class="form-control" id ="points" name="points" type="text"  value="{{$nonArtist->points}}">
                                  
                                </div>



                                <div class="col-12">
                                    <br>
                              <button type="submit">Submit</button>
                         </div>



                        </form>


           
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


