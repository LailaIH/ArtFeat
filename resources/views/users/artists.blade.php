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
                        <h1>Artists List</h1>

                        @if ($artists->isEmpty())
                            <p>No Sections found.</p>
                        @else
                            <div class=" mt-3 table-container">
                                <table id="productTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 12px;">

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Is Ban</th>
                                        <th>Type</th>
                                        <th>Points</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($artists  as $artist )
                                        <tr>

                                            <td>{{ $artist->name }}</td>
                                            <td>{{ $artist->email }}</td>
                                            <td>{{ $section->is_ban ? 'Yes' : 'No' }} - <b class="text-blue">Change</b></td>
                                            <td>{{ $section->is_Artist ? 'Yes' : 'No' }} - <b class="text-blue">Change</b></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <div class="card invoice">
                            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                                        <!-- Invoice branding-->
                                        <img class="invoice-brand-img rounded-circle mb-4" src="assets/img/logo.svg" alt="" />
                                        <div class="h2 text-white mb-0">Start Bootstrap</div>
                                        Web Design &amp; Development
                                    </div>
                                    <div class="col-12 col-lg-auto text-center text-lg-end">
                                        <!-- Invoice details-->
                                        <div class="h3 text-white">Invoice</div>
                                        #29301
                                        <br />
                                        January 1, 2021
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 p-md-5">
                                <!-- Invoice table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                        <tr class="small text-uppercase text-muted">
                                            <th scope="col">Description</th>
                                            <th class="text-end" scope="col">Hours</th>
                                            <th class="text-end" scope="col">Rate</th>
                                            <th class="text-end" scope="col">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Invoice item 1-->
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="fw-bold">SB Admin Pro</div>
                                                <div class="small text-muted d-none d-md-block">A professional UI toolkit for designing admin dashboards and web applications</div>
                                            </td>
                                            <td class="text-end fw-bold">12</td>
                                            <td class="text-end fw-bold">$50.00</td>
                                            <td class="text-end fw-bold">$600.00</td>
                                        </tr>
                                        <!-- Invoice item 2-->
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="fw-bold">SB UI Kit Pro</div>
                                                <div class="small text-muted d-none d-md-block">A UI toolkit for creating marketing websites and landing pages</div>
                                            </td>
                                            <td class="text-end fw-bold">15</td>
                                            <td class="text-end fw-bold">$55.00</td>
                                            <td class="text-end fw-bold">$825.00</td>
                                        </tr>
                                        <!-- Invoice item 3-->
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="fw-bold">Pro HTML Bundle</div>
                                                <div class="small text-muted d-none d-md-block">A fully coded set of UI resources for creating a comprehensive web application</div>
                                            </td>
                                            <td class="text-end fw-bold">4</td>
                                            <td class="text-end fw-bold">$125.00</td>
                                            <td class="text-end fw-bold">$500.00</td>
                                        </tr>
                                        <!-- Invoice subtotal-->
                                        <tr>
                                            <td class="text-end pb-0" colspan="3"><div class="text-uppercase small fw-700 text-muted">Subtotal:</div></td>
                                            <td class="text-end pb-0"><div class="h5 mb-0 fw-700">$,1925.00</div></td>
                                        </tr>
                                        <!-- Invoice tax column-->
                                        <tr>
                                            <td class="text-end pb-0" colspan="3"><div class="text-uppercase small fw-700 text-muted">Tax (7%):</div></td>
                                            <td class="text-end pb-0"><div class="h5 mb-0 fw-700">$134.75</div></td>
                                        </tr>
                                        <!-- Invoice total-->
                                        <tr>
                                            <td class="text-end pb-0" colspan="3"><div class="text-uppercase small fw-700 text-muted">Total Amount Due:</div></td>
                                            <td class="text-end pb-0"><div class="h5 mb-0 fw-700 text-green">$2059.75</div></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer p-4 p-lg-5 border-top-0">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent to info-->
                                        <div class="small text-muted text-uppercase fw-700 mb-2">To</div>
                                        <div class="h6 mb-1">Company Name</div>
                                        <div class="small">1234 Company Dr.</div>
                                        <div class="small">Yorktown, MA 39201</div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase fw-700 mb-2">From</div>
                                        <div class="h6 mb-0">Start Bootstrap</div>
                                        <div class="small">5678 Company Rd.</div>
                                        <div class="small">Yorktown, MA 39201</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - additional notes-->
                                        <div class="small text-muted text-uppercase fw-700 mb-2">Note</div>
                                        <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>






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


