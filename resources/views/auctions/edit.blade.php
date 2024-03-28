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
                        <h1>Edit Auction</h1>
                        <form class="row g-3 " method="post" action="{{ route('auctions.update' ,['id'=>$auction['id']]) }}   " class="form-group table-container form-container">
                          @csrf
                          @method('PUT')
                                <div class="col-md-6">
                                    <label for="name" >Title</label>
                                    <input id ="name" name="title" type="text" value="{{ $auction->title }}">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                <label for="description" >Description</label>
                                <textarea id="description" name="description" class="form-control" >
                                    {{$auction->description}}
                                </textarea>
                                @error('description')
                                {{$message}}
                                @enderror
                                

                                </div>
                                <br>
                                <div class="col-12">
                                <label for="start_time" >Start Date</label>
                                <input type="datetime-local" id="start_time" name="start_time"
                                value="{{$auction->start_time}}" >
                                </div>



<br>

                            <div class="col-12">
                                <label for="end_time" >End Date</label>
                                <input type="datetime-local" id="end_time" name="end_time"
                                value="{{$auction->end_time}}" >
                                </div>


                                <div class="col-md-6">
                                    <br>
                                <label for="starting_price" >Starting Price</label>
                                <input type="number" id="starting_price" name="starting_price"
                                value="{{$auction->starting_price}}" >
                                @error('starting_price')
                                {{$message}}
                                @enderror
                                </div>

                           


                                <div class="col-md-6">
                                    <label for="status" >Status</label>
                                    <input id ="status" name="status" type="text" value="{{ $auction->status}}">
                                    @error('status')
                                    {{$message}}
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <br>
                                    <input type="checkbox" name="is_online"  @if ($auction->is_online) checked @endif>
                                    <label for="is_online">Is Online:</label>
                                    @error('is_online')
                                        {{$message}}
                                        @enderror
                                </div>



                                <div class="col-12">
                              <button type="submit">Submit</button>
                         </div>



                        </form>


                    </div>
                </div>

            </div>
        </div>

    </main>


@endsection


