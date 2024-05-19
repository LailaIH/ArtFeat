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
                    <div class="card-header">Edit Order</div>
                    <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('orders.update',$order) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                            
                            <label class="small mb-1">User</label>
                            <input value="{{$order->user->name}}" class="form-control" readonly/>
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1">Product</label>
                            
                            <input value="{{$order->product->name}}" class="form-control" readonly/>

                        </div>
                        </div>
                       

                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                            <label class="small mb-1" for="note">Note</label>
                            <input value="{{$order->note}}" type="text" name="note" id="note" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="max_products">Status</label>
                            <select name="status" id="status" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select a status</option>
                               <option value="pending" @if($order->status === 'pending') selected @endif>pending</option>
                               <option value="completed" @if($order->status === 'completed') selected @endif>completed</option>
                               <option value="canceled" @if($order->status === 'canceled') selected @endif>canceled</option>
                               
                            </select>                     
                           </div>
                        </div>

                    


                    <div>
                        <button type="submit" class="btn btn-primary">Edit Order</button>
                    </div>
                    </form>

            </div>
        </div>
        </div>
    </main>


@endsection


