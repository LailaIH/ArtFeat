@extends('commonlanding')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/WhoWeAre.css')}}">

    <div class="WhoWeAre">
      <div class="WhoFirstSection row">
        <div class="Right col-lg-5">
          <div class="header">
            <h1>WHO WE ARE</h1>
            <h3>
              ArtFeat Is a platform Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Duis auctor efficitur velit at commodo.
            </h3>
          </div>
          <div class="content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
              auctor efficitur velit at commodo. Proin rutrum ante a urna
              gravida commodo. Suspendisse potenti. Aliquam erat volutpat. Morbi
              id posuere ligula. In euismod purus id sapien bibendum, in congue
              lacus ultrices. Sed a eleifend ipsum. Pellentesque habitant morbi
              tristique senectus et netus et malesuada fames ac turpis egestas.
              Vestibulum semper, nibh eu consequat accumsan, tellus metus tempor
              velit, nec lacinia velit mauris vitae urna. Proin non urna sit
              amet metus vulputate bibendum. Duis id mauris lobortis, finibus
              purus sed, semper mi. Aliquam id facilisis enim, vel consequat
              nulla. Curabitur condimentum, ante at mollis dapibus, neque mauris
              iaculis augue, ac ullamcorper felis lacus sit amet massa.
              Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
              posuere cubilia Curae; Nullam pharetra sapien in metus placerat,
              nec faucibus velit rutrum.
            </p>
          </div>
        </div>
        <div class="LeftImages col-lg-6">
          <div>
            <img src="{{asset('assets/img/WhoWeAre1.svg')}}" alt="" />
          </div>
        </div>
      </div>
      <div class="WhoSecondSection row">
        <div class="RightImage col-lg-3">
          <div><img src="{{asset('assets/img/WhoWeAre2.svg')}}" alt="img" /></div>
        </div>
        <div class="Left col-lg-8">
          <div class="header">
            <h1>Our Value</h1>
          </div>
          <div class="content">
            <p>
              Pellentesque habitant morbi tristique senectus et netus et
              malesuada fames ac turpis egestas. Vestibulum semper, nibh eu
              consequat accumsan, tellus metus tempor velit, nec lacinia velit
              mauris vitae urna. Proin non urna sit amet metus vulputate
              bibendum. Duis id mauris lobortis, finibus purus sed, semper mi.
              Aliquam id facilisis enim, vel consequat nulla. Curabitur
              condimentum, ante at mollis dapibus, neque mauris iaculis augue,
              ac ullamcorper felis lacus sit amet massa. Vestibulum ante ipsum
              primis in faucibus orci luctus et ultrices posuere cubilia Curae;
              Nullam pharetra sapien in metus placerat, nec faucibus velit
              rutrum.
            </p>
          </div>
        </div>
      </div>
      <div class="WhoFirstSection row">
        <div class="Right col-lg-6">
          <div class="header">
            <h1>Join our Artists</h1>
          </div>
          <div class="content">
            <p>
              Pellentesque habitant morbi tristique senectus et netus et
              malesuada fames ac turpis egestas. Vestibulum semper, nibh eu
              consequat accumsan, tellus metus tempor velit, nec lacinia velit
              mauris vitae urna. Proin non urna sit amet metus vulputate
              bibendum. Duis id mauris lobortis, finibus purus sed, semper mi.
              Aliquam id facilisis enim, vel consequat nulla. Curabitur
              condimentum, ante at mollis dapibus, neque mauris iaculis augue,
              ac ullamcorper felis lacus sit amet massa. Vestibulum ante ipsum
              primis in faucibus orci luctus et ultrices posuere cubilia Curae;
              Nullam pharetra sapien in metus placerat, nec faucibus velit
              rutrum.
            </p>
          </div>
        </div>
        <div class="LeftImages col-lg-6">
          <div>
            <img src="{{asset('assets/img/WhoWeAre3.svg')}}" alt="" />
          </div>
        </div>
      </div>
    </div>

@endsection