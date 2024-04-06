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

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">




                  <div class="row m-5">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Product Picture</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img width="160" height="160" class="img-account-profile rounded-circle mb-1" src="{{ asset('productImages/'.$product->img) }}" alt="product pic" />
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <form  method="POST" action="{{ route('products.update', ['id'=>$product['id']]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" name="img" id="img" class="form-control-file" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Product Details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="name">Name</label>
                                                    <input class="form-control" id="name" type="text" name="name" value="{{ $product->name }}" required />
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="description">Description</label>
                                                    <textarea name="description" id="description" class="form-control" required>
                                                        {{$product->description}}
                                                    </textarea>                                        
                                                        </div>
                                            </div>
                                           
                                            <div class="mb-3">
                                            
                                            <label class="small mb-1" for="section_id">Section</label>
                                            <select name="section_id" id="section_id" class="form-control form-control-solid" required>
                                                <option value="" disabled selected>Select a section</option>
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}" @if ($product->section_id == $section->id) selected @endif>{{ $section->name }}</option>
                                                @endforeach
                                            </select>

                                            </div>


                                            <div class="mb-3">
                                            
                                            <label class="small mb-1" for="artist_id">Artist</label>
                                            <select name="artist_id" id="artist_id" class="form-control form-control-solid" required>
                                                <option value="" disabled selected>Select a section</option>
                                                @foreach ($artists as $artist)
                                                    <option value="{{ $artist->id }}" @if ($product->artist_id == $artist->id) selected @endif>{{ $artist->name }}</option>
                                                @endforeach
                                            </select>

                                            </div>

                                            <div class="row gx-3 mb-3">
                                               
                                               <div class="col-md-6">
                                                   <label class="small mb-1" for="price">Price</label>
                                                   <input class="form-control" id="price" type="number" name="price" value="{{ $product->price }}" required />
                                               </div>
                                               
                                               <div class="col-md-6">
                                                   <label class="small mb-1" for="stock_quantity">Stock Quantity</label>
                                                  
                                                   <input class="form-control" id="stock_quantity" type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" required />


                                                       </div>
                                           </div>
                                       

                                           <div class="col-12">

                                            <input class="form-check-input" type="checkbox" name="is_online"  @if ($product->is_online) checked @endif>

                                            <label class="form-check-label small mb-1 " for="is_online">Is Online</label>

                                            </div>
                                            <!-- Submit button-->
                                            <br>
                                            <button class="btn btn-primary" type="submit">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

</main>
@endsection                       