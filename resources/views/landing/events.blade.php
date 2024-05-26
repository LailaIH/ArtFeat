@extends('commonlanding')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/event.css')}}" />

    <!-- Events -->
    <section id="events" class="text-center">
      <div class="text-center">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
          <!-- The selector points -->
          <div class="carousel-indicators mb-4">
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <!--  -->
          <div class="carousel-inner">
            <div class="carousel-item active c-item" data-bs-interval="10000">
              <a href="#first">
                <img
                  src="{{asset('assets/img/events/alina-grubnyak-IsxaFsXi2rs-unsplash.jpg')}}"
                  class="d-block w-100 c-img"
                  alt="go to event 1"
                />
              </a>

              <div class="carousel-caption d-none d-md-block p-3">
                <h3>Event 1</h3>
                <p>
                  Some representative placeholder content for the first slide.
                </p>
              </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="2000">
              <a href="#second"
                ><img
                  src="{{asset('assets/img/events/anna-kolosyuk-D5nh6mCW52c-unsplash.jpg')}}"
                  class="d-block w-100 c-img"
                  alt="..."
              /></a>

              <div class="carousel-caption d-none d-md-block">
                <h3>Event 2</h3>
                <p>
                  Some representative placeholder content for the second slide.
                </p>
              </div>
            </div>
            <div class="carousel-item c-item">
              <a href="#third">
                <img
                  src="{{asset('assets/img/events/portrait-woman-made-with-newspapers-paint-ai-generated.jpg')}}"
                  class="d-block w-100 c-img"
                  alt="..."
                />
              </a>

              <div class="carousel-caption d-none d-md-block">
                <h3>Event 3</h3>
                <p>
                  Some representative placeholder content for the third slide.
                </p>
              </div>
            </div>
          </div>
          <!-- prev-next -btns -->
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- Event details -->
    <section class="p-5 pb-4" id="first">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md p-5">
            <h1>First <span class="text-warning">Event</span></h1>
            <p class="lead">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam
              quaerat, fuga aut vero dolor quia?
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste
              debitis veniam in animi magnam quis quia neque hic quae numquam
              dicta nobis alias, ea iure! Voluptatem in accusantium officia
              vitae!
            </p>
          </div>
          <div class="col-md pt-4 event-pic">
            <img
              src="{{asset('assets/img/events/alina-grubnyak-IsxaFsXi2rs-unsplash.jpg')}}"
              alt=""
              class="img-fluid event-pic"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- Second event detail -->
    <section class="p-5 second-event" id="second">
      <div class="container row justify-content-between">
        <div class="col-md">
          <img
            src="{{asset('assets/img/events/anna-kolosyuk-D5nh6mCW52c-unsplash.jpg')}}"
            alt=""
            class="img-fluid event-pic"
          />
        </div>

        <div class="col-md p-5">
          <h1>second <span class="text-warning">Event</span></h1>
          <p class="lead">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam
            quaerat, fuga aut vero dolor quia?
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste
            debitis veniam in animi magnam quis quia neque hic quae numquam
            dicta nobis alias, ea iure! Voluptatem in accusantium officia vitae!
          </p>
        </div>
      </div>
    </section>
    <!-- Third event -->
    <!-- Third event detail -->
    <section class="p-5 third-event" id="third">
      <div class="container row justify-content-between">
        <div class="col-md p-5">
          <h1>Third <span class="text-warning">Event</span></h1>
          <p class="lead">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi,
            magnam.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa,
            tenetur!
          </p>
          <!-- Creative Touch: Animated Illustration -->
        </div>

        <div class="col-md">
          <img
            src="{{asset('assets/img/events/portrait-woman-made-with-newspapers-paint-ai-generated.jpg')}}"
            alt=""
            class="img-fluid event-pic"
          />
        </div>
      </div>
    </section>

  @section('footer')    

    <script src="Events.js"></script>
    <!-- JavaScript (bundle includes Popper.js) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

@endsection

@endsection

