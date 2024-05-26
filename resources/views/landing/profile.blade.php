<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />

    <link rel="icon" type="image/x-icon" href="Images/fave.svg" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="assets/css/index2.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/pro.css" />

    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <title>ArtFeat</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav>
      <div class="logo">
        <!------- Logo ------->
        <img src="/assets/logo.png" />
      </div>
      <input type="checkbox" id="click" />
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
        <div class="headerButtons">
          <!------- Login buttons ------->
          <div class="innerContent">
            <div class="signUp">
              <button class="botton" type="submit" onclick="">Sign Up</button>
            </div>
            <div class="line"></div>
            <button>
              <img src="/assets/Heart (1).svg" />
            </button>
            <button>
              <img src="/assets/Profile.svg" />
            </button>
            <button>
              <img src="/assets/Cart.svg" />
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

    <section class="profileSection">
      <div class="outerProfile">
        <div class="innerProfile">
          <div class="header">
            <div class="coverPhoto">
              <img src="/assets/bg.png" />
              <button class="editIcon">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </button>
            </div>
            <div class="profileImg">
              <div class="avatar">
                <img src="/assets/p2.png" />
                <button class="editIcon">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
              </div>
            </div>
            <div class="info">
              <div><h3 class="name">Charles Deo</h3></div>
              <div class="actions">
              <div><span></span>Art work</div>
                <div><span>4</span>followers</div>
                <div><span>55</span>following</div>
                <button>Edit Account</button>
              </div>
            </div>
          </div>
          <div class="outerSections">
            <div class="innerSections">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button
                    class="nav-link active"
                    id="nav-home-tab"
                    data-toggle="tab"
                    data-target="#nav-Work"
                    type="button"
                    role="tab"
                    aria-controls="nav-home"
                    aria-selected="true"
                  >
                    Art Work
                  </button>
                  <button
                    class="nav-link"
                    id="nav-profile-tab"
                    data-toggle="tab"
                    data-target="#nav-Collections"
                    type="button"
                    role="tab"
                    aria-controls="nav-profile"
                    aria-selected="false"
                  >
                    Collections
                  </button>
                  <button
                    class="nav-link"
                    id="nav-contact-tab"
                    data-toggle="tab"
                    data-target="#nav-Favorites"
                    type="button"
                    role="tab"
                    aria-controls="nav-contact"
                    aria-selected="false"
                  >
                    Favorites
                  </button>
                  <button
                    class="nav-link"
                    id="nav-contact-tab"
                    data-toggle="tab"
                    data-target="#nav-About"
                    type="button"
                    role="tab"
                    aria-controls="nav-contact"
                    aria-selected="false"
                  >
                    About
                  </button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="nav-Work"
                  role="tabpanel"
                  aria-labelledby="nav-home-tab"
                >
                  <div class="flexbin flexbin-margin">
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?man" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?green" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?sea" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?office" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?dog" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?cat" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?tree" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?sky" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?sea" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?design" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                    <div class="outerImage">
                      <img src="https://source.unsplash.com/featured/?woman" />
                      <div class="select">
                        <select name="cars" id="cars">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <div class="title">The Century Oak</div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade collections"
                  id="nav-Collections"
                  role="tabpanel"
                  aria-labelledby="nav-profile-tab"
                >
                  <div class="addnew">
                    <button>Add Collection</button>
                  </div>
                  <div class="outerCollections">
                    <div class="outerCard">
                      <button class="delete">
                        <img src="/assets/img/Delete.svg" alt="" />
                      </button>
                      <div class="grid-container">
                        <div class="grid-item">
                          <img src="/assets/img/a1.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/img/a2.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/img/a3.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/img/a4.png" />
                        </div>
                      </div>
                      <div class="text">CREATIVE COLLECTION</div>
                      <div class="overLay"></div>
                    </div>
                    <div class="outerCard">
                      <button class="delete">
                        <img src="/assets/img/Delete.svg" alt="" />
                      </button>
                      <div class="grid-container">
                        <div class="grid-item">
                          <img src="/assets/a1.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a2.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a3.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a4.png" />
                        </div>
                      </div>
                      <div class="text">CREATIVE COLLECTION</div>
                      <div class="overLay"></div>
                    </div>
                    <div class="outerCard">
                      <button class="delete">
                        <img src="/assets/Delete.svg" alt="" />
                      </button>
                      <div class="grid-container">
                        <div class="grid-item">
                          <img src="/assets/a1.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a2.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a3.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a4.png" />
                        </div>
                      </div>
                      <div class="text">CREATIVE COLLECTION</div>
                      <div class="overLay"></div>
                    </div>
                    <div class="outerCard">
                      <button class="delete">
                        <img src="/assets/Delete.svg" alt="" />
                      </button>
                      <div class="grid-container">
                        <div class="grid-item">
                          <img src="/assets/a1.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a2.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a3.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a4.png" />
                        </div>
                      </div>
                      <div class="text">CREATIVE COLLECTION</div>
                      <div class="overLay"></div>
                    </div>
                    <div class="outerCard">
                      <button class="delete">
                        <img src="/assets/Delete.svg" alt="" />
                      </button>
                      <div class="grid-container">
                        <div class="grid-item">
                          <img src="/assets/a1.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a2.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a3.png" />
                        </div>
                        <div class="grid-item">
                          <img src="/assets/a4.png" />
                        </div>
                      </div>
                      <div class="text">CREATIVE COLLECTION</div>
                      <div class="overLay"></div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="nav-Favorites"
                  role="tabpanel"
                  aria-labelledby="nav-contact-tab"
                >
                  <div class="outerFav">
                    <div class="innerFav">
                      <div class="FavCard">
                        <img class="bg" src="/assets/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="FavCard">
                        <img class="bg" src="/assets/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="FavCard">
                        <img class="bg" src="/assets/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="FavCard">
                        <img class="bg" src="/assets/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/save_icon.svg" alt="" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="FavCard">
                        <img class="bg" src="/assets/f1.png" />
                        <div class="info">
                          <div>
                            <div class="title">Art Title</div>
                            <div class="name">Artist Name</div>
                          </div>
                          <div class="saves">
                            <div class="num">512</div>
                            <div class="icon">
                              <img src="/assets/save_icon.svg" alt="" />
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
                  aria-labelledby="nav-contact-tab"
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
                        <img src="/assets/Facebook2.svg" />
                        <div>ArtistnameonFacebook</div>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/instagram.svg" />
                        <div>IGHandler</div>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/website.svg" />
                        <div>www.websitename.com</div>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="/assets/Behance.svg" />
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

    <div class="outerFooter">
      <div class="innerFooter">
        <div class="content">
          <div class="Logo">
            <div>
              <img src="/assets/logo.png" />
            </div>
            <p>Get the latest updates</p>
            <div>
              <div class="custom-input">
                <input
                  type="text"
                  class="custom-search-input"
                  placeholder="Enter your email"
                />
                <button class="input-botton" type="submit" onclick="">
                  Go
                </button>
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
              <a><img src="/assets/Facebook.svg" /></a>
              <a><img src="/assets/instagram.svg" /></a>
              <a><img src="/assets/twitch.svg" /></a>
              <a><img src="/assets/twitter.svg" /></a>
            </div>
          </div>
        </div>
      </div>
      <div class="privacy">©2023 ArtFeat, All rights reserved</div>
    </div>
  </body>
</html>
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"
></script>
<script
  src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"
></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"
></script>

<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"
></script>
