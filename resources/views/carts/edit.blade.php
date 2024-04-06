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
                                Welcome Admin
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
                    <div class="card-header">Edit Cart</div>
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

                    <form action="{{ route('carts.update',['id'=>$cart['id']]) }}" method="POST" >
                        @csrf
                        @method('PUT')

                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                            <label class="small mb-1" for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control form-control-solid" aria-label="Default select example" >
                                <option value="" disabled selected>Select a user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if($user->id == $cart->user->id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select a product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" @if($product->id == $cart->product->id) selected @endif>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                        
                            <label class="small mb-1" for="quantity">Quantity</label>
                            <input value="{{$cart->quantity}}" type="number" name="quantity" id="quantity" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="max_products">Number Of Max Products</label>
                            <input value="{{$cart->max_products}}" type="number" name="max_products" id="max_products" class="form-control" required>
                        </div>
                        </div>


                         <div>
                        <button type="submit" class="btn btn-primary">Edit Cart</button></div>
                    </form>

            </div>
       
    </main>


@endsection


