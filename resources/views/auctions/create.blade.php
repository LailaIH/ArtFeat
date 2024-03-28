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

            <div class="card">
                <div class="card-body">


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="container">
                        <h1>Create a new Auction</h1>
                        <form method="post" action="{{ route('auctions.store') }}   " class="form-group table-container form-container">
                          @csrf
                          
                                <div>
                                    <label for="name" >Title</label>
                                    <input id ="name" name="title" type="text" value="{{ old('title') }}">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div>
                                <label for="description" >Description</label>
                                <textarea id="description" name="description" rows="4" cols="5" value="{{old('description')}}">
                                </textarea>
                                @error('description')
                                {{$message}}
                                @enderror
                                

                                </div>

                                <div>
                                <label for="start_time" >Start Date</label>
                                <input type="datetime-local" id="start_time" name="start_time" >
                                </div>





                            <div>
                                <label for="end_time" >End Date</label>
                                <input type="datetime-local" id="end_time" name="end_time" >
                                </div>


                                <div>
                                <label for="starting_price" >Starting Price</label>
                                <input type="number" id="starting_price" name="starting_price" >
                                @error('starting_price')
                                {{$message}}
                                @enderror
                                </div>



                                <div>
                              <button type="submit">Submit</button>
                         </div>



                        </form>


                    </div>
                </div>

            </div>

    </main>


@endsection


