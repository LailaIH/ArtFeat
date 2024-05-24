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
                            <a href="/options" class="btn btn-outline-white rounded-pill btn-sm" role="button">Panel Settings <i class="fas fa-cog ml-1"></i></a>
                            <a href="/" class="btn btn-outline-white rounded-pill btn-sm ml-1" role="button">Exit <i class="fas fa-arrow-left ml-1"></i></a>
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
                                        <img id="product-image" width="160" height="160" class="img-account-profile rounded-circle mb-1" src="{{ asset('productImages/'.$product->img) }}" alt="product pic" />
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <form>
                                     
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
                                                    <input class="form-control" value="{{ $product->name }}" readonly />
                                                  
                                               
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="description">Description</label>
                                                    <textarea  class="form-control" readonly>
                                                        {{$product->description}}
                                                       
                                                    </textarea>  
                                                                                     
                                                        </div>
                                            </div>
                                           
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                            
                                            <label class="small mb-1" for="section_id">Section</label>
                                            <input class="form-control" value="{{ $product->section->name }}" readonly />


                                            </div>


                                            <div class="col-md-6">
                                            
                                            <label class="small mb-1" for="artist_id">Artist</label>
                                          <input value="{{$product->artist->name}}" class="form-control" readonly/>
                                            </div></div>

                                            <div class="row gx-3 mb-3">
                                               
                                               <div class="col-md-6">
                                                   <label class="small mb-1" for="price">Price</label>
                                                   <input class="form-control"  type="number" value="{{ $product->price }}" readonly />
                                              
                                               
                                                </div>
                                               
                                               <div class="col-md-6">
                                                   <label class="small mb-1" for="stock_quantity">Stock Quantity</label>
                                                  
                                                   <input class="form-control"  type="number"  value="{{ $product->stock_quantity }}" readonly />

                                              
                                                       </div>

                                           </div>
                                       
                                           <div class="row gx-3 mb-3">

                                           <div class="col-md-6">

                                          
                                           <label class="small mb-1" for="artist_id">Collection</label>
                                            <input class="form-control" value="{{ $product->collection->name }}" readonly />

                                       
                                            </div>



                                           <div class="col-md-6" style="margin-top:35px;">


                                            <label style="color:red;" class="form-check-label small mb-1 ">The collection this product belongs to is offline</label>

                                            </div>
                                        </div> 
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

</main>


@endsection                       