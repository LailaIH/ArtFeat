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
                    <div class="card-header">Shipping Companies List</div>

                        @if (session('success'))

                        <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                            <div class="alert alert-danger m-3">
                                {{ $errors->first('fail') }}
                            </div>
                        @endif

                        @if ($companies->isEmpty())
                        <div class="card-body">
                        
                             <div class="col-md-6">
                             <label class="small mb-1 mr-5" for="max_products">No Shipping Companies</label>
                             </div>
                      
                         </div>
                        @else
                        <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        <th>Name</th>
                                        
                                        <th>Added By Admin</th>
                                        <th>Country</th>
                                        <th>Is Online</th>
                                        
                                        <th>Actions</th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($companies as $company)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td class=" text-black"><b>{{ $company->name }}</b></td>
                                            
                                            <td>{{$company->user->name}}</td>
                                            <td>{{$company->country->name}}</td>
                                            <td class="text-{{ $company->is_online? 'green' : 'red'}}">
                                                {{$company->is_online?'YES':'NO'}}
                                            </td>


                                       
                                            <td>
                                                @if($company->country->is_online)
                                                <a href="{{ route('shipping-companies.edit', ['uuid'=>$company->uuid] ) }}" class="btn btn-primary btn-xs">Edit</a>
                                                @else
                                                <a href="{{ route('shipping-companies.show_offline', ['uuid'=>$company->uuid] ) }}" class="btn btn-primary btn-xs">Show</a>
                                                @endif 
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


