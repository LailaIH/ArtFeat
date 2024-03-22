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
                            <a href="/options" class="btn btn-outline-white rounded-pill btn-sm" role="button">Panel Options <i class="fas fa-cog ml-1"></i></a>
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
                        <h1 class="text-primary">Panel Settings Page</h1>

                        <form method="POST" action="{{ route('options.update', $option) }}" id="settingsForm" >
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site_name">Site Name</label>
                                        <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $option->site_name }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="paypal_key">PayPal Key</label>
                                        <input type="text" class="form-control" id="paypal_key" name="paypal_key" value="{{ $option->paypal_key }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="paypal_secret">PayPal Secret</label>
                                        <input type="text" class="form-control" id="paypal_secret" name="paypal_secret" value="{{ $option->paypal_secret }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stripe_key">Stripe Key</label>
                                        <input type="text" class="form-control" id="stripe_key" name="stripe_key" value="{{ $option->stripe_key }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stripe_secret">Stripe Secret</label>
                                        <input type="text" class="form-control" id="stripe_secret" name="stripe_secret" value="{{ $option->stripe_secret }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="crypto_key">Crypto Key</label>
                                        <input type="text" class="form-control" id="crypto_key" name="crypto_key" value="{{ $option->crypto_key }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="crypto_secret">Crypto Secret</label>
                                        <input type="text" class="form-control" id="crypto_secret" name="crypto_secret" value="{{ $option->crypto_secret }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <input type="text" class="form-control" id="tags" name="tags" value="{{ $option->tags }}">
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Slide Image 1 -->
                                    <div class="form-group">
                                        <label for="slide_img_1">Slide Image 1</label>
                                        <input type="file" class="form-control-file" id="slide_img_1" name="slide_img_1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Slide Text 1 -->
                                    <div class="form-group">
                                        <label for="slide_text_1">Slide Text 1</label>
                                        <input type="text" class="form-control" id="slide_text_1" name="slide_text_1" value="{{ $option->slide_text_1 }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Repeat this pattern for each column -->

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Slide Image 2 -->
                                    <div class="form-group">
                                        <label for="slide_img_2">Slide Image 2</label>
                                        <input type="file" class="form-control-file" id="slide_img_2" name="slide_img_2">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Slide Text 2 -->
                                    <div class="form-group">
                                        <label for="slide_text_2">Slide Text 2</label>
                                        <input type="text" class="form-control" id="slide_text_2" name="slide_text_2" value="{{ $option->slide_text_2 }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Repeat this pattern for the remaining columns -->

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Primary Color -->
                                    <div class="form-group">
                                        <label for="primary_color">Primary Color</label>
                                        <input type="color" class="form-control" id="primary_color" name="primary_color" value="{{ $option->primary_color }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Secondary Color -->
                                    <div class="form-group">
                                        <label for="secondary_color">Secondary Color</label>
                                        <input type="color" class="form-control" id="secondary_color" name="secondary_color" value="{{ $option->secondary_color }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Why Artfeat Text -->
                                    <div class="form-group">
                                        <label for="why_artfeat_text">Why Artfeat Text</label>
                                        <textarea class="form-control" id="why_artfeat_text" name="why_artfeat_text">{{ $option->why_artfeat_text }}</textarea>
                                    </div>
                                </div>
                            </div>



                            <button type="button" class="btn btn-primary btn-sm" id="openModalBtn">Save Changes</button>

                            <!-- Hidden input field to track confirmation -->
                            <input type="hidden" id="confirmed" name="confirmed" value="0">
                        </form>




                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirm Save Changes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to save the changes?
                    </div>
                    <div class="modal-footer">
                        <!-- Button to close the modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        <!-- Button to submit the form after confirmation -->
                        <button type="button" class="btn btn-success btn-sm" id="confirmSaveBtn">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <script>
        // JavaScript code for handling the confirmation modal
        document.getElementById('openModalBtn').addEventListener('click', function() {
            $('#confirmModal').modal('show'); // Open the modal
        });

        document.getElementById('confirmSaveBtn').addEventListener('click', function() {
            // Submit the form when the button in the modal is clicked
            document.getElementById('settingsForm').submit();
        });
    </script>



@endsection


