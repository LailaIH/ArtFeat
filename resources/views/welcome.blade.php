<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="Images/fave.svg">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>ArtFeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<nav>
    <div class="logo">
        <!------- Logo ------->
        <img src="assets/img/logo.svg">
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
        <i class="fa fa-bars"></i>
    </label>
    <ul>
        <!------- Links ------->
        <div class="links">
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Artists</a></li>
            <li><a href="#">Who we are</a></li>
            <li><a href="#">I’m an Artist</a></li>
        </div>
        <div class="headerButtons  ">

            <!------- Login buttons ------->
            <div class="innerContent">
                <div class="signUp">
                    <button class="botton" type="submit" onclick="">Sign Up</button>
                </div>
                <div class="line"></div>
                <button>
                    <img src="assets/img/Heart (1).svg"/>
                </button>
                <button>
                    <img src="assets/img/Profile.svg"/>
                </button>
                <button>
                    <img src="assets/img/Cart.svg"/>
                </button>
            </div>
        </div>

    </ul>
</nav>
<div class="searchBar">
    <div class="inner">
        <div class="links">
            <a>Paintings</a>
            <a>Photography</a>
            <a>Drawings</a>
            <a>Sculpture</a>
            <a>Digital</a>
            <a>Live</a>
        </div>
        <input />
    </div>
</div>
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
        <div class="card">
            <div class="overlay">
                <img class="" src="assets/img/a6.png" />
            </div>
            <p>Abstract art</p>
        </div>
        <div class="card">
            <div class="overlay">
                <img class="" src="assets/img/a6.png" />
            </div>
            <p>Abstract art</p>
        </div>
        <div class="card">
            <div class="overlay">
                <img class="" src="assets/img/a6.png" />
            </div>
            <p>Abstract art</p>
        </div>
        <div class="card">
            <div class="overlay">
                <img class="" src="assets/img/a6.png" />
            </div>
            <p>Abstract art</p>
        </div>
        <div class="card">
            <div class="overlay">
                <img class="" src="assets/img/a6.png" />
            </div>
            <p>Abstract art</p>
        </div>
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
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3  mb-3">
                                    <div class="ArtistCard">
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <img src="assets/img/a1.png" />
                                            </div>
                                            <div class="grid-item">
                                                <img src="assets/img/a2.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a3.png" />
                                            </div><div class="grid-item">
                                                <img src="assets/img/a4.png" />
                                            </div>
                                        </div>
                                        <div class="footerCard">
                                            <div class="Avatar">
                                                <img src="assets/img/p1.png" />
                                            </div>
                                            <div  class="info">
                                                <h2>Andrii Kovalyk</h2>
                                                <p><span>255 </span>sales</p>
                                                <div class="ratting">

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
                <p>@php
                    $options = DB::table('options')->first();
                @endphp

                @if ($options)
                    <p>{{ $options->why_artfeat_text }}</p>
                @else
                    <p>Why Artfeat Text not found.</p>
                    @endif</p>
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
<!-- FOOTER -->
<div class="outerFooter">
    <div class="innerFooter">
        <div class="content">
            <div class="Logo">
                <div>
                    <img src="assets/img/logo.png"/>
                </div>
                <p>Get the latest updates</p>
                <div>
                    <div class="custom-input">
                        <input type="text" class="custom-search-input" placeholder="Enter your email">
                        <button class="input-botton" type="submit" onclick="">Go </button>
                    </div>
                </div>
            </div>
            <div class="innerContent">
                <h2>About</h2>
                <a>All Artworks</a>
                <a>Virtual World</a>
                <a>Artists</a>
            </div>
            <div class="innerContent">
                <h2>More Info</h2>
                <a>Become a Partners</a>
                <a>FAQ</a>
                <a>Support</a>
                <a>Privacy Policy</a>
            </div>
            <div class="followus">
                <h2>Follow Us</h2>
                <div class="outer">
                    <a><img src="assets/img/Facebook.svg"/></a>
                    <a><img src="assets/img/instagram.svg"/></a>
                    <a><img src="assets/img/twitch.svg"/></a>
                    <a><img src="assets/img/twitter.svg"/></a>
                </div>
            </div>
        </div>
    </div>
    <div class="privacy">
        ©2023 ArtFeat, All rights reserved
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/owl.carousel.js"></script>
<script>

    AOS.init({
        duration: 1300,

    })
    const passwordInput = document.querySelector(".password-input")
    const eyeBtn = document .querySelector(".eye-btn");

    eyeBtn.addEventListener("click" , () =>{
        if(passwordInput.type === "password"){
            passwordInput.type = "text";
            eyeBtn.innerHTML = "<i class='uil uil-eye'></i>";
        }
        else{
            passwordInput.type = "password"
            eyeBtn.innerHTML = "<i class='uil uil-eye-slash'></i>"
        }
    })

</script>
