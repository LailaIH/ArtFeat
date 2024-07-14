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
                    <div class="card-header">Supports List</div>
                    @if (session('success'))
                    <div class="alert alert-success m-3" role="alert">{{ session('success') }}</div>
                    @endif
                    @if ($errors->has('fail'))
                        <div class="alert alert-danger m-3">
                            {{ $errors->first('fail') }}
                        </div>
                    @endif

                        @if ($supports->isEmpty())
                        <div class="card-body">
                         No Support Articles
                         </div>                       
                          @else
                          <div class="card-body">
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">

                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Is Online</th>

                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($supports as $support)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td class=" text-black"><b>{{ $support->title }}</b></td>
                                            <td>    
                                                
                                                            @php
                                                                $words = explode(' ', $support->description);
                                                                echo implode(' ', array_slice($words, 0, 5));
                                                                if (count($words) > 5) {
                                                                    echo ' ...';
                                                                }
                                                            @endphp
                                           
                                           
                                            </td>

                                            <td>
                                                    @if(isset($support->img))
                                                    <img src="{{ asset('supportsImages/'.$support->img) }}" alt="support picture" width="100" height="100">
                                                    @else
                                                    <img src="{{ asset('assets/img/noitem.png') }}" alt="support picture" width="100" height="100">
                                                    @endif 
                                            </td>
                                           
                                            <td>

                                                    <span class="badge {{ $support->is_online ? 'badge-green' : 'badge-red' }}">
                                                            {{ $support->is_online ? 'Online' : 'Offline' }}
                                                    </span>
                       
                       
                                            </td>
                                            <td>
                                                <a href="{{ route('supports.edit',  ['id'=>$support['id']]) }}" class="btn btn-primary btn-xs">Edit</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

      
    </main>

    <script>
    let table = new DataTable('#myTable');
</script>



@endsection


