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

                    <div class="container">
                        <h1>Sections List</h1>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($sections->isEmpty())
                            <p>No Sections found.</p>
                        @else
                            <div class=" mt-3 table-container">
                                <table id="productTable" class="table ">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 12px;">

                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Is Online</th>

                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sections as $section)
                                        <tr>

                                            <td>{{ $section->name }}</td>
                                            <td>{{ $section->description }}</td>
                                            <td>{{ $section->is_online ? 'Yes' : 'No' }}</td>

                                            <td>
                                                <a href="{{ route('sections.edit',  ['id'=>$section['id']]) }}" class="btn btn-primary btn-xs">Edit</a>
                                                <!-- Add delete form with CSRF token for deleting a section -->
                                                <form action="{{ route('sections.destroy', ['id'=>$section['id']]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this section?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </main>




    {{--<div class="container">
        <h1>Product List</h1>

        @if ($products->isEmpty())
            <p>No products found.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Supplier ID</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->supplier_id }}</td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>--}}

    <!-- <script>
        $(document).ready(function() {
            var table = $('#productTable').DataTable();

            // Add search filters
            $('#searchName').on('keyup', function() {
                table.column(0).search(this.value).draw();
            });

            $('#searchCategory').on('keyup', function() {
                table.column(1).search(this.value).draw();
            });
        });
    </script> -->

@endsection


