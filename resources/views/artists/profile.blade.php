@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/profile.css')}}">

@if (session('success'))
       <div class="alert alert-success text-center m-3">{{ session('success') }}</div>
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

              <form action="{{ route('artists.updateBackgroundPicture', ['id' => $user['id']]) }}" method="POST" enctype="multipart/form-data" id="backgroundPictureForm">
                    @csrf
                    <input type="file" name="background" accept="image/*" style="display:none;" id="backgroundPictureInput" onchange="submitBackgroundForm()">
                    <button type="button" class="editIcon" onclick="document.getElementById('backgroundPictureInput').click();">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div class="profileImg">
              <div class="avatar">
              @if(isset($user->img))
                                                
                <img src="{{ asset('userImages/'.$user->img) }}" />
               @else
               <img src="{{asset('assets\img\artist.png')}}" alt="artist pic"/>
                @endif

                <form action="{{ route('artists.updateProfilePicture', ['id' => $user['id']]) }}" method="POST" enctype="multipart/form-data" id="profilePictureForm">
                    @csrf
                    <input type="file" name="profile_picture" accept="image/*" style="display:none;" id="profilePictureInput" onchange="submitForm()">
                    <button type="button" class="editIcon" onclick="document.getElementById('profilePictureInput').click();">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </form>





              </div>
            </div>
            <div class="info container">
              
              <div><h3 class="name">{{$user->name}}</h3></div><br>
              @if($artist && $artist->store_name)
              
              <a class="name" style="margin-top:90px; color: #35ace8;" href='#'>Store:{{$artist->store_name}}</a>
              @endif

              <div class="actions mt-4">
              @php 
                $products = DB::table('products')->where('artist_id', $user->id)->get();
              @endphp
                @if($products->isEmpty())
                <div><span>0</span>Artworks</div>
                @else
                <div><span>{{count($products)}}</span>Artworks</div>@endif
                <div><span>4</span>followers</div>
                <div><span>55</span>following</div>
                <a href="{{route('artists.edit_profile',['id'=>$user['id']] )}}">
                <button>Edit Account</button></a>
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
                    Art Work
                  </button>
                  <button
                    class="nav-link "
                    id="nav-Collections-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Collections"
                    type="button"
                    role="tab"
                    aria-controls="nav-Collections"
                    aria-selected="false"
                  >
                    Collections
                  </button>
                  <button
                    class="nav-link"
                    id="nav-Favorites-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Favorites"
                    type="button"
                    role="tab"
                    aria-controls="nav-Favorites"
                    aria-selected="false"
                  >
                    Favorites
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
                    About
                  </button>
                </div>
              </nav>
              <div class="tab-content mt-4" id="nav-tabContent">
                @php 
                $products = DB::table('products')->where('artist_id', $user->id)->get();
                @endphp
                <div
                  class="tab-pane fade show active artwork"
                  id="nav-Work"
                  role="tabpanel"
                  aria-labelledby="nav-Work-tab"
                >
                
                  <div class="flexbin flexbin-margin">

                  @if(!$products->isEmpty())
                  @foreach($products as $product)
                    <div class="outerImage">
                      <img src="{{ asset('productImages/'.$product->img) }}" />
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
                    
                    <h5>No Art Work yet</h5>
                    
                    @endif
                
                  </div>
                </div>


                <div
                  class="tab-pane fade collections"
                  id="nav-Collections"
                  role="tabpanel"
                  aria-labelledby="nav-Collections-tab"
                >
                  <div class="addnew">
                    <a href="{{route('artists.showAddCollection')}}">
                    <button>Add Collection</button></a>
                  </div>
                  @if(!$collections->isEmpty())
                  <div class="outerCollections">
                    
                  <div class="row row-cols-3">
                  @foreach($collections as $collection)
                 
                  <div class="col">
                  <div class="outerCard mb-4">
                      <button class="delete">
                        <img src="/assets/img/Delete.svg" alt="" />
                      </button>
                      <div class="grid-container">
                        
                    @if(count($collection->products) >= 1)
                      
                      @for($i=0;$i<4;$i++)
                       @if(isset($collection->products[$i]))
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
                    
                      <div class="overLay">
                     
                      </div>
                    
                    </div>
                    <a href="{{route('artists.showAddToCollection',['id'=>$collection['id']] )}}" class="btn btn-success btn-xs mb-4 center">
                      add artwork
                    </a>
                  </div>
                    
                  @endforeach 
              </div>
                  @else
                  <h5  class="p-4">No Collections</h5>
                  @endif
                    
                  
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="nav-Favorites"
                  role="tabpanel"
                  aria-labelledby="nav-Favorites-tab"
                >
                  <div class="outerFav">
                    <div class="innerFav">
                      <div class="FavCard">
                        <img class="bg" src="/assets/img/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/img/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="FavCard">
                        <img class="bg" src="/assets/img/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/img/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="FavCard">
                        <img class="bg" src="/assets/img/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/img/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="FavCard">
                        <img class="bg" src="/assets/img/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/img/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="FavCard">
                        <img class="bg" src="/assets/img/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/img/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade AboutProfile"
                  id="nav-About"
                  role="tabpanel"
                  aria-labelledby="nav-About-tab"
                >
                  <div>
                    <h3>About</h3>
                    <p>
                      Artist Description, which means about the artist and what
                      does he do bla bla, Artist Description, which means about
                      the artist and what does he do bla blaArtist Description,
                      which means about the artist and what does he do bla
                      blaArtist Description, which means about the artist and
                      what does he do bla blaArtist Description, which means
                      about the artist and what does he do bla bla
                    </p>
                  </div>
                  <div>
                    <h3>Country</h3>
                    <p>Palestine</p>
                  </div>
                  <div>
                    <h3>City</h3>
                    <p>Gaza</p>
                  </div>
                  <div>
                    <h3>Expertise</h3>
                    <div class="experts">
                      <div>Acrylic Paintings</div>
                      <div>Acrylic Paintings</div>
                      <div>On Demand Portraits</div>
                    </div>
                  </div>
                  <div>
                    <h3>Years of Experience</h3>
                    <p>The Artist has 12 years of experience.</p>
                  </div>
                  <div>
                    <h3>Social Media</h3>
                    <div class="socials">
                      <div>
                        <img src="/assets/img/Facebook2.svg" />
                        <div>ArtistnameonFacebook</div>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/instagram.svg" />
                        <div>IGHandler</div>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/website.svg" />
                        <div>www.websitename.com</div>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/Behance.svg" />
                        <div>BehanceifTheyGotone</div>
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




<script>
    function submitForm() {
        document.getElementById('profilePictureForm').submit();
    }

    function submitBackgroundForm() {
        document.getElementById('backgroundPictureForm').submit();
    }


  
</script>

<!-- <script>
    $(document).ready(function(){
        $('#nav-tab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script> -->


@endsection