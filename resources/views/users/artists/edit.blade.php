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
                        <h1>Edit {{$artist->name}}</h1>
                        <form method="post" action="{{route('users.artists.update' , ['id'=>$artist->id] )}}   )" class="form-group table-container form-container">
                          @csrf
                          @method('PUT')
                                <div>
                                    <label for="name" >Name</label>
                                    <input id ="name" name="name" type="text"  value="{{$artist->name}}">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>

                                <br>
                                <div>
                                <label for="job_title_id">Job Title:</label>
                                <select name="job_title_id" id="job_title_id">
                                    <option value="">Select a job title</option>
                                    @foreach ($jobTitles as $jobTitle)
                                        <option value="{{ $jobTitle->id }}" @if ($jobTitle->id == $artist->job_title_id) selected @endif>{{ $jobTitle->name }}</option>
                                    @endforeach
                                </select>
                                </div>


                                <div>
                                    <label for="is_ban" >Is Ban</label>
                                    <input id ="is_ban" name="is_ban" type="checkbox"  @if ($artist->is_ban) checked @endif">
                                    @error('is_ban')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div>
                                    <label for="is_dealer" >Is Dealer</label>
                                    <input id ="is_dealer" name="is_dealer" type="checkbox"  @if ($artist->is_dealer) checked @endif">
                                    @error('is_dealer')
                                    {{$message}}
                                    @enderror
                                </div>


                                <div>
                                    <label for="is_artist" >Is Artist</label>
                                    <input id ="is_artist" name="is_artist" type="checkbox"  checked >
                                    @error('is_artist')
                                    {{$message}}
                                    @enderror
                                </div>

                                <label for="points" >Points</label>
                                    <input id ="points" name="points" type="text"  value="{{$artist->points}}">
                                    @error('points')
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
        </div>
</div>
    </main>


@endsection


