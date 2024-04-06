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
        <img src="{{asset('assets/img/logo.svg')}}">
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
                    <img src="{{asset('assets/img/Heart (1).svg')}}"/>
                </button>
                <button>
                    <img src="{{asset('assets/img/Profile.svg')}}"/>
                </button>
                <button>
                    <img src="{{asset('assets/img/Cart.svg')}}"/>
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


@yield('content')



<!-- FOOTER -->
<div class="outerFooter">
    <div class="innerFooter">
        <div class="content">
            <div class="Logo">
                <div>
                    <img src="{{asset('assets/img/logo.png')}}"/>
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
                    <a><img src="{{asset('assets/img/Facebook.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/instagram.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/twitch.svg')}}"/></a>
                    <a><img src="{{asset('assets/img/twitter.svg')}}"/></a>
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
</html>
