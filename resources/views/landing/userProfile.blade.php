@extends('commonlanding2')
@section('content')

<style>
.custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    background-color: #0d6efd;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.custom-file-upload:hover {
    background-color: #0056b3;
}
</style>

@if (session('success'))
                    <div class="alert alert-success m-3">{{ session('success') }}</div>
                @endif
                
    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif

<div >


          <div class="row m-5">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">{{__('mycustom.userPic')}}</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->    
                                @if($user->img)
                                <img id="profile-image" width="160" height="160" class="img-account-profile rounded-circle mb-1" src="{{ asset('userImages/'.$user->img) }}" alt=" user pic " />
                                @else
                                <img id="profile-image" width="160" height="140" class="img-account-profile rounded-circle mb-1" src="{{asset('assets\img\artist.png')}}" alt=" user pic " />
                                @endif
                                <!-- Profile picture help block-->
                               
                                <div class="small font-italic text-muted mb-4"></div>
                                <!-- Profile picture upload button-->
                              
                                <form  method="POST" action="{{ route('userUpdateProfile', ['id'=>$user['id']]) }}" enctype="multipart/form-data" id="image-form">
                               
                                
                                @csrf
                                @method('PUT')
                                
                                <label for="img" class=" btn btn-primary">
                                {{__('mycustom.uploadImg')}}
                                </label>
                                <input style="display: none;" type="file" name="img" id="img" class="form-control-file" multiple onchange="updateProfileImage(event);">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">{{__('mycustom.userDetails')}}</div>
                            <div class="card-body">
                               
                                <!-- Form Row-->
                                   
                                    <div class="row gx-3 mb-3">
                                       
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="name">{{__('mycustom.name')}}</label>
                                            <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required />
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="email">{{__('mycustom.emailUser')}}</label>
                                            <input value="{{$user->email}}" type="text" name="email" id="email" class="form-control" required readonly>
                                                
                                                                                 
                                                </div>
                                    </div>
                                   
                                    <div class="row gx-3 mb-3">
                 

                                    
                                       
                                    <div class="col-md-6">
                                           <label class="small mb-1" for="price">{{__('mycustom.points')}}</label>
                                           <input class="form-control" id="price" type="number" name="points" value="{{ $user->points }}" readonly />
                                       </div> 
                                    
                                    
                                       <div class="col-md-6">
                                           <label class="small mb-1" for="price">{{__('mycustom.fundsInYourWallet')}} </label>
                                           <input class="form-control" id="price" type="number" name="points" value="{{ $user->funds }}" readonly />
                                       </div> 
                       
                                    
                                    
                                    </div>

                               
                                   
          
                                  

                                    <!-- Submit button-->
                                   
                                    <button class="btn btn-primary" type="submit">{{__('mycustom.saveChanges')}}</button>
                                    @php
                                        $notification1 = DB::table('notifications')->where('user_id',auth()->user()->id)->where('type','become artist')->first();
                                        $notification2 = DB::table('notifications')->where('user_id',auth()->user()->id)->where('type','become artist')->where('status','rejected')->first();

                                     @endphp
                                     @if(!$notification1 || $notification2)
                                    <a class="btn btn-secondary" href="{{route('artists.becomeArtist')}}">{{__('mycustom.becomeArtist')}}</a>
                                    @endif
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