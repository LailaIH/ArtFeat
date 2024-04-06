@extends('commonlanding')
@section('content')
<div class="liveStream">
    <div class="innerLive">
        <p>Live</p>
        <img src="assets/img/livestream.svg" alt="">
    </div>
</div>
<div id="carouselExampleIndicators" class="carousel slide Discover" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="card-body">
                <img src="assets/img/kofia.svg" />
                <div class="title">
                    <h1 class="card-title">Shop Most Beautiful</h1>
                    <h1>Paintings Now</h1>
                </div>
                <p class="card-text"><span>+100,000</span> of the best art pieces that will spoil your eyes</p>
                <button href=""><span>Discover</span></button>
            </div>
            <img src="/assets/img/discover.png"/>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Categories -->
<section class="CategoriesSection">
    <h1>shop by Category</h1>
    <div class="Categories">
        @foreach($sections as $section)
        <div class="card">
            <div class="overlay">
                <img class="" src="assets/img/a6.png" />
            </div>
            <p>{{$section->name}}</p>
        </div>
        @endforeach
    </div>
    <div class="footerButton">
        <button>view all</button>
    </div>
</section>

<!-- painting -->
<section class="paintingSection">
    <div class="outer">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Last Paintings : </h3>
            </div>
            <div class="buttonss">
                <a class="btn btn-primary" href="#carouselExampleIndicators2" role="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary " href="#carouselExampleIndicators2" role="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                       @php
                       $chunkedProducts = $products->chunk(4); // Split products into chunks of 4

                       @endphp
                       @foreach ($chunkedProducts as $key => $chunk)
                       <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="row">
                            @foreach ($chunk as $product)
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            
                                            <img src="{{ asset('productImages/'.$product->img) }}" alt="product pic"
                                            width="239" height="136"
                                            />
                                        </div>
                                        <div class="info">
                                            @php
                                            $ownerArtist = DB::table('users')->where('id',$product->artist_id)->first();
                                            @endphp
                                            <h2>{{$product->name}}</h2>
                                            
                                            <p><span>by: </span>{{$ownerArtist->name}}</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                        
                                    </div>
                                </div>
                                @endforeach
                                
                              
                            </div>
                        </div>
                      
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Seller -->
<section class="SellerSection">
    <div class="outer">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Best Seller  : </h3>
            </div>
            <div class="buttonss">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators3" role="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators3" role="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="outerCard">
                                        <div class="cardImg">
                                            <img src="assets/img/cardimg.svg"/>
                                        </div>
                                        <div class="info">
                                            <h2>Autumn fallen leaves</h2>
                                            <p><span>by: </span>Horace Cooper</p>
                                        </div>
                                        <div class="footerBtn">
                                            <button>ADD TO CART</button>
                                        </div>
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

<!-- Artist -->
<section class="ArtistSection">
    <div class="outer">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Popular Artists </h3>
            </div>
            <div class="buttonss">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators4" role="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators4" role="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators4" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                        $chunkedArtists = $artists->chunk(4);
                        @endphp

                        @foreach($chunkedArtists as $artKey => $artChunk)
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach($artChunk as $artist)

                                @php
                                $products = DB::table('products')->where('artist_id', $artist->id)->take(4)->get();
                                @endphp
                               
                   
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                        @for ($i = 0; $i < 4; $i++)
                                        @if (isset($products[$i]))
                                            <div class="grid-item">
                                                <img src="{{ asset('productImages/'.$products[$i]->img) }}" alt="painting" />
                                            </div> 
                                        @else
                                        <div class="grid-item">
                                        <img src="assets/img/a{{ $i + 1 }}.png" / alt="painting">
                                        </div>
                                        @endif
                                        @endfor    
                                           
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="{{ asset('userImages/'.$artist->img) }}" alt="artist" />
                                            </div>
                                            <div  class="info">
                                                <h2>{{$artist->name}}</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                            </div>
                        </div>
                      @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Gallery -->
<section class="GallerySection">
    <h1>Gallery </h1>
    <p data-aos="fade-down">The most beautiful paintings ...</p>
    <div class="image-grid">
        <div class="image-grid-col-2">
            <img style="background-size: cover;"   src="assets/img/a1.png" alt="Image 1">
        </div>
        <div>
            <img  src="assets/img/a2.png" alt="Image 2">
        </div>
        <div class=" image-grid-row-2">
            <img  src="assets/img/a3.png" alt="Image 3">
        </div>
        <div>
            <img  src="assets/img/a4.png" alt="Image 4">
        </div>
        <div>
            <img  src="assets/img/a5.png" alt="Image 5">
        </div>
        <div>
            <img   src="assets/img/a6.png" alt="Image 6">
        </div>
    </div>
    <div class="footerButton">
        <button>view all</button>
    </div>
</section>

<!-- WhyArtFeat -->
<section class="WhyArtFeat">
    <div class=" row">
        <div class="col-lg-6">
            <div class="header">
                <h1>Why ArtFeat</h1>
            </div>
            <div class="content" data-aos="fade-up">
                @if($whyArtfeatText)
                <p>{{$whyArtfeatText}}</p>
                @else<p>No Text</p>
                @endif
            </div>
            <div class="learnMore">
                <button class="botton" type="submit" onclick="">Learn More </button>
            </div>
        </div>
        <div class="LeftImages col-lg-6">
            <div data-aos="fade-up" data-aos-delay="1000"><img src="assets/img/a4.png" alt="img"></div>
            <div  data-aos="fade-up" data-aos-delay="1500" ><img src="assets/img/a1.png" alt="img"></div>
            <div data-aos="fade-up" data-aos-delay="2000" ><img src="assets/img/a5.png" alt="img"></div>
        </div>
    </div>

</section>

<!-- Join Creators -->
<section class="Creators">
    <div class="inner">
        <div class="info">
            <h1>Join Our </h1>
            <h1> List of Creators</h1>
            <button><span>Register now</span></button>
        </div>
        <div class="users">
            <div class="user1" >
                <img src="assets/img/p1.png"/>
                <div>
                    <p>View profile</p>
                </div>
            </div>
            <div class="user2">
                <img  src="assets/img/p2.png"/>
                <div>
                    <p>View profile</p>
                </div>
            </div>
            <div class="user3">
                <img src="assets/img/p3.png"/>
                <div>
                    <p>View profile</p>
                </div>
            </div>
            <div class="user4">
                <img src="assets/img/p1.png"/>
                <div>
                    <p>View profile</p>
                </div>
            </div>
            <div class="user5">
                <img src="assets/img/p1.png"/>
                <div>
                    <p>View profile</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection