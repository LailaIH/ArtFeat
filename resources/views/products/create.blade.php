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
                    <div class="card-header">Create A New Product</div>
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

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                            <label class="small mb-1" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{old('name')}}">
                            @error('name')
                                    {{$message}}
                                    @enderror
                        
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                            @error('description')
                                {{$message}}
                                @enderror
                        </div>
                        </div>
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="section_id">Section</label>
                            <select name="section_id" id="section_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select a section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                                @error('section_id')
                                {{$message}}
                                @enderror
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="artist_id">Artist</label>
                            <select name="artist_id" id="artist_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select an artist</option>
                                @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                @endforeach
                                @error('artist_id')
                                {{$message}}
                                @enderror
                            </select>
                        </div></div>











<br>
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                            @error('price')
                                {{$message}}
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="stock_quantity">Stock Quantity</label>
                            <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" required>
                            @error('stock_quantity')
                                {{$message}}
                                @enderror
                        </div> 
                    </div>
                    
                            <div class="col-12">
                            <label for="img" class="custom-file-upload">
                                            Upload  Image
                                        </label>
                           <input style="display: none;" type="file" name="img" id="img" class="form-control-file" multiple >
                           @error('img')
                                {{$message}}
                                @enderror
                        </div>

                        <br>
                        <div class="col-12 form-check ">
                        <input class="form-check-input" type="checkbox" name="is_online">
                        <label class="form-check-label small mb-1 " for="is_online">Is Online</label>
                       <br>
                    </div>
                        <div>
                            <br>
                        <button type="submit" class="btn btn-primary">Create Product</button></div>
                    </form>

            </div>
        </div>
    </main>

    <script>

        //category
        // Get the category dropdown element
        const subCategorySelect = document.getElementById('subcategory');
        const subsubCategorySelect = document.getElementById('sub_sub_category');
        const categorySelect = document.getElementById('category');

        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;

            // Make the AJAX request to fetch subcategories based on the selected category
            axios.get(`/subcategories1/${categoryId}`)
                .then(function(response) {
                    const subcategories = response.data.subcategories;

                    // Clear the existing options
                    subCategorySelect.innerHTML = '';
                    subsubCategorySelect.innerHTML = '';

                    // Populate the subcategory options
                    subcategories.forEach(function(subcategory) {
                        const option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;
                        subCategorySelect.appendChild(option);
                    });



                    // Log the received data
                    //console.log(JSON.stringify(subcategories));

                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        subCategorySelect.addEventListener('change', function() {
            const categoryId = this.value;

            // Make the AJAX request to fetch subcategories based on the selected category
            axios.get(`/subsubcategories1/${categoryId}`)
                .then(function(response) {
                    const subsubcategories = response.data.subsubcategories;

                    // Clear the existing options
                    subsubCategorySelect.innerHTML = '';

                    // Populate the subcategory options
                    subsubcategories.forEach(function(subsubcategory) {
                        const option = document.createElement('option');
                        option.value = subsubcategory.id;
                        option.textContent = subsubcategory.name;
                        subsubCategorySelect.appendChild(option);
                    });
                    const event = new Event('change');
                    subsubCategorySelect.dispatchEvent(event);

                    // Log the received data
                    //console.log(JSON.stringify(subsubcategories));

                })
                .catch(function(error) {
                    console.log(error);
                });
        });


    </script>










    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize the Bootstrap tabs component
            $('#myTabs').tab();
        });
    </script>


@endsection


