@extends('commonlanding2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/profile.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@if (session('success'))
       <div class="alert alert-success text-center m-3">{{ session('success') }}</div>
@endif

@if (session('fail'))
      <div class="alert alert-danger text-center m-3">

                {{session('fail') }}
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
            <div class="info">
              
              <div><h3 class="name">{{$user->name}}</h3></div><br>
              <!-- @if($artist && $artist->store_name)
                @if($artist->website)
                  <a class="name" style="margin-top:90px; color: #35ace8;" href='{{$artist->website}}' target="_blank" rel="noopener noreferrer">Store:{{$artist->store_name}}</a>
                @else
                  <a class="name" style="margin-top:90px; color: #35ace8;">Store:{{$artist->store_name}}</a>
                @endif
              @endif -->

              <div class="actions">
              
                <!-- @if($products->isEmpty())
                <div><span>0</span>{{__('mycustom.artworks')}}</div>
                @else
                <div><span>{{count($products)}}</span>{{__('mycustom.artworks')}}</div>@endif -->
                <div><span>{{$artist->followers}}</span>{{__('mycustom.followers')}}</div>
                <div>{{__('mycustom.following')}}<span>{{$user->following}}</span></div>
                <a href="{{route('artists.edit_profile',['id'=>$user['id']] )}}">
                <button>{{__('mycustom.editAccount')}}</button></a>
              </div>
            </div>
          </div>
          <div class="outerSections">
            <div class="innerSections">
              <nav>
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                  <button
                    class="nav-link  {{$tab==='artwork'?  'active' : '' }} "
                    id="nav-Work-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Work"
                    type="button"
                    role="tab"
                    aria-controls="nav-Work"
                    aria-selected=" {{$tab==='artwork'? 'true' : 'false' }}"
                  >
                  {{__('mycustom.artwork')}}
                  </button>
                  <button
                    class="nav-link {{$tab==='collections'?  'active' : '' }} "
                    id="nav-Collections-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Collections"
                    type="button"
                    role="tab"
                    aria-controls="nav-Collections"
                    aria-selected="{{$tab==='collections'? 'true' : 'false' }}"
                  >
                  {{__('mycustom.collections')}}
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
                  {{__('mycustom.favorite')}}
                  </button>
                  <button
                    class="nav-link {{$tab==='about'?  'active' : '' }}"
                    id="nav-About-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-About"
                    type="button"
                    role="tab"
                    aria-controls="nav-About"
                    aria-selected="{{$tab==='about'?  'true' : 'false' }}"
                  >
                  {{__('mycustom.about')}}
                  </button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                
                <div
                  class="tab-pane fade {{$tab==='artwork'? 'show active' : '' }} artwork"
                  id="nav-Work"
                  role="tabpanel"
                  aria-labelledby="nav-Work-tab"
                >
                <!-- <div class="addnew">
                    <a href="#">
                    <button >{{__('mycustom.addArtwork')}}</button></a>
                  </div> -->
                
                  <div class="flexbin flexbin-margin">
                      <!-- edit -->
                      <style>
                        .editIcon{
                           width: 30px;
                           height: 25px;
                            border-radius: 100px;
                            position: absolute;
                            z-index: 1;
                            top: 5px;
                            right: 11px;
                            border: 1px solid rgba(255, 255, 255, 0.4);
                            background: rgba(0, 0, 0, 0.6);
                            
                            justify-content: center;
                            align-items: center;
                            color: #ccc; 
                                  }

                                  .fav-btn{
                                    width: 30px;
                                    height: 25px;
                            border-radius: 100px;
                            position: absolute;
                            z-index: 1;
                            top: 40px;
                            right: 11px;
                            /* border: 1px solid rgba(255, 255, 255, 0.4); */
                            border: none;
                            background: rgba(249, 249, 249, 0.6);
                            
                            justify-content: center;
                            align-items: center;
                            color: red; 
                                  }

                        .fav-btn:hover{
                          width: 30px;
                           height: 25px;
                        border-radius: 100px;
                         position: absolute;
                           z-index: 1;
                         top: 40px;
                         right: 11px;
                         /* border: 1px solid rgba(255, 255, 255, 0.4); */
                        border: none;
                        background: red;
                  
                        justify-content: center;
                         align-items: center;
                         color: rgb(0, 0, 0); 
                        }
                      </style>
                  @if(!$products->isEmpty())
                  @foreach($products as $product)
                    <div class="outerImage">
                    <button class="editIcon">
                        <a style="text-decoration: none; color: inherit;" href="{{route('artists.showEditArtwork',$product->id)}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i></a>
                      </button>
                      <button class="fav-btn">
                        <i class="fa-regular fa-heart" aria-hidden="true"></i>
                      </button>

                      <!-- add product to a collection if it doesn't belong to one -->
                     @if(!$product->collection)
                      <button class="editIcon addToCollection" style="margin-top: 68px;" data-bs-toggle="modal" data-bs-target="#addToCollection-{{$product->id}}">
                        {{__('mycustom.collectionn')}}
                      </button>@endif
                      <!-- Modal -->
                      <div class="modal fade" id="addToCollection-{{$product->id}}" tabindex="-1" aria-labelledby="proLabel-{{$product->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="proLabel-{{$product->id}}">Add To Collection</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  <form method="post" action="{{route('addExistedArtworkToCollection',$product->id)}}">
                                @csrf 
                                @method('PUT')
                                    
                                    
                                @foreach($collections as $collection)
                                
                                <div class="row mb-3" style="align-items: center;">
                                    <div class="col" style="display: flex; align-items: center; margin-right: 50px;">
                                        <input style="margin-right: 10px;" value="{{$collection->id}}" name="collection" type="radio" id="collection-{{$collection->id}}">
                                        <label for="collection-{{$collection->id}}" class="col-form-label"><b>{{$collection->name}}</b></label>
                                    </div>
                                    <div class="col">
                                        <img style="border-radius: 10px;" src="{{ isset($collection->products[0]) ? asset('productImages/'.$collection->products[0]->img) : asset('assets/img/a1.png')}}" height="100rem" width="100rem"/>
                                    </div>
                                </div>
                                <hr>
                              
                              @endforeach
                                     

                               </div>
                                    
                                  
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                  </div>
                                  
                                  </form>
                                 
                                  
                                </div>
                              </div>
                            </div>
                 
                            <!-- Modal end -->



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
                  class="tab-pane fade {{$tab==='collections'? 'show active' : '' }} collections"
                  id="nav-Collections"
                  role="tabpanel"
                  aria-labelledby="nav-Collections-tab"
                  
                >
                  <div class="addnew">
                    
                    <button id="openModalButton" >{{__('mycustom.addCollection')}}</button>
                  </div>

                  <!-- start modal for new collection -->
                  <div class="collectionNameModal" id="collectionNameModal">
                  <span class="close" id="closeModalButton">&times;</span>

                                            <style>
                          

                                  .collectionNameModal .close {
                                      position: absolute;
                                      right: 10px; /* Default for LTR */
                                  }

                                  /* Adjust for RTL */
                                  [dir="rtl"] .collectionNameModal .close {
                                      right: auto;
                                      left: 10px; /* Move to left */
                                  }
                              </style>




                  <h2>{{__('mycustom.newCollection')}}</h2>
                  <form  action="{{route('artists.add_collection',['id'=>auth()->user()->id] )}}" method="POST">
                  @csrf
                  <label for="collection-name">{{__('mycustom.collectionName')}}</label>
                  <input type="text" id="collection-name" name="name">
                  <div class="buttons">
                  <button type="submit" class="save mb-2">{{__('mycustom.save')}}</button></div>





                  
                  </form>
                  
                 
                 
                 
                 <style>
                  .flexImg{
                    display: flex;
                    flex-direction: column;
                    border-radius: 10px;
                    border: solid 1px;
                    padding: 5px;
                    padding-bottom: 5px;
                  }
                  .innerFlex{
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    border-bottom: solid 1px;
                  }
                   .x{
                    border: none;
                  }
                   .innerFlex p{
                    position: relative;
                    top: 10px;
                    padding: 5px;
                    
                   }
                   .innerFlex img{
                    border-right: solid 1px;
                    padding: 10px;
                    width: 150px;
                    
                   }

                  
                 </style>
                  
              </div>
              <!-- end modal -->
              <script>
              const openModalButton = document.getElementById('openModalButton');
              const closeModalButton = document.getElementById('closeModalButton');
              const cancelButton = document.getElementById('cancelButton');
              const modal = document.getElementById('collectionNameModal');
          
              openModalButton.addEventListener('click', () => {
                  modal.classList.add('show-modal');
              });
          
              closeModalButton.addEventListener('click', () => {
                  modal.classList.remove('show-modal');
              });
          
              cancelButton.addEventListener('click', () => {
                  modal.classList.remove('show-modal');
              });
          
              window.addEventListener('click', (event) => {
                  if (event.target === modal) {
                      modal.classList.remove('show-modal');
                  }
              });
          </script>
   <style>
    
    .collectionNameModal {
      display: none; /* Initially hidden */
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 20px;
            position: fixed;
            top: 20px; /* Adjust top value as needed */
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            height: min-content;
    }
    .collectionNameModal h2 {
        margin: 0;
        font-size: 1.5em;
        margin-bottom: 20px;
    }
    .collectionNameModal .close {
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
        font-size: 1.2em;
    }
    .collectionNameModal label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    .collectionNameModal input[type="text"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .collectionNameModal .buttons {
        display: flex;
        justify-content: space-between;
    }
    .collectionNameModal .buttons button {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
    }
    .collectionNameModal .buttons .cancel {
        background: white;
        border: 1px solid #0b0;
        color: #0b0;
    }
    .collectionNameModal .buttons .save {
        background: #0af;
        color: white;
    }
    .show-modal {
        display: block;
    }
</style>




                  @if(!$collections->isEmpty())
                <div class="outerCollections">
                    
                 
                  @foreach($collections as $collection)
                 
                
                
                  <div class="outerCard ">
                    <form method="POST" action="{{route('artists.collectionsDisable',['collection'=>$collection])}}" onsubmit="return confirmDisable()">
                    @csrf
                      <button type="submit" class="delete" style="margin-top: 34px;">
                        <img src="/assets/img/Delete.svg" alt="" />
                      </button>
                     
                    </form>
                    <button class="editIcon delete ">
                        
                        <i class="fa fa-pencil" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#collectionNameModal-{{$collection->id}}"></i>
                      </button>

                      <form method="get" action="{{route('artists.showAddToCollection',['id'=>$collection['id']] )}}">
                       @csrf 
                      <button type="submit" class="editIcon addwork " style="margin-top: 68px;">
                      {{__('mycustom.addArtworkk')}}
                      </button></form>

                        <!-- Modal For editing collection name -->
                        <div class="modal fade" id="collectionNameModal-{{$collection->id}}" tabindex="-1" aria-labelledby="collectionNameLabel-{{$collection->id}}" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="collectionNameLabel-{{$collection->id}}">{{__('mycustom.editCollection')}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="{{route('artists.collectionUpdate',['id'=>$collection->id])}}">
                                    @csrf 
                                    @method('PUT')
                                    

                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">{{__('mycustom.name')}}</label>
                                        <input value="{{$collection->name}}" name="name" type="text" class="form-control" id="recipient-name" required>
                                      </div>
                                      </div>
                                    
                                  
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{__('mycustom.update')}}</button>
                                  </div>
                                  
                                  </form>
                                 
                                  
                                </div>
                              </div>
                            </div>
                 
                            <!-- Modal end -->



    



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
                    
                    

                    
                  
                    
                  @endforeach 
              
                  @else
                  <h5  class="p-4">{{__('mycustom.noCollections')}}</h5>
                  @endif
                    
                  
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="nav-Favorites"
                  role="tabpanel"
                  aria-labelledby="nav-Favorites-tab"
                >
                  

                  @if(count($carts)>0)
                    <div class="outerFav">
                    <div class="innerFav">
                      @foreach($carts as $cart)
                      <div class="FavCard">
                        <img class="bg" src="{{ asset('productImages/'.$cart->product->img) }}" />
                        <div class="info">
                          <div>
                            <div class="title">{{$cart->product->name}}</div>
                            <div class="name">{{$cart->product->artist->name}}</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/img/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                   
                    </div>
                  </div>
                  @else
                      <h5 class="p-4">{{__('mycustom.noFavorite')}}</h5>
                  @endif
                </div>
                <div
                  class="tab-pane fade {{$tab==='about'?  'show active' : '' }} AboutProfile"
                  id="nav-About"
                  role="tabpanel"
                  aria-labelledby="nav-About-tab"
                >
                  <div>
                    <h3>{{__('mycustom.aboutArtistDesc')}}</h3>
                    <p id="description_par">
                      @if($artist->description !=null)
                      
                      {{$artist->description}}
                        <button id="edit" class="mybutton">
                        <i class="fa fa-pencil m-3" aria-hidden="true"></i>
                        </button></p>
                        <form id="editform" method="post" action="{{route('artists.addDescription',['id'=>$artist->id])}}">
                      @csrf
                      <textarea style="width: 70%;" name="description" class="form-control "  cols="2" rows="4">{{$artist->description}}</textarea>
                        <br><button type="submit" class="btn btn-primary ">{{__('mycustom.save')}}</button>
                    </form>

                      @else
                      <button class="btn btn-primary" id="show">{{__('mycustom.addDesc')}}</button>

                      <form method="post" action="{{route('artists.addDescription',['id'=>$artist->id])}}">
                      @csrf
                      <textarea style="width: 70%;" name="description" class="form-control desc"  cols="2" rows="4"></textarea>
                        <br><button type="submit" class="btn btn-primary desc">{{__('mycustom.save')}}</button>
                    </form>



                    @endif
                   
                  </div>
                  <div>
                    <h3>{{__('mycustom.country')}}</h3>
                    @if($artist->country !=null)
                    <p>{{$artist->country}}</p>
                    @else
                    {{__('mycustom.addCountry')}}
                    @endif
                  </div>
                  <div>
                    <h3>{{__('mycustom.city')}}</h3>
                    @if($artist->city !=null)
                    <p>{{$artist->city}}</p>
                    @else
                    {{__('mycustom.addCity')}}
                    @endif
                  </div>
                  <div>
                    <h3 class="mb-2">{{__('mycustom.expertise')}}</h3>
                    
                      @if(isset($artist->expertise))
                      <div class="experts">
                      @foreach ($artist->expertise as $expertise)
                      <div>{{$expertise}}</div>
                      @endforeach </div>
                      @endif
                      
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">{{__('mycustom.addExpert')}} +</button>
                      
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">{{__('mycustom.newExpert')}}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="{{route('artists.addExpert',['id'=>$artist->id])}}">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="recipient-name" class="col-form-label">{{__('mycustom.expert')}}:</label>
                                      <input name="expertise[]" type="text" class="form-control" id="recipient-name" required>
                                    </div>
                                    
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
                                  <button type="submit" class="btn btn-primary">{{__('mycustom.add')}}</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>


                          <style>
        .modal-header {
            position: relative;
        }

        .modal-header .btn-close {
            position: absolute;
            right: 10px; /* Default for LTR */
        }

        /* Adjust for RTL */
        [dir="rtl"] .modal-header .btn-close {
            right: auto;
            left: 10px; /* Move to left */
        }
    </style>

                    
                  </div>
                  <div>
                    <h3>{{__('mycustom.yearsOfExperience')}}</h3>
                    <p id="exp_par">
                      @if($artist->years_of_experience !=null)
                      
                     {{__('mycustom.thisArtistHas')}}  {{$artist->years_of_experience}}  {{__('mycustom.yearsOfExperienceDes')}}
                        <button id="edit_years" class="mybutton">
                        <i class="fa fa-pencil m-3" aria-hidden="true"></i>
                        </button></p>
                        <form id="edit_years_form" method="post" action="{{route('artists.addYears',['id'=>$artist->id])}}">
                      @csrf
                      <input style="width: 30%;" type="number" name="years" class="form-control " value="{{$artist->years_of_experience}}"/>
                        <br><button type="submit" class="btn btn-primary ">{{__('mycustom.save')}}</button>
                    </form>

                      @else
                      <button class="btn btn-primary" id="show_years">{{__('mycustom.addExperienceYears')}}</button>

                      <form method="post" action="{{route('artists.addYears',['id'=>$artist->id])}}">
                      @csrf
                      <input style="width: 30%;" type="number" name="years" class="form-control years "/>
                        <br><button type="submit" class="btn btn-primary years ">{{__('mycustom.save')}}</button>
                    </form>
                      @endif
                  </div>


                  <div>
                    <h3>{{__('mycustom.socialMedia')}}</h3>
                    <div class="socials">
                      <div>
                        <img src="/assets/img/Facebook2.svg" />
                        @if($artist->facebook !=null)
                        <div>{{$artist->facebook}}</div>
                        @else
                        <div>{{__('mycustom.addFacebook')}}</div>
                         @endif
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/instagram.svg" />
                        @if($artist->instagram !=null)
                        <div>{{$artist->instagram}}</div>
                        @else
                        <div>{{__('mycustom.addInstagram')}}</div>
                        @endif
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/website.svg" />
                        @if($artist->website !=null)
                        <div>{{$artist->website}}</div>
                        @else
                        <div>{{__('mycustom.addWebsite')}}</div>
                        @endif
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/img/Behance.svg" />
                        @if($artist->behance !=null)
                        <div>{{$artist->behance}}</div>
                        @else
                        <div>{{__('mycustom.addBehance')}}</div>
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

<script>
const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')

  
})
</script>

