@extends('layout')

@section('content')
<style>
.text-green{
    color: green;
} 
.text-red{
    color: red;
}
.text-black{
    color: black;
}

</style>


    <main>
        <header class="page-header page-header-dark bg-danger pb-5">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-md-6 mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Welcome {{auth()->user()->name}}
                            </h1>
                            <div class="page-header-subtitle text-white-75">This panel is shown only to those who have the special permission. Please be careful when using the options.</div>
                        </div>
                        <div class="col-12 col-md-6 mt-4 text-right">
                            <a href="/options" class="btn btn-outline-white rounded-pill btn-sm" role="button">Panel Settings <i class="fas fa-cog ml-1"></i></a>
                            <a href="/" class="btn btn-outline-white rounded-pill btn-sm ml-1" role="button">Exit <i class="fas fa-arrow-left ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n5">



                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
                    
                    <div class="card">
                    <div class="card-header">Add Artwork To Auctions Notifications</div>
                    @if (session('success'))

                    <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                    @endif
                    @if ($errors->has('fail'))
                        <div class="alert alert-danger m-3">
                            {{ $errors->first('fail') }}
                        </div>
                    @endif

                        @if ($notifications->isEmpty())
                        <div class="card-body">
                         No Notifications
                         </div>
                        @else
                        <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>Artist</th>
                                        <th>Product</th>
                                       
                                       
                                        <th>Status</th>
                                       
                                        <th></th>
                                        <th></th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($notifications as $notification)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td class=" text-black"><b>{{ $notification->user->name }}</b></td>
                                            <td>{{ $notification->product->name }}</td>

                                           
                                            <td class="@if($notification->status === 'approved') text-green 
                                                                @elseif($notification->status === 'pending') text-black 
                                                                @else text-red 
                                                                @endif"><b>
                                                {{$notification->status}}</b>
                                            </td>
                  
                                          @if($notification->status==='pending')
                                            <td>
                                                <form method="post" action="{{route('notifications.approveAuction',['productId' => $notification->product_id, 'notificationId' => $notification->id] )}}">
                                                    @csrf 
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-xs">Approve</button>
                                                </form>

                                            </td>
                                            <td>
                                            <form method="post" action="{{route('notifications.rejectAuction',$notification->id)}}">
                                                    @csrf 
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-xs">Reject</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
        
    </main>

<script>
    let table = new DataTable('#myTable');
</script>
    


@endsection


