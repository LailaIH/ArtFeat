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

                               
                                   
          
                                    <div class="row gx-3 mb-3">
                                    
                                    <!-- Submit button-->
                            <div class="col-md-6">
                                   
                                    <button class="btn btn-primary" type="submit">{{__('mycustom.saveChanges')}}</button>
                                    @php
                                        $notification1 = DB::table('notifications')->where('user_id',auth()->user()->id)->where('type','become artist')                     
                                        ->orderBy('created_at', 'desc')->first();
                                        $notification2 = DB::table('notifications')->where('user_id',auth()->user()->id)->where('type','become artist')->where('status','rejected')
                                        ->orderBy('created_at', 'desc')->first();
                                     @endphp
                                     @if($notification1 && $notification1->status==='pending')
                                     
                                     @elseif(!$notification1 || $notification2)
                                    <a class="btn btn-secondary" href="{{route('artists.becomeArtist')}}">{{__('mycustom.becomeArtist')}}</a>
                                    @endif
                                </form>
                             </div>

                             <div class="col-md-6 mt-1">
                             @php
                                $followings = \App\Models\Following::where('user_id', $user->id)->get();

                             @endphp 
                             <p style="color:green; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#FollowingList">
                                <b>{{count($followings)}} {{__('mycustom.following')}}</b></p>
                             </div>
                        </div>

           
                                
                            </div>
                        </div>
                    </div>
                </div>


</div>








<!-- following list modal -->
<div class="modal fade" id="FollowingList" tabindex="-1" aria-labelledby="followingLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="followingLabel">{{__('mycustom.followingList')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(count($followings) > 0)
          @foreach($followings as $following)
            <div class="following-item d-flex align-items-center mb-3">
             @if(isset($following->artist->user->img))
              <img src="{{asset('userImages/'.$following->artist->user->img)}}" alt="{{ $following->artist->name }}" class="rounded-circle custom-margin" style="width: 50px; height: 47px;">
             @else 
             <img src="/assets/img/artist.png" alt="{{ $following->artist->name }}" class="rounded-circle custom-margin" style="width: 50px; height: 47px;">
             @endif
             
              <div class="flex-grow-1">
                <p class="mb-0">{{ $following->artist->name }}</p>
              </div>
              <form method="post" action="{{route('unfollow',$following->artist->id)}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">{{__('mycustom.unfollow')}}</button>
              </form>
            </div>
          @endforeach
        @else
          <p>{{__('mycustom.noFollowings')}}</p>
        @endif
      </div>
   
    </div>
  </div>
</div>
<!-- end modal -->


<style>
.modal-dialog-scrollable {
    max-width: 600px; /* Adjust the width of the modal */
}

.custom-margin {
    margin-right: 15px; /* Adjust the value as needed */
  }

  html[dir='rtl'] .custom-margin {
    margin-left: 15px; /* Adjust the value as needed */
  }

.following-item {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

.following-item img {
    border-radius: 50%;
}

.following-item .btn {
    margin-left: 10px;
}
</style>



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