@extends('commonlanding2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/profile.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@if (session('success'))
       <div class="alert alert-success text-center m-3">{{ session('success') }}</div>
@endif

@if ($errors->has('fail'))
      <div class="alert alert-danger text-center m-3">

                {{ $errors->first('fail') }}
      </div>
@endif

<section class="profileSection">
      <div class="outerProfile">
        <div class="innerProfile">
          <div class="header">
            <div class="coverPhoto">
              @if(isset($artist->background))
              <img src="{{ asset('backgroundImages/'.$artist->background) }}" />
              @else
              <img src="{{asset('assets\img\white.png')}}" alt="artist pic"/>@endif

           
            </div>
            <div class="profileImg">
              <div class="avatar">
              @if(isset($user->img))
                                                
                <img src="{{ asset('userImages/'.$user->img) }}" />
               @else
               <img src="{{asset('assets\img\artist.png')}}" alt="artist pic"/>
                @endif

              
              </div>
            </div>
            <div class="info container">
              
              <div><h3 class="name">{{$user->name}}</h3></div><br>
              @if($artist && $artist->store_name)
                @if($artist->website)
                  <a class="name" style="margin-top:90px; color: #35ace8;" href='{{$artist->website}}' target="_blank" rel="noopener noreferrer">Store:{{$artist->store_name}}</a>
                @else
                  <a class="name" style="margin-top:90px; color: #35ace8;">Store:{{$artist->store_name}}</a>
                @endif
              @endif

              <div class="actions mt-4">
              
                <!-- @if($products->isEmpty())
                <div><span>0</span>{{__('mycustom.artworks')}}</div>
                @else
                <div><span>{{count($products)}}</span>{{__('mycustom.artworks')}}</div>@endif -->
                <div style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#FollowersList"><span>{{$artist->followers}}</span>{{__('mycustom.followers')}}</div>
                <div style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#FollowingList">{{__('mycustom.following')}}<span>{{$user->following}}</span></div>
                
              @auth
                @php 
                $follow = DB::table('followings')->where('artist_id',$artist->id)->where('user_id',auth()->user()->id)->first();

                @endphp
                @if(!$follow)

                <form method="get" action="{{route('follow',$artist->id)}}">
                  @csrf
                <button type="submit">{{__('mycustom.follow')}}</button>
                </form>
                @else 
                <div style="color: green;  cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModalUnfollow"><b>{{__('mycustom.myFollowing')}}</b></div>

                <!-- unfollow modal -->
                 <!-- Modal -->
                        <div class="modal fade" id="exampleModalUnfollow" tabindex="-1" aria-labelledby="exampleModalLabelUnfollow" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header d-flex justify-content-center">
                                <h5 class="modal-title " id="exampleModalLabelUnfollow">{{__('mycustom.sureUnfollow')}}</h5>
                             

                             
                              </div>
                              <div class="modal-body text-center">
                               <form method="post" action="{{route('unfollow',$artist->id)}}">
                                
                               @csrf
                               @method('DELETE')
                                <button type="submit" style="background-color: #f21b25;">{{__('mycustom.unfollow')}}</button>
                                <button type="button" style="background-color: #737575;" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>

                                
                               </form>
                              </div>
                              
                            </div>
                          </div>
                        </div>

                @endif


              @else
              <form method="get" action="{{route('landingLogin')}}">
                @csrf
              <button type="submit">{{__('mycustom.follow')}}</button>  </form>
              @endauth 
              </div>
            </div>
          </div>
          <div class="outerSections">
            <div class="innerSections">
              <nav>
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                  <button
                    class="nav-link active "
                    id="nav-Work-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Work"
                    type="button"
                    role="tab"
                    aria-controls="nav-Work"
                    aria-selected="true"
                  >
                  {{__('mycustom.artwork')}}
                  </button>


                  <button
                    class="nav-link"
                    id="nav-Collections-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Collections"
                    type="button"
                    role="tab"
                    aria-controls="nav-Collections"
                    aria-selected="false"
                  >
                  {{__('mycustom.collections')}}
                  </button>
               
              
                  <button
                    class="nav-link"
                    id="nav-About-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-About"
                    type="button"
                    role="tab"
                    aria-controls="nav-About"
                    aria-selected="false"
                  >
                  {{__('mycustom.about')}}
                  </button>
                </div>
              </nav>
              <div class="tab-content mt-4" id="nav-tabContent">
                
                <div
                  class="tab-pane fade show active artwork"
                  id="nav-Work"
                  role="tabpanel"
                  aria-labelledby="nav-Work-tab"
                >
                
                  <div class="flexbin flexbin-margin">

                  @if(!$products->isEmpty())
                  @foreach($products as $product)

                    <div class="outerImage" data-id="{{ $product->id }}" style=" cursor: pointer;">
                      
                      <img src="{{ asset('productImages/'.$product->img) }}" height="100%;" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">{{$product->name}}</div>
                    </div>
                  
                    @endforeach
                    @else
                    
                    <h5>{{__('mycustom.noArtworks')}}</h5>
                    
                    @endif
                
                  </div>
                </div>


                <div
                  class="tab-pane fade collections"
                  id="nav-Collections"
                  role="tabpanel"
                  aria-labelledby="nav-Collections-tab"
                >
                @if(count($collections)>0)


                <div class="outerCollections">
                    
                 
                  @foreach($collections as $collection)
                 
                 
                  <a style="text-decoration: none;" href="{{ route('artists.collectionsArtworks', $collection->id) }}">

                  <div class="outerCard ">
                   
                  
                    <div class="grid-container">
                        
                    @if(count($collection->products) >= 1)
                      
                      @for($i=0;$i<4;$i++)
                       @if(isset($collection->products[$i]) && $collection->products[$i]->is_online)
                        <div class="grid-item">
                          <img src="{{ asset('productImages/'.$collection->products[$i]->img) }}" />
                        </div>
                       @else
                        <div class="grid-item">
                          <img src="/assets/img/a5.png" />
                        </div>
                        @endif 
                      @endfor
                      
                    @else
                        @for($i=0;$i<4;$i++)
                        <div class="grid-item">
                          <img src="/assets/img/a{{$i+1}}.png" />
                        </div>

                        @endfor
                        
                    @endif
                    </div>

                      
                      <div class="text">{{$collection->name}}</div>
                    
                      <div class="overLay"></div>
                     
                      </div> 
                  </a>
                    
                  

                    
                  
                    
                  @endforeach 




                @else
                 <h5  class="p-4">{{__('mycustom.noCollections')}}</h5>
                @endif
              
              
              
              </div>
                </div>



                <div
                  class="tab-pane fade AboutProfile"
                  id="nav-About"
                  role="tabpanel"
                  aria-labelledby="nav-About-tab"
                >
                  <div>
                    <h3>{{__('mycustom.aboutArtistDesc')}}</h3>
                    <p id="description_par">
                      @if($artist->description !=null)
                      
                      {{$artist->description}}
               

                      @else

                      {{__('mycustom.artistDescription')}}
                    @endif
                    </p>
                    
                  </div>
                  <div>
                    <h3>{{__('mycustom.country')}}</h3>
                    <p>
                    @if($artist->country !=null)
                    {{$artist->country}}
                    @else
                    {{__('mycustom.artistCountry')}}
                    @endif
                    </p>
                  </div>
                  <div>
                    <h3>{{__('mycustom.city')}}</h3>
                    <p>
                    @if($artist->city !=null)
                    {{$artist->city}}
                    @else
                    {{__('mycustom.artistCity')}}
                    @endif
                    </p>
                  </div>
                  <div>
                    <h3 class="mb-2">{{__('mycustom.expertise')}}</h3>
                    
                      @if(isset($artist->expertise))
                      <div class="experts">
                      @foreach ($artist->expertise as $expertise)
                      <div>{{$expertise}}</div>
                      @endforeach </div>
                      @else
                      <div class="experts">
                     <p> {{__('mycustom.artistExpertise')}}</p>
                      </div>

                      @endif
                      
                 
                    
                  </div>
                  <div>
                    <h3>{{__('mycustom.yearsOfExperience')}}</h3>
                    <p id="exp_par">
                      @if($artist->years_of_experience !=null)
                      
                     {{__('mycustom.thisArtistHas')}}  {{$artist->years_of_experience}}  {{__('mycustom.yearsOfExperienceDes')}}
                     
                

                      @else
                      {{__('mycustom.artistYears')}}
                      @endif
                    </p>
                  </div>


                  <div>
                    <h3>{{__('mycustom.socialMedia')}}</h3>
                    <div class="socials">
                      <div>
                        <img src="/assets/img/Facebook2.svg" />
                        @if($artist->facebook !=null)
                        <div>{{$artist->facebook}}</div>
                        @else
                        <div>{{__('mycustom.ArtistFacebook')}}</div>
                         @endif
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/instagram.svg" />
                        @if($artist->instagram !=null)
                        <div>{{$artist->instagram}}</div>
                        @else
                        <div>{{__('mycustom.artistInstagram')}}</div>
                        @endif
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/website.svg" />
                        @if($artist->website !=null)
                        <div>{{$artist->website}}</div>
                        @else
                        <div>{{__('mycustom.artistWebsite')}}</div>
                        @endif
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/Behance.svg" />
                        @if($artist->behance !=null)
                        <div>{{$artist->behance}}</div>
                        @else
                        <div>{{__('mycustom.artistBehance')}}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



@php
$followings = \App\Models\Following::where('user_id', $artist->user->id)->get();
$followers = \App\Models\Following::where('artist_id', $artist->id)->get();

@endphp  


<!-- following list modal -->
<div class="modal fade" id="FollowingList" tabindex="-1" aria-labelledby="followingLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 300px;">
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
 
<!-- followers modal list -->

<div class="modal fade" id="FollowersList" tabindex="-1" aria-labelledby="followersLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 300px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="followersLabel">{{__('mycustom.followersList')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(count($followers) > 0)
          @foreach($followers as $follower)
            <div class="following-item d-flex align-items-center mb-3">
             @if(isset($follower->user->img))
              <img src="{{asset('userImages/'.$follower->user->img)}}" alt="{{ $follower->artist->name }}" class="rounded-circle  custom-margin" style="width: 50px; height: 47px;">
             @else 
             <img src="/assets/img/artist.png" alt="{{ $follower->user->name }}" class="rounded-circle custom-margin" style="width: 50px; height: 47px;">
             @endif
             
              <div class="flex-grow-1">
                <p class="mb-0">{{ $follower->user->name }}</p>
              </div>
  
            </div>
          @endforeach
        @else
          <p>{{__('mycustom.noFollowers')}}</p>
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
    document.addEventListener('DOMContentLoaded', function() {
        const outerImages = document.querySelectorAll('.outerImage');
        
        outerImages.forEach(outerImage => {
            outerImage.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                window.location.href = '/artwork/' + id;
            });
        });
    });
</script>


@endsection