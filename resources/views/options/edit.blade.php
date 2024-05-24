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
                    <div class="card-header">Edit Option</div>
                    <div class="card-body">

            

                    <form method="POST" action="{{ route('options.update', ['id'=>$option['id']]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                
                                    <input type="text" value="{{$option->key}}" class="form-control" id="key" name="key" readonly>
                            </div>
                                    <div class="col-md-6">
                                <textarea name="value" id="value" class="form-control" required>
                                {{ $option->value }}
                                </textarea>
                            @error('value')
                                {{$message}}
                                @enderror
                                </div>
                            </div>

                           
                       

                      

                

<div>
                        <button type="submit" class="btn btn-primary">Update</button></div>
                    </form>
                </div>

            </div>
        </div>
    </main>




@endsection


