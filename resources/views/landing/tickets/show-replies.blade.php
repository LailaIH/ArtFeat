@extends('commonlanding2')
@section('content')

<div class="row gx-4 p-5">
                    <div class="col-12">
                    <div class="card mb-4">
                    <div class="card-header">
                    {{__('mycustom.ticket')}}
                    </div>

                    <div class="card-body p-3">
                        <textarea class="form-control"  type="text"  readonly>{{ $ticket->body }}</textarea>
                      
                    
                    </div>
                    </div>
                    <div class="card card-header-actions mb-4">
                       <div class="card-header">
                       {{__('mycustom.replies')}}
                                    <i class="text-muted" data-feather="info" data-bs-toggle="tooltip" data-bs-placement="left" title="The post preview text shows below the post title, and is the post summary on blog pages."></i>
                                    </div>
                                    <div class="card-body p-4">
                                        <ul>
                                            @foreach ($relatedTickets as $relatedTicket)
                                                        <li class="mb-2">
                                                            <b class="{{ $relatedTicket->user->id !== auth()->user()->id ? 'text-danger' : 'text-success' }}">
                                                                @if($relatedTicket->user->id !== auth()->user()->id)
                                                                    <span class="text-danger">Admin {{ $relatedTicket->user->name }}</span>
                                                                @else
                                                                   me
                                                                @endif
                                                            </b>
                                                            {{ $relatedTicket->body }}
                                                        </li>
                                            @endforeach
                                        </ul>
                        <br>
                    <h4>{{__('mycustom.replyToThisTicket')}}</h4>
              
                    <form method="POST" action="{{ route('replyToTicket') }}">
                        @csrf
                        <div>
                            
                            <input name="parent_id" type="hidden" value="{{$ticket->id}}"/>
                        <textarea class="form-control" name="body" id="body"required></textarea>
                        @error('body')
                                    {{$message}}
                                    @enderror
                    </div>
                        <div>
                            <br>
                            
                            <button class="btn btn-primary btn-sm " type="submit">{{__('mycustom.submitReply')}}</button>
                            <a href="{{route('showTickets')}}" class="btn btn-secondary btn-sm">{{__('mycustom.backToTickets')}}</a>

                        </div>
                    </form>

                  

              
           

                </div>
                    </div>
          
                    </div>
</div>



@endsection