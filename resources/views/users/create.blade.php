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
                    <div class="card-header">Create A User</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.store') }}">
                          @csrf
                          
                          <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                                    <label class="small mb-1" for="name" >Name</label>
                                    <input class="form-control" id ="name" name="name" type="text" value="{{ old('name') }}" required>
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label class="small mb-1" for="email" >Email</label>
                                    <input class="form-control" id ="email" name="email" type="text"  value="{{ old('email') }}" required>
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </div> </div>



                                <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                <label class="small mb-1" for="job_title_id">Job Title:</label>
                                <select name="job_title_id" id="job_title_id" class="form-control form-control-solid" aria-label="Default select example" required>
                                    <option value="">Select a Job</option>
                                    @foreach ($jobTitles as $jobTitle)
                                        <option value="{{ $jobTitle->id }}">{{ $jobTitle->name }}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="password" >Password</label>
                                    <input class="form-control" id ="password" name="password" type="password" required >
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </div> </div>


                                <div class="row gx-3 mb-3">
                                <div class="col-md-4 ">

                                <label class="form-check-label small mb-1" for="is_ban" >Is Ban</label>
                                <input class="form-check-input ml-3" id ="is_ban" name="is_ban" type="checkbox" >

                                @error('is_ban')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div class="col-md-4 form-check form-check-solid">

                                <label class="form-check-label small mb-1" for="is_dealer" >Is Dealer</label>
                                <input class="form-check-input ml-3" id ="is_dealer" name="is_dealer" type="checkbox" >

                                @error('is_dealer')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div class="col-md-4 form-check form-check-solid">

                                <label class="form-check-label small mb-1" for="is_artist" >Is Artist</label>
                                <input class="form-check-input ml-3" id ="is_artist" name="is_artist" type="checkbox" >

                                @error('is_artist')
                                    {{$message}}
                                    @enderror
                                </div></div>
                                <div class="row gx-3 mb-3">

                                <div class="col-12">

                                <label class="small mb-1" for="points" >Points</label>
                                    <input id ="points" class="form-control" name="points" type="text"  value="{{ old('points') }}" required>
                                    @error('points')
                                    {{$message}}
                                    @enderror
                                </div></div>


                                <div class="row gx-3 mb-3">
                                <div class="col-12">
                                    
                              <button type="submit">Submit</button></div>
                         </div>



                        </form>


              
        </div>
</div>
    </main>


@endsection


