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

        <!-- Main page content-->
        <div class="container mt-n5">






                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Non Artists List
                   
                    </div>
                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif


                        @if ($nonArtists->isEmpty())
                        <div class="card-body">
                         
                            <h4>No Users</h4>
                         </div>     
                         @else
                         <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Job Title</th>
                                        <th>Is Ban</th>
                                        
                                        <th>Points</th>
                                        <th>Actions</th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($nonArtists  as $nonArtist )
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td class=" text-black"><b>{{ $nonArtist->name }}</b></td>
                                            <td>{{ $nonArtist->email }}</td>
                                            @if($nonArtist->jobTitle)
                                            <td>{{ $nonArtist->jobTitle->name }}</td>
                                            @else
                                            <td>No Job Registered</td>
                                             @endif
                                             <td class="{{ $nonArtist->is_ban ? 'text-green' : 'text-red' }}">
                                 {{ $nonArtist->is_ban ? 'Yes' : 'No' }} </td>                                           
                                           @if($nonArtist->points)
                                            <td class="text-primary">{{ $nonArtist->points}}</td>
                                            @else
                                            <td class="text-primary">0</td>@endif
                                            <td>
                                            <a class="btn btn-primary btn-xs" href="{{route('users.nonArtists.edit' , ['id'=>$nonArtist['id'] ])}}" >   
                                            Edit
                                              </a>
                                        

                                        
                                        <form class="d-inline" action="{{ route('users.deleteUser', ['id'=>$nonArtist['id']]) }}" method="POST" onsubmit="return confirmDelete()">
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

                       
                    </div>
                </div>

        
    </main>





<script>
    let table = new DataTable('#myTable');
</script>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>
@endsection


