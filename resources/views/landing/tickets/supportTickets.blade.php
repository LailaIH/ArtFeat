@extends('commonlanding2')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/profile.css')}}">

<div class="pageHeader" >
      <img src="/assets/img/termsconditions.svg" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
      @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
        <h1>{{ __('mycustom.supportTickets')}}</h1>
      </div>
    </div>

    <div class="outerSections" style=" padding: 4rem;">
            <div class="innerSections"style=" border: 3px solid #ccc; border-radius: 20px;  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); "
            >
              <nav
               >
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                  <button
                    class="nav-link {{$tab==='open'?  'active' : '' }}"
                    id="nav-Open-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Open"
                    type="button"
                    role="tab"
                    aria-controls="nav-Open"
                    aria-selected="{{$tab==='open'? 'true' : 'false' }}"
                  >
                  {{__('mycustom.openedTickets')}}
                  </button>


                  <button
                    class="nav-link {{$tab==='close'?  'active' : '' }}"
                    id="nav-Collections-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-Collections"
                    type="button"
                    role="tab"
                    aria-controls="nav-Collections"
                    aria-selected="{{$tab==='close'? 'true' : 'false' }}"
                  >
                  {{__('mycustom.closedTickets')}}
                  </button>

                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">

                <div
                    class="tab-pane fade {{$tab==='open'? 'show active' : '' }} artwork p-4"
                    id="nav-Open"
                    role="tabpanel"
                    aria-labelledby="nav-Open-tab"
                    >
           
                
                  <div class="addnew">
                    <a href="#">
                    <button data-bs-toggle="modal" data-bs-target="#ticketModal" >{{__('mycustom.addNewTicket')}}</button></a>
                  </div>

                  <!-- new ticket modal -->

                <div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="exampleModalLabelTicket" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabelTicket">{{__('mycustom.addNewTicket')}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="{{route('addTicket')}}">
                            @csrf
                        
                            {{__('mycustom.ticketTitle')}}
                            <input class="form-control"  name="title" required/>
                            <br>

                            {{__('mycustom.ticketBody')}}
                            <textarea class="form-control"  name="body" required></textarea>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('mycustom.save')}}</button>
                    </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- end  modal -->

                    @if(count($tickets)>0)

                    <table class="table">
                        <tr>
                            <th>{{__('mycustom.title')}}</th>
                            <th>{{__('mycustom.body')}}</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach($tickets as $ticket) 
                        <tr>
                            <td>{{$ticket->title}}</td>
                            <td>
                        @php
                            $words = explode(' ', $ticket->body);
                            $body = implode(' ', array_slice($words, 0, 9)).'...';
                        @endphp
                                {{$body}}
                            
                            </td>

                            <td>
                              <form method="get" action="{{route('showRepliesOfTicket',$ticket->id)}}">
                                @csrf
                              <button class="btn btn-primary btn-sm show-replies" data-ticket-id="{{$ticket->id}}">
                                {{__('mycustom.showReplies')}}
                                </button>
                              </form>
                            </td>
                            <td>
                              <form method="post" action="{{route('closeTicket',$ticket->id)}}" onsubmit="return confirmCloseTicket();">
                               @csrf
                               @method('PUT')
                              <button type="submit"  class="btn btn-danger btn-sm">
                                {{__('mycustom.closeTicket')}}</button>
                              </form>
                            </td>
                        </tr>
                
                  
                @endforeach

                  
           
            </table>
       


               




                    @else
                        <h6>{{__('mycustom.noTickets')}}</h6>
                    @endif    
                
                
                </div>

                <div
                  class="tab-pane fade {{$tab==='close'? 'show active' : '' }} p-4 "
                  id="nav-Collections"
                  role="tabpanel"
                  aria-labelledby="nav-Collections-tab"
                  
                >

               
                @if(count($closedTickets)===0)
                <h6>{{__('mycustom.noClosedTickets')}}</h6>

                @else

                <ul>
                @foreach($closedTickets as $closedTicket)
                <li class="text-danger"><b>{{$closedTicket->title}}</b></li>
                @endforeach
                </ul>
              
              
              
              
              @endif
              
               
              
              
              </div>

              </div>


            </div>
        </div>



<script>
function confirmCloseTicket() {
    return confirm("Are you sure you want to close this ticket?");
}
</script>


@endsection