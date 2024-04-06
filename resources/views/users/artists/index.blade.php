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
                    <div class="card-header">Artists List
                    
                            </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif

                        @if ($artists->isEmpty())
                        <div class="card-body">
                         <form method="GET" action="{{route('users.create')}}">
                             <div class="col-md-6">
                             <label class="small mb-1 mr-5" for="max_products">No Artists</label>
                             </div>
                         </form>
                         </div>
                        @else
                        <div class="card-body">
                                <table id="productTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 12px;">

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Job Title</th>
                                        <th>Is Ban</th>
                                        <th>Is Artist</th>
                                        <th>Points</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($artists  as $artist )
                                        <tr>

                                            <td>{{ $artist->name }}</td>
                                            <td>{{ $artist->email }}</td>
                                            @if($artist->jobTitle)
                                            <td>{{ $artist->jobTitle->name }}</td> @endif
                                            <td>{{ $artist->is_ban ? 'Yes' : 'No' }}</td>
                                            <td>{{ $artist->is_artist ? 'Yes' : 'No' }}</td>
                                            <td>{{ $artist->points }}</td>
                                            <td>
                                            <a class="btn btn-primary btn-xs" href="{{route('users.artists.edit' , ['id'=>$artist['id'] ])}}" >   
                                            Edit
                                              </a>
                                        
                                            
                                            <form class="d-inline" action="{{ route('users.delete', ['id'=>$artist['id']]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                                </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <div class="col-12">
                        <a href="{{route('users.create')}}" class="btn btn-success">
                            Add User </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>






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


