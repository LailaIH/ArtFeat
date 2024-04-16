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
                    <div class="card-header">Products List</div>
                    @if (session('success'))

                    <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                    @endif
                    @if ($errors->has('fail'))
                        <div class="alert alert-danger m-3">
                            {{ $errors->first('fail') }}
                        </div>
                    @endif

                        @if ($products->isEmpty())
                        <div class="card-body">
                         <form method="GET" action="{{route('products.create')}}">
                             <div class="col-md-6">
                             <label class="small mb-1 mr-5" for="max_products">No Products</label>
                             <button type="submit" class="btn btn-primary btn-xs">Add Product</button>
                             </div>
                         </form>
                         </div>
                        @else
                        <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 13px;">

                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Section Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Stock Quantity</th>
                                        <th>Is Online</th>
                                        <th>Image</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr style="white-space: nowrap; font-size: 13px;">

                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->user->name }}</td>
                                            <td>{{ $product->section->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock_quantity }}</td>
                                            <td>{{ $product->is_online ? 'Yes' : 'No' }}</td>
                                            <td>
                                            @if(isset($product->img))
                                            <img src="{{ asset('productImages/'.$product->img) }}" alt="Product Picture" width="100" height="100">
                                            @else
                                            <img src="{{ asset('assets/img/a4.png') }}" alt="Product Picture" width="100" height="100">
                                             @endif   
                                        </td>
                                            
                                            <td>
                                                <a href="{{ route('products.edit', ['id'=>$product['id']]) }}" class="btn btn-primary btn-xs">Edit</a>
                                                <!-- Add delete form with CSRF token for deleting a product -->

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


