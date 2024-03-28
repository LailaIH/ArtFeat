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
                        <h1>Podcasts List</h1>

                        @if ($podcasts->isEmpty())
                            <p>No Podcasts.</p>
                        @else
                            <div class=" mt-3 table-container">
                                <table id="productTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 12px;">

                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Audio URL</th>
                                        
                                        <th>Is Free</th>
                                        <th>Status</th>
                                        <th>Added by User</th>
                                        <th>Is Online</th>
                                        <th>Change Status</th>
                                        <th>Actions</th>
                                        



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($podcasts as $podcast)
                                        <tr>

                                            <td>{{ $podcast->title }}</td>
                                            <td>{{ $podcast->description }}</td>
                                            <td>{{ $podcast->audio_url }}</td>
                                            <td>{{ $podcast->is_free? 'free':'not free' }}</td>
                                            <td>{{ $podcast->status }}</td>
                                            <td>{{ $podcast->user->name }}</td>


                                            <td>
                        <span class="badge {{ $podcast->is_online ? 'badge-green' : 'badge-red' }}">
                            {{ $podcast->is_online ? 'Online' : 'Offline' }}
                            </span>
                 
                                            </td>
                                            <td>
                                            <form method="POST" action="{{ route('podcasts.updateStatus', $podcast) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-danger btn-xs">Change Status</button>

                                                </form> 
                                            </td>
                                            <td>
                                                <a href="{{ route('podcasts.edit',  ['id'=>$podcast['id']]) }}" class="btn btn-primary btn-xs">Edit</a>
                                                <!-- Add delete form with CSRF token for deleting a section -->
                                                <form action="{{ route('podcasts.destroy', ['id'=>$podcast['id']]) }}" method="POST" class="d-inline">
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



@endsection


