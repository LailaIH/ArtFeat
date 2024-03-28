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





            <div class="card">

                <div class="card-body">

                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <h1>Edit Product</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="row g-3" method="POST" action="{{ route('products.update', ['id'=>$product['id']]) }}">
                        @csrf
                        @method('PUT')

                        
                            <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                                </div>
                           

                            <div class="col-md-6">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>
                                {{$product->description}}
                            </textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="section_id">Section</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="" disabled selected>Select a section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" @if ($product->section_id == $section->id) selected @endif>{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required
                            value="{{$product->price}}"> 
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="stock_quantity">Stock Quantity</label>
                            <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" required
                            value="{{$product->stock_quantity}}">
                        </div>
                        <div class="col-12">
                            <br>
                        <img src="{{ asset('productImages/'.$product->img) }}" alt="Product Picture" width="100" height="100">
                            <br>
                            <label class="form-label" for="img">Image</label><br>
                            <input type="file" name="img" id="img" class="form-control-file" multiple>
                            <br>
                        </div>
                        
                        <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_online"  @if ($product->is_online) checked @endif>
                            <label class="form-label" for="is_online">Is Online</label>

                        </div>
                        </div>
                        
                        <div class="col-12">
                            <br>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>                
                        </form>
                </div>

            </div>
        </div>
    </main>




@endsection


