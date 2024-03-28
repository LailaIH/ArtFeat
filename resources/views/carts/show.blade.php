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

                    
                        <h1>Carts List</h1>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($carts->isEmpty())
                            <p>No Carts.</p>
                        @else
                        Show Cart For {{$user->name}}
                                <table class="table">
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

            </div>
        </div>
    </main>



@endsection


