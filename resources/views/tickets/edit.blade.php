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

                    <h1>Create New Tichet</h1>


                    <form method="POST" action="{{ route('tickets.update' , ['ticket'=>$ticket['id']]) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="title">Title</label>
                            <input value="{{$ticket->title}}" type="text" name="title" id="title" required>
                        </div>
                        <div>
                            <label for="body">Body</label>
                            <textarea name="body" id="body" rows="4" required>
                                {{$ticket->body}}
                            </textarea>
                        </div>
                        <div>
                            <button type="submit">Edit Ticket</button>
                        </div>
                    </form>


            </div>
        </div>
    </main>

    <!-- <script>

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


    </script> -->










    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
            // Initialize the Bootstrap tabs component
            $('#myTabs').tab();
        });
    </script> -->


@endsection


