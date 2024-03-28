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

                    <h1>Edit Job Title</h1>

            

                    <form class="row g-3" method="POST" action="{{ route('job_titles.update', ['id'=>$jobTitle['id']]) }}">
                        @csrf
                        @method('PUT')

                        
                            <div class="col-md-6">
                                
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $jobTitle->name }}" required>
                                </div>
                            

                            <div class="col-md-6">
                                
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description"class="form-control">{{$jobTitle->description}}
                                    </textarea>
                                </div>
                        

                        <div class="col-md-6">
                                
                                    <label for="is_online">Is Online</label>
                                  <input type="checkbox" name="is_online"  @if ($jobTitle->is_online) checked @endif>
                                </div>
                        

                

<div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
</div>
                    </form>
                </div>

            </div>
        </div>
    </main>




@endsection


