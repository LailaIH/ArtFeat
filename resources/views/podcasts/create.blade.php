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





            


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Create A New Podcast</div>
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

                    <form method="POST" action="{{ route('podcasts.store') }}">
                        @csrf
                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                       
                            <label class="small mb-1"  for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            @error('title')
                                    {{$message}}
                                    @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"  required></textarea>
                            @error('description')
                                {{$message}}
                                @enderror
                        </div>
                        </div>
                        <div class="col-12">
                            <label class="small mb-1" for="audio">Audio URL</label>
                            <input type="text" class="form-control" id="audio" name="audio" required>
                            @error('audio')
                                {{$message}}
                                @enderror
                        </div>



                        <div>
                            <br>
                        <button type="submit" class="btn btn-primary">Create Podcast</button>
                       </div>
                    </form>

            </div>
        </div>
        </div>
    </main>

 







    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize the Bootstrap tabs component
            $('#myTabs').tab();
        });
    </script> -->


@endsection


