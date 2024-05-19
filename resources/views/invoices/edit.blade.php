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
                    <div class="card-header">Edit Invoice</div>
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

                    <form action="{{ route('invoices.update',$invoice) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                            <!-- <label class="small mb-1" for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select a user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if($invoice->user->id === $user->id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select> -->
                            <label class="small mb-1" for="user_id">User</label>
                            <input value="{{$invoice->user->name}}" class="form-control" readonly/>
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="product_id">Orders</label>
                            <!-- <select name="order_id" id="order_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select an order</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}" @if($invoice->order->id === $order->id) selected @endif>{{ $order->id }}</option>
                                @endforeach
                            </select> -->
                            <input value="{{$invoice->order->id}}" class="form-control" readonly/>

                        </div>
                        </div>
                       

                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                            <label class="small mb-1" for="total_price">Price</label>
                            <input value="{{$invoice->total_price}}" type="number" name="total_price" id="total_price" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="max_products">Status</label>
                            <select name="status" id="status" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select an order</option>
                               <option value="unpaid" @if($invoice->status === 'unpaid') selected @endif>unpaid</option>
                               <option value="paid" @if($invoice->status === 'paid') selected @endif>paid</option>
                               <option value="canceled" @if($invoice->status === 'canceled') selected @endif>canceled</option>
                               
                            </select>                     
                           </div>
                        </div>

                    


                    <div>
                        <button type="submit" class="btn btn-primary">Edit Invoice</button>
                    </div>
                    </form>

            </div>
        </div>
        </div>
    </main>


@endsection


