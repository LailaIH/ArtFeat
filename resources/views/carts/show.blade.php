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
                    <div class="card-header">Carts List</div>
                        

                        @if (session('success'))

                            <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->has('fail'))
                                <div class="alert alert-danger m-3">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
                        @if ($carts->isEmpty())
                            
                             <div class="card-body">
                         <form method="GET" action="{{route('carts.create')}}">
                             <div class="col-md-6">
                             <label class="small mb-1 mr-5" for="max_products">No Carts For {{$user->name}}</label>
                             <button type="submit" class="btn btn-primary btn-xs">Add Cart</button>
                             </div>
                         </form>
                         </div>
                       
                            @else
                       <div class="card-body">
                                <table class="table small-table-text">

                                    <thead>
                                        <tr>
                                        
                                        
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        
                            @foreach($carts as $cart)
                            <tr>
                                
                                
                                <td>{{$cart->product->name}}</td>
                                <td>{{$cart->quantity}}</td>
                                <td>
                                <a href="{{ route('carts.edit',  ['id'=>$cart['id']]) }}" class="btn btn-primary btn-xs">Edit</a>
                                <form action="{{ route('carts.destroy', ['id'=>$cart['id']]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this section?')">Delete</button>
                                                </form>
                                </td>
                                </tr>









                            @endforeach

                                </tbody>
                             </table>
                        

                           
                        @endif
                    
                </div>

       
    </main>



@endsection


