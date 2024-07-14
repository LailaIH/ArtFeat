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

            <!-- <div class="card">
                <div class="card-body"> -->


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Add Price to {{$auction->title}}</div>

                    @if ($errors->has('fail'))
                        <div class="alert alert-danger m-3">
                            {{ $errors->first('fail') }}
                        </div>
                    @endif

                    <div class="card-body">
                    <p ><b>Current Price {{  $auction->ending_price==0? $auction->starting_price : max($auction->ending_price , $auction->starting_price)    }}</b></p>

                        <form method="post" action="{{ route('auctions.addPrice',$auction->id) }}">
                          @csrf
                          
                          <div class="row gx-3 mb-3">

                          <div class="col-md-6">
                               <label class="small mb-1" for="user_id">User</label>
                               <select name="user_id" id="user_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                    <option value="" disabled selected>Select a user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                               </select>
                               @error('user_id')
                                {{$message}}
                                @enderror
                                </div>


                                <div class="col-md-6">
                                <label class="small mb-1" for="ending_price" >Ending Price</label>
                                <input class="form-control" type="number" id="ending_price" name="ending_price" required >
                                @error('ending_price')
                                {{$message}}
                                @enderror
                                

                                </div>
                          </div>
                         


                                <div>
                              <button class="btn btn-primary" type="submit">Submit</button>
                         </div>



                        </form>


                    </div>
           

    </main>


@endsection


