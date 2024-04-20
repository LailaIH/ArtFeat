@extends('layout')

@section('content')


    <main>
        <header class="page-header page-header-dark bg-danger pb-5">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-md-6 mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Welcome {{ Auth::user()->name }}
                            </h1>
                            <div class="page-header-subtitle text-white-75">This panel is shown only to those who have the special permission. Please be careful when using the options.</div>
                        </div>
                        <div class="col-12 col-md-6 mt-4 text-right">
                            <a href="/options/settings" class="btn btn-outline-white rounded-pill btn-sm" role="button">Panel Settings <i class="fas fa-cog ml-1"></i></a>
                            <a href="/home" class="btn btn-outline-white rounded-pill btn-sm ml-1" role="button">Exit <i class="fas fa-arrow-left ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n5">





           


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Tickets List List</div>

                    @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif

                        @if ($tickets->isEmpty())
                        <div class="card-body">
                         <form method="GET" action="{{route('tickets.create')}}">
                             <div class="col-md-6">
                             <label class="small mb-1 mr-5" for="max_products">No Tickets</label>
                             <button type="submit" class="btn btn-primary btn-xs">Add Ticket</button>
                             </div>
                         </form>
                         </div>
                        @else
                        <div class="card-body">
                        <a href="{{ route('tickets.create') }}" class="btn btn-success btn-sm ">Create New Ticket</a>
                        <br>
                        <br>
                            <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">
                                    <th>Ticket Title</th>
                                    <th>Ticket Body</th>
                                    <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tickets as $ticket)
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                    <td class=" text-black"><b>{{$ticket->title}}</b></td>
                                    <td>{{$ticket->body}}</td>
                                    <td>
                                    <a href="{{route('tickets.show',['ticket'=>$ticket['id']])}}"
                                    class="btn btn-primary btn-xs">
                                    Show Details 
                                   
                                    </a>
                                    </td>
                                    </tr>


                           
                            @endforeach
                            </tbody>
                            </table>
                            @endif

                       
                    </div>
        </div>
    </main>

<script>
    let table = new DataTable('#myTable');
</script>    
@endsection        
                        







