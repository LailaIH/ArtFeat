@extends('commonlanding')
@section('content')

<div class="pageHeaderLiveStreaming">
      <div class="overLay">
        <img class="desktop" src="/assets/img/HeaderBgLiveStraming.png" />
        <img class="mobile" src="/assets/img/shadowRed.svg" />
      </div>
      <div class="header">
        <div class="content">
          <h1>Live Streaming</h1>
          <p>Watch live broadcast now ...</p>
        </div>
      </div>
    </div>
   <div class="liveStreamingSections">
    <div class="pageContent">
         <div class="coverLiveImg">
            <img src="/assets/img/testLive.png" alt="">
         </div>
         <div class="liveInfo">
            <div class="info">
                <div class="Avatar">
                  <img src="/assets/img/p1.png" />
                  <div class="live">Live</div>
                </div>
                <div class="infoCard">
                  <h2>Join us to watch this broadcast</h2>
                  <p>Live Start : <span>04:59 AM</span></p>
                </div>
              </div>
              <div class="info">
                <img src="/assets/img/icon _person_.svg" alt="">
                <div class="views">6,545</div>
              </div>
         </div>

         <form action="">
            <div class="headerChat">
                <h1>LIVE STREAM CHAT :</h1>
            </div>
            <div class="boxChat">
               <div class="person">
                <img src="/assets/img/p2.png" alt="">
                <div class="name">Ahmed</div>
                <div class="message">Hello it look a great broadcast</div>
               </div>
               <div class="person">
                <img src="/assets/img/p2.png" alt="">
                <div class="name">Ahmed</div>
                <div class="message">Hello it look a great broadcast</div>
               </div>
               <div class="person">
                <img src="/assets/img/p2.png" alt="">
                <div class="name">Ahmed</div>
                <div class="message">Hello it look a great broadcast</div>
               </div>
               <div class="person">
                <img src="/assets/img/p2.png" alt="">
                <div class="name">Ahmed</div>
                <div class="message">Hello it look a great broadcast</div>
               </div>
            
            <div class="footerBox">
                <input type="text">
                <button>send</button>
            </div>
        </div>
         </form>
    </div>
</div>
@endsection