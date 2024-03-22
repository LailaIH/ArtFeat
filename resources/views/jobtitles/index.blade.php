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
                        <h1>Job Titles List</h1>

                        @if ($jobTitles->isEmpty())
                            <p>No Job Titles.</p>
                        @else
                            <div class=" mt-3 table-container">
                                <table id="productTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 12px;">

                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Is Online</th>
                                        <th>Action</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($jobTitles as $jobTitle)
                                        <tr>

                                            <td>{{ $jobTitle->name }}</td>
                                            <td>{{ $jobTitle->description }}</td>

                                            <td>
                        <span class="badge {{ $jobTitle->is_online ? 'badge-green' : 'badge-red' }}">
                            {{ $jobTitle->is_online ? 'Online' : 'Offline' }}
                        </span>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('job_titles.updateStatus', $jobTitle) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-danger btn-xs">Change</button>

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

    <script>
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
    </script>

@endsection


