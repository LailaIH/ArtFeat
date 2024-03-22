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

                    <div class="container">
                        <h1>Tickets List</h1>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <a href="{{ route('tickets.create') }}" class="btn btn-primary">Create New Ticket</a>

                        <ul>
                            @foreach ($tickets as $ticket)
                                <li>
                                    <h2>{{ $ticket->title }}</h2>
                                    <p>{{ $ticket->body }}</p>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>


                {{--<div class="card-header row">


                    <div class="col-sm">
                        <h5 class="pt-1 text-primary">Admin Panel</h5>
                    </div>

                    <div class="col-sm" align="right">
                        <a class="btn btn-outline-primary rounded-pill btn-sm" href="/admin/options" role="button">Panel Options <i class="fas fa-cog"></i></a>
                    </div>


                </div>--}}
                {{--<div class="card-body ">
                    --}}{{--<div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-4 col-lg-4">
                                <div class="card border-primary text-primary  mb-3">

                                    <div class="card-body">
                                        <h5 class="mb-2"><small>Welcome {{ $response['data']['name'] }}</small></h5>
                                        <div class="text-black pt-1">{{ $response['data']['email'] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-4 col-lg-4">
                                <div class="card border-secondary text-secondary mb-3">

                                    <div class="card-body">
                                        <h5 class="card-title">ZProxies Balance</h5>

                                        <h5 class="card-text">
                                            @if(Auth::user()->is_admin == '1')
                                                {{ $response['data']['funds'] }}$
                                            @else
                                                {{ Auth::user()->funds }}
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-4 col-lg-4">
                                <div class="card border-success text-success mb-3">

                                    <div class="card-body">
                                        <h5 class="card-title">ZProxies Active Orders</h5>
                                        <h5 class="card-text">{{ count($response2['data']) }} order(s)</h5>
                                    </div>
                                </div>
                            </div>
                        </div>--}}{{--

                   --}}{{-- <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-4 col-lg-4">

                            <div class="row">
                                <div class="col-sm-2 col-md-2 col-xl-2 col-lg-2">
                                    <div class="icon-stack2 icon-stack-sm bg-gradient4-primary-to-secondary text-white "><i class="fas fa-users-cog"></i></div>

                                </div>
                                <div class="col-sm-10 col-md-10 col-xl-10 col-lg-10">
                                    <div>Welcome {{ $response['data']['name'] }}</div>
                                    <small class="text-gray-500">{{ $response['data']['email'] }}</small>

                                </div>
                            </div>



                        </div>

                        <div class="col-sm-12 col-md-12 col-xl-4 col-lg-4">

                            <div class="row">
                                <div class="col-sm-2 col-md-2 col-xl-2 col-lg-2">
                                    <div class="icon-stack2 icon-stack-sm bg-gradient5-primary-to-secondary text-white "><i class="fas fa-file-invoice-dollar"></i></div>

                                </div>
                                <div class="col-sm-10 col-md-10 col-xl-10 col-lg-10">
                                    <div>Balance</div>
                                    <h5 class="text-gray-500 mr-2" style="display: inline">{{ $response['data']['funds'] }} $ </h5>


                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12 col-md-12 col-xl-4 col-lg-4">

                            <div class="row">
                                <div class="col-sm-2 col-md-2 col-xl-2 col-lg-2">
                                    <div class="icon-stack2 icon-stack-sm bg-gradient6-primary-to-secondary text-white "><i class="fas fa-cart-plus"></i></div>

                                </div>
                                <div class="col-sm-10 col-md-10 col-xl-10 col-lg-10">
                                    <div>Active Orders</div>
                                    <h5 class="text-gray-500 mr-2" style="display: inline">{{ count($response2['data']) }}  </h5>
                                    <small class="text-gray-500">order(s)</small>

                                </div>
                            </div>

                        </div>


                    </div>--}}{{--


                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">users</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">ZProxies orders</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab"
                               aria-controls="orders" aria-selected="false">Panel orders</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab"
                               aria-controls="payments" aria-selected="false">Payments</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tickets-tab" data-toggle="tab" href="#tickets" role="tab"
                               aria-controls="tickets" aria-selected="false">Tickets</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="invoices-tab" data-toggle="tab" href="#invoices" role="tab"
                               aria-controls="invoices" aria-selected="false">Invoices</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="datatable mt-3">
                                <table class="table table-bordered table-hover" id="dataTableAdminUser" width="100%" cellspacing="0">
                                <thead >
                                <tr>
                                    <th  scope="col"><small>Id</small></th>
                                    <th  scope="col"><small>Name</small></th>
                                    <th  scope="col"><small>Email</small></th>
                                    <th  scope="col"><small>Administration</small></th>
                                    <th  scope="col"><small>Funds</small></th>
                                    <th  scope="col"><small>Activation</small></th>
                                    <th  scope="col"><small>Registered</small></th>
                                    <th  scope="col"><small>Details</small></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>


                                        <td>
                                            @if($user->is_admin == '1')
                                                <span class="badge badge-success">Admin</span>
                                            @else
                                                <span class="badge badge-info">User</span>
                                            @endif

                                        </td>
                                        <td>{{ $user->funds }}$</td>

                                        <td>
                                            @if($user->status == '1')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Ban</span>
                                            @endif

                                        </td>
                                        <td>{{ $user->created_at->toDateString() }}</td>

                                        <td>
                                            <a class="btn btn-outline-primary rounded-pill btn-sm"
                                               href="/admin/user/info/{{ $user->id }}" role="button"><small>Details</small></a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            @if(count($response2['data']) == 0)
                                <br>
                                <h5 class="text-primary" align="center">No orders in ZProxies panel yet</h5>
                            @else

                                <div class="datatable mt-3">
                                    <table class="table table-bordered table-hover" id="dataTableAdminZpanel" width="100%" cellspacing="0">
                                    <thead >
                                    <tr>
                                        <th scope="col"><small>Id</small></th>
                                        <th  scope="col"><small>Country</small></th>
                                        <th  scope="col"><small>Cost</small></th>
                                        <th  scope="col"><small>Quantity</small></th>
                                        <th  scope="col"><small>Status</small></th>
                                        <th  scope="col"><small>Created</small></th>
                                        <th  scope="col"><small>Expired</small></th>
                                        <th  scope="col"><small>Details</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($response2['data'] as $order)
                                        <tr>
                                            <th scope="row">{{ $order['id'] }}</th>
                                            <td>{{ $order['shortcode'] }}</td>
                                            <td>{{ $order['cost'] }}$</td>
                                            <td>{{ $order['quantity'] }}</td>
                                            <td>
                                                @if($order['order_status'] == 'active' || $order['order_status'] == 'Active')
                                                    <span class="badge badge-success">{{$order['order_status']}}</span>
                                                @endif

                                                @if($order['order_status'] == 'expired')
                                                    <span class="badge badge-warning">{{$order['order_status']}}</span>
                                                @endif

                                                @if($order['order_status'] == 'suspended' || $order['order_status'] == 'released' || $order['order_status'] == 'Pending')
                                                    <div class="badge badge-danger text-white badge-marketing">{{$order['order_status']}}</div>
                                                @endif

                                            </td>

                                            <td>{{ \Illuminate\Support\Str::limit($order['createdAt'], 10, $end = ' ') }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($order['endtime'], 10, $end = ' ') }}</td>

                                            <td>
                                                <a class="btn btn-outline-primary rounded-pill btn-sm"
                                                   href="/admin/orders/{{ $order['id'] }}" role="button"><small>Details</small></a>
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                                </div>

                            @endif
                        </div>

                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">

                            @if(count($orders) == 0)
                                <br>
                                <h5 class="text-primary" align="center">No orders in your panel yet</h5>
                            @else
                                <div class="datatable mt-3">
                                    <table class="table table-bordered table-hover" id="dataTableAdminPanelOrders" width="100%" cellspacing="0">
                                    <thead >
                                    <tr>
                                        <th  scope="col"><small>Id</small></th>
                                        <th  scope="col"><small>ZId</small></th>
                                        <th  scope="col"><small>User</small></th>
                                        <th  scope="col"><small>Country</small></th>
                                        <th  scope="col"><small>Cost</small></th>
                                        <th  scope="col"><small>Quantity</small></th>
                                        <th  scope="col"><small>Status</small></th>
                                        <th  scope="col"><small>Renew</small></th>
                                        <th  scope="col"><small>Created</small></th>
                                        <th  scope="col"><small>Expire</small></th>
                                        <th  scope="col"><small>Details</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)
                                        @if($order->proxy_id != 0)
                                            <tr>
                                                <th scope="row">{{ $order->id }}</th>
                                                <th scope="row"><small><a href="/admin/orders/{{ $order->proxy_id }}">{{ $order->proxy_id }}</a></small></th>
                                                <td><small><a href="/admin/user/info/{{ $order->user_id }}">{{\App\User::where('id', $order->user_id)->first()->name}}</a></small></td>
                                                <td>{{ $order->country }}</td>
                                                <td>{{ $order->new_cost }}$</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>
                                                    @if($order->status == 'active' || $order->status == 'Active')
                                                        <span class="badge badge-success">{{$order->status}}</span>
                                                    @endif

                                                    @if($order->status == 'expired')
                                                        <span class="badge badge-warning">{{$order->status}}</span>
                                                    @endif

                                                    @if($order->status == 'suspended' || $order->status == 'released' || $order->status == 'Pending')
                                                        <div class="badge badge-danger text-white badge-marketing">{{$order->status}}</div>
                                                    @endif

                                                </td>

                                                <td>
                                                    @if($order->auto_renew == 1)
                                                        <span class="text-success">Enable</span>
                                                    @else
                                                        <span class="text-danger">Disable</span>
                                                    @endif

                                                </td>
                                                <td>{{ $order->created_at->toDateString() }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($order->expired_date, 10, $end = ' ') }}</td>
                                                <td>
                                                    <a class="btn btn-outline-primary rounded-pill btn-sm" href="/admin/orders/panel/{{ $order->id }}"
                                                       role="button"><small>Details</small></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach


                                    </tbody>
                                </table>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">

                            @if(count($payments) == 0)
                                <br>
                                <h5 class="text-primary" align="center">No payments in your panel yet</h5>
                            @else
                                <div class="datatable ">
                                    <table class="table table-bordered table-hover "  width="100%" cellspacing="0">
                                    <thead>
                                    <tr>

                                        <th scope="col"><small>Type</small></th>
                                        <th scope="col"><small>payment</small></th>
                                        <th scope="col"><small>User</small></th>
                                        <th scope="col"><small>amount</small></th>
                                        <th scope="col"><small>state</small></th>
                                        <th scope="col"><small>payment to</small></th>
                                        <th scope="col"><small>country</small></th>
                                        <th scope="col"><small>fee</small></th>
                                        <th scope="col"><small>created</small></th>
                                        <th scope="col"><small>updated</small></th>


                                    </tr>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td><small>{{$payment->pay_type}}</small></td>
                                            <td>
                                                <small>
                                                    {{$payment->payment_id }}
                                                    <br>
                                                    {{$payment->payer_email }}
                                                </small>
                                            </td>
                                            <td><small><a href="/admin/user/info/{{ $payment->user_id }}">{{$payment->user->name}}</a></small></td>
                                            <td><small>{{$payment->subtotal}} {{$payment->currency }}</small></td>
                                            <td>
                                                @if($payment->state == 'completed' || $payment->state == 'confirmed')
                                                    <small>
                                                        <span class="badge badge-success">{{$payment->state }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{$payment->state }}</span>
                                                        @endif
                                                    </small>
                                            </td>
                                            <td><small>{{$payment->payer_id }}</small></td>
                                            <td><small>{{$payment->country_code }}</small></td>
                                            <td><small>{{$payment->handling_fee }}</small></td>
                                            <td><small>{{$payment->created_at->toDateString() }}</small></td>
                                            <td><small>{{$payment->updated_at->toDateString() }}</small></td>

                                        </tr>
                                    @endforeach
                                </table>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="tickets" role="tabpanel" aria-labelledby="tickets-tab">

                            @if(count($tickets) == 0)
                                <br>
                                <h5 class="text-primary" align="center">No tickets in your panel yet</h5>
                            @else
                                <div class="datatable mt-3">
                                    <table class="table table-bordered table-hover" id="dataTableAdminTickets" width="100%" cellspacing="0">
                                    <thead >
                                    <tr>
                                        <th  scope="col"><small>Id</small></th>
                                        <th  scope="col"><small>User</small></th>
                                        <th  scope="col"><small>Title</small></th>
                                        <th  scope="col"><small>State</small></th>
                                        <th  scope="col"><small>Last Update</small></th>
                                        <th  scope="col"><small>Details</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($tickets as $ticket)
                                        @if($ticket->parant == 0)
                                            <tr>
                                                <th scope="row">{{ $ticket->id }}</th>
                                                <td><small><a href="/admin/user/info/{{ $ticket->user_id }}">{{\App\User::where('id', $ticket->user_id)->first()->name}}</a></small></td>
                                                <td>{{ $ticket->title }}</td>

                                                <td>
                                                    @if($ticket->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Closed</span>
                                                    @endif

                                                </td>
                                                <td>{{ $ticket->updated_at->toDateString() }}</td>

                                                <td>
                                                    <a class="btn btn-outline-primary rounded-pill btn-sm" href="/admin/tickets/{{ $ticket->id }}"
                                                       role="button"><small>Details</small></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach


                                    </tbody>
                                </table>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">

                            @if(count($invoices) == 0)
                                <br>
                                <h5 class="text-primary" align="center">No invoices in your panel yet</h5>
                            @else
                                <div class="datatable mt-3">
                                    <table class="table table-bordered table-hover" id="dataTableAdminInvoices" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th  scope="col"><small>Id</small></th>
                                        <th  scope="col"><small>Order id</small></th>
                                        <th  scope="col"><small>User</small></th>
                                        <th  scope="col"><small>Amount</small></th>
                                        <th  scope="col"><small>Description</small></th>
                                        <th scope="col"><small>Status</small></th>
                                        <th  scope="col"><small>Payment Date</small></th>
                                        <th  scope="col"><small>Details</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <th scope="row">{{ $invoice->id }}</th>
                                            <td>
                                                @if($invoice->order_id == 0)
                                                    ---
                                                @else
                                                    <a href="/admin/orders/panel/{{ $invoice->order_id }}">{{$invoice->order_id}}</a>
                                                @endif
                                            </td>
                                            <td><small><a href="/admin/user/info/{{ $invoice->user_id }}">{{\App\User::where('id', $invoice->user_id)->first()->name}}</a></small></td>
                                            <td>{{ $invoice->amount }}$</td>
                                            <td>{{ $invoice->desc }}</td>

                                            <td>
                                                @if($invoice->status == 'completed' || $invoice->status == 'confirmed')
                                                    <span class="badge badge-success">Paid</span>
                                                @else
                                                    <span class="badge badge-danger">UnPaid</span>
                                                @endif

                                            </td>


                                            <td>{{ $invoice->created_at->toDateString() }}</td>

                                            <td>
                                                <a class="btn btn-outline-primary rounded-pill btn-sm" href="/admin/invoices/{{ $invoice->id }}"
                                                   role="button"><small>Details</small></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>--}}
            </div>
        </div>
    </main>




    {{--<div class="container">
        <h1>Product List</h1>

        @if ($products->isEmpty())
            <p>No products found.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Supplier ID</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->supplier_id }}</td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>--}}

    <script>
        $(document).ready(function() {
            var table = $('#productTable').DataTable();

            // Add search filters
            $('#searchName').on('keyup', function() {
                table.column(0).search(this.value).draw();
            });

            $('#searchCategory').on('keyup', function() {
                table.column(1).search(this.value).draw();
            });
        });
    </script>

@endsection


