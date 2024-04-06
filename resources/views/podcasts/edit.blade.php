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





          

                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">Edit Podcast

                    </div>
                    <div class="card-body">

            

                    <form  method="POST" action="{{ route('podcasts.update', ['id'=>$podcast['id']]) }}">
                        @csrf
                        @method('PUT')

                        
                        <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                
                                    <label class="small mb-1" for="name">title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $podcast->title }}" required>
                                    @error('title')
                                   {{$message}}
                                    @enderror
                                </div>
                            

                            <div class="col-md-6">
                                
                                    <label class="small mb-1" for="audio">Audio URL</label>
                                    <input type="text" class="form-control" id="audio" name="audio" value="{{ $podcast->audio_url }}" required>
                                    @error('audio')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                
                                    <label class="small mb-1" for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="{{ $podcast->status }}">
                                    @error('status')
                                   {{$message}}
                                   @enderror
                            </div>

                            <div class="col-md-6">
                                
                                    <label class="small mb-1" for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control">{{$podcast->description}}
                                    </textarea>
                                
                                @error('description')
                                {{$message}}
                                @enderror
                            
                        </div>
                        </div>

                        

                        <div class="col-12">

                                    <input class="form-check-input" type="checkbox" name="is_online"  @if ($podcast->is_online) checked @endif>

                                    <label class="form-check-label small mb-1 " for="is_online">Is Online</label>
                                
                            </div>

                            <div class="col-12">
                                
                                    
                                  <input class="form-check-input" type="checkbox" name="is_free"  @if ($podcast->is_free) checked @endif>
                                  <label class="form-check-label small mb-1 " for="is_free">Is Free</label>
                            </div>

                       

                        

                

                            <div class="col-12">
                            <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>

            </div>
        </div>
        
    </main>




@endsection


