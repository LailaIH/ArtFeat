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
                    <div class="card-header">Paid Invoices List</div>
                    @if (session('success'))

                    <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                    @endif
                    @if ($errors->has('fail'))
                        <div class="alert alert-danger m-3">
                            {{ $errors->first('fail') }}
                        </div>
                    @endif

                        @if ($orders->isEmpty())
                        <div class="card-body">
                         No Orders
                         </div>
                        @else
                        <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        
                                        <th>User</th>
                                        <th>Product </th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td class=" text-black"><b>{{ $order->user->name }}</b></td>
                                            <td style="color: blue;">{{ $order->product->name }}</td>
                                            <td>{{$order->invoice->total_price / $order->product->price}}</td>
                                            <td class="@if($order->status === 'completed') text-green 
           @elseif($order->status === 'pending') text-black 
           @else text-red 
           @endif"><b>
                                                {{$order->status}}</b>
                                            </td>
                                            @if($order->note != null)
                                            <td>                 
                                             @php
                                                $words = str_word_count($order->note, 1);
                                                $first5Words = implode(' ', array_slice($words, 0, 5));
                                            @endphp

                                            {{ $first5Words }}

                                            @if (count($words) > 5)
                                                ...
                                            @endif
                                        </td>
                                            @else 
                                            <td>no note</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary btn-xs">Edit</a>

                                            </td>
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


