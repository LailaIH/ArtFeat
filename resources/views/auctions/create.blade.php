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
                            <a href="/options/settings" class="btn btn-outline-white rounded-pill btn-sm" role="button">Panel Settings <i class="fas fa-cog ml-1"></i></a>
                            <a href="/home" class="btn btn-outline-white rounded-pill btn-sm ml-1" role="button">Exit <i class="fas fa-arrow-left ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n5">

            <!-- <div class="card">
                <div class="card-body"> -->


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Create An Auction</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('auctions.store') }}">
                          @csrf
                          
                          <div class="row gx-3 mb-3">
                                               
                          <div class="col-md-6">
                                    <label for="name" class="small mb-1" >Title</label>
                                    <input class="form-control" id ="name" name="title" type="text" value="{{ old('title') }}">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                <label class="small mb-1" for="description" >Description</label>
                                <textarea class="form-control" id="description" name="description"  value="{{old('description')}}">
                                </textarea>
                                @error('description')
                                {{$message}}
                                @enderror
                                

                                </div>
                          </div>
                          <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                <label class="small mb-1" for="start_time" >Start Date</label>
                              
                                <input class="form-control" type="datetime-local" id="start_time" name="start_time" >
                                @error('start_time')
                                {{$message}}
                                @enderror
                            </div>





                               <div class="col-md-6">
                                <label class="small mb-1" for="end_time" >End Date</label>
                                <input class="form-control" type="datetime-local" id="end_time" name="end_time" >
                                @error('end_time')
                                {{$message}}
                                @enderror
                            
                            </div>

                          </div>
                          <div class="mb-3">
                                <label class="small mb-1" for="starting_price" >Starting Price</label>
                                <input class="form-control" type="number" id="starting_price" name="starting_price" >
                                @error('starting_price')
                                {{$message}}
                                @enderror
                                </div>



                                <div>
                              <button class="btn btn-primary" type="submit">Submit</button>
                         </div>



                        </form>


                    </div>
                <!-- </div>

            </div> -->

    </main>


@endsection


