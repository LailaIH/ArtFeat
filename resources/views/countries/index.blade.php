@extends('layout')

@section('content')

<style>
.text-green{
    color:green;
} 
.text-red{
    color:red;
}    
</style>


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
                    <div class="card-header">Countries List</div>

                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif

                        @if ($countries->isEmpty())
                        <div class="card-body">
                        
                             <div class="col-md-6">
                             <label class="small mb-1 mr-5" for="max_products">No Countries</label>
                             </div>
                      
                         </div>
                        @else
                        <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        <th>Name</th>
                                        
                                        <th>Added By Admin</th>
                                        <th>Is Online</th>
                                        
                                        <th>Actions</th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($countries as $country)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td class=" text-black"><b>{{ $country->name }}</b></td>
                                            
                                            <td>{{$country->user->name}}</td>
                                            <td class="text-{{ $country->is_online? 'green' : 'red'}}">
                                                {{$country->is_online?'YES':'NO'}}
                                            </td>


                                       
                                            <td>
                                                <a href="{{ route('countries.edit', ['uuid'=>$country->uuid] ) }}" class="btn btn-primary btn-xs">Edit</a>
                                                
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

@endsection