<script>
      $(document).ready(function(){
        $(".desc").hide();
        $("#editform").hide();
        $("#show").click(function(){
          $(".desc").show();
          $("#show").hide();
        });

        $("#edit").click(function(){
    $("#editform").show();
    $("#edit").hide();
    $("#description_par").hide();
  });

      });
</script>


<script>
      $(document).ready(function(){
        $(".years").hide();
        $("#edit_years_form").hide();
        $("#show_years").click(function(){
          $(".years").show();
          $("#show_years").hide();
        });

    $("#edit_years").click(function(){
    $("#edit_years_form").show();
    $("#edit_years").hide();
    $("#exp_par").hide();
  });

      });
</script>


<script>
    function confirmDisable() {
        return confirm('Are you sure you want to remove this collection?');
    }
</script>

<!-- <script>
document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
  button.addEventListener('click', event => {
    const collectionId = button.getAttribute('data-bs-target').split('-')[1];
    const modal = document.getElementById(`exampleModal2-${collectionId}`);
    const modalTitle = modal.querySelector('.modal-title');
    const modalBodyInput = modal.querySelector('.modal-body input');
    
    modalTitle.textContent = `Edit Collection`;
    modalBodyInput.value = button.closest('.outerCard').querySelector('.text').textContent.trim();
  });
});

</script> -->




@endsection