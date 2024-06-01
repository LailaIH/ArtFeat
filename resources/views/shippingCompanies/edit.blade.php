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
                    <div class="card-header">Edit A Shipping Company</div>
                    <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('shipping-companies.update',['uuid'=>$company->uuid]) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                            <label class="small mb-1" for="country_id">Country</label>
                            <select name="country_id" id="country_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                <option value="" disabled selected>Select a country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if($company->country_id===$country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                {{$message}}
                                @enderror
                        </div>

                        <div class="col-md-6">
                        <label class="small mb-1" for="name">Name</label>
                        <input value="{{$company->name}}" type="text" name="name" id="name" class="form-control" required/>
                        @error('name')
                                {{$message}}
                        @enderror
                        </div>
                        </div>

                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                        <label class="small mb-1" for="description">Description</label>
                        <textarea value="{{$company->description}}" type="text" name="description" id="description" class="form-control">
                            {{$company->description}}
                        </textarea>
                        @error('description')
                                {{$message}}
                        @enderror

                        </div>

                        <div class="col-md-6 mt-5 ">
                            <label class="form-check-label small mb-1 " for="is_online">Is Online</label>
                                            
                            <input class="form-check-input ml-3" type="checkbox" name="is_online"  @if ($company->is_online) checked @endif>
                                            
                        </div></div>

                       

                  


                        <div class="row gx-3 mb-3">
                        <div class="col-12">
                        <button type="submit" class="btn btn-primary">Edit Company</button>
                    </div></div>
                    </form>

            </div>
        </div>
        </div>
    </main>


@endsection


