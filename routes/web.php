<?php

use App\Http\Controllers\AuctionsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\JobTitlesController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PodcastsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'welcome'])->name('welcome');

Route::get('/who/we/are', function () {
    return view('who-we-are');
});

Route::get('/terms/conditions', function () {
    return view('terms-and-conditions');
});



Route::get('/cart/details', function () {
    return view('cart-detail');
});


Route::get('/landing/login', function () {
    return view('landing-login');
});

Route::get('/landing/signup', function () {
    return view('landing-signup');
});

// Define resourceful routes for products
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
//Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
//Route::delete('/products/destroy/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

// Define resourceful routes for orders
Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
Route::get('/orders/{order}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');



// Define resourceful routes for invoices
Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.index');
Route::get('/invoices/create', [InvoicesController::class, 'create'])->name('invoices.create');
Route::post('/invoices', [InvoicesController::class, 'store'])->name('invoices.store');
Route::get('/invoices/{invoice}', [InvoicesController::class, 'show'])->name('invoices.show');
Route::get('/invoices/{invoice}/edit', [InvoicesController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/{invoice}', [InvoicesController::class, 'update'])->name('invoices.update');
Route::delete('/invoices/{invoice}', [InvoicesController::class, 'destroy'])->name('invoices.destroy');
Route::get('/invoices/pending', [InvoicesController::class, 'showPendingInvoices'])->name('invoices.pending');
Route::get('/invoices/completed', [InvoicesController::class, 'showCompletedInvoices'])->name('invoices.completed');
Route::get('/canceled_invoices', [InvoicesController::class, 'showCanceledInvoices'])->name('invoices.canceled');

// Define resourceful routes for carts
Route::get('/carts', [CartsController::class, 'index'])->name('carts.index');
Route::get('/carts/create', [CartsController::class, 'create'])->name('carts.create');
Route::post('/carts/store', [CartsController::class, 'store'])->name('carts.store');
Route::get('/carts/show/{user}', [CartsController::class, 'show'])->name('carts.show');
Route::get('/carts/edit/{id}', [CartsController::class, 'edit'])->name('carts.edit');
Route::put('/carts/update/{id}', [CartsController::class, 'update'])->name('carts.update');
Route::delete('/carts/destroy/{id}', [CartsController::class, 'destroy'])->name('carts.destroy');



// Define routes for Podcasts
Route::get('/podcasts', [PodcastsController::class, 'index'])->name('podcasts.index');
Route::get('/podcasts/create', [PodcastsController::class, 'create'])->name('podcasts.create');
Route::post('/podcasts/store', [PodcastsController::class, 'store'])->name('podcasts.store');
Route::get('/podcasts/{id}', [PodcastsController::class, 'show'])->name('podcasts.show');
Route::get('/podcasts/edit/{id}', [PodcastsController::class, 'edit'])->name('podcasts.edit');
Route::put('/podcasts/update/{id}', [PodcastsController::class, 'update'])->name('podcasts.update');
Route::delete('/podcasts/destroy/{id}', [PodcastsController::class, 'destroy'])->name('podcasts.destroy');
Route::patch('/podcasts/{podcast}', [PodcastsController::class, 'updateStatus'])->name('podcasts.updateStatus');


Auth::routes();
//admin panel
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [AuctionsController::class, 'showSettings']);

Route::resource('tickets', TicketsController::class);



// Define routes for job titles
Route::get('/job_titles', [JobTitlesController::class, 'index'])->name('job_titles.index');
Route::get('/job_titles/create', [JobTitlesController::class, 'create'])->name('job_titles.create');
Route::post('/job_titles/store', [JobTitlesController::class, 'store'])->name('job_titles.store');
Route::get('/job_titles/show/{id}', [JobTitlesController::class, 'show'])->name('job_titles.show');
Route::get('/job_titles/edit/{id}', [JobTitlesController::class, 'edit'])->name('job_titles.edit');
Route::put('/job_titles/update/{id}', [JobTitlesController::class, 'update'])->name('job_titles.update');
Route::delete('/job_titles/destroy/{id}', [JobTitlesController::class, 'destroy'])->name('job_titles.destroy');
Route::patch('/job_titles/{jobTitle}', [JobTitlesController::class, 'updateStatus'])->name('job_titles.updateStatus');


// Define resourceful routes for options
Route::get('/options', [OptionsController::class, 'index'])->name('options.index');
Route::get('/options/create', [OptionsController::class, 'create'])->name('options.create');
Route::post('/options/store', [OptionsController::class, 'store'])->name('options.store');
Route::get('/options/{id}', [OptionsController::class, 'show'])->name('options.show');
Route::get('/options/edit/{id}', [OptionsController::class, 'edit'])->name('options.edit');
Route::put('/options/update/{id}', [OptionsController::class, 'update'])->name('options.update');
Route::delete('/options/destroy/{id}', [OptionsController::class, 'destroy'])->name('options.destroy');










// Define resourceful routes for sections
Route::get('/sections', [SectionsController::class, 'index'])->name('sections.index');
Route::get('/sections/create', [SectionsController::class, 'create'])->name('sections.create');
Route::post('/sections/store', [SectionsController::class, 'store'])->name('sections.store');
Route::get('/sections/{section}', [SectionsController::class, 'show'])->name('sections.show');
Route::get('/sections/edit/{id}', [SectionsController::class, 'edit'])->name('sections.edit');
Route::put('/sections/update/{id}', [SectionsController::class, 'update'])->name('sections.update');
Route::delete('/sections/destroy/{id}', [SectionsController::class, 'destroy'])->name('sections.destroy');








// Define routes for Auctions
Route::get('/auctions', [AuctionsController::class, 'index'])->name('auctions.index');
Route::get('/auctions/create', [AuctionsController::class, 'create'])->name('auctions.create');
Route::get('/auctions/{id}', [AuctionsController::class, 'show'])->name('auctions.show');
Route::post('/auctions/store', [AuctionsController::class, 'store'])->name('auctions.store');
Route::get('/auctions/edit/{id}', [AuctionsController::class, 'edit'])->name('auctions.edit');
Route::put('/auctions/update/{id}', [AuctionsController::class, 'update'])->name('auctions.update');
Route::delete('/auctions/delete/{id}', [AuctionsController::class, 'destroy'])->name('auctions.delete');







// Route to show the ticket creation form
Route::get('tickets/create', [TicketsController::class, 'create'])->name('tickets.create');
Route::get('tickets', [TicketsController::class, 'index'])->name('tickets.index');
Route::post('tickets/{parentTicketId}/reply', [TicketsController::class, 'storeReply'])->name('tickets.storeReply');


Route::get('/artists', [HomeController::class, 'showArtists'])->name('users.artists');
Route::get('/artists/edit/{id}', [HomeController::class, 'editArtists'])->name('users.artists.edit');
Route::put('/artists/update/{id}', [HomeController::class, 'updateArtists'])->name('users.artists.update');





Route::get('/users/create', [HomeController::class, 'create'])->name('users.create');
Route::post('/users/store', [HomeController::class, 'store'])->name('users.store');
Route::delete('/users/delete/{id}', [HomeController::class, 'delete'])->name('users.delete');
Route::get('/users/profile/{id}', [HomeController::class, 'profile'])->name('users.profile');


Route::get('/non-artists', [HomeController::class, 'showNonArtists'])->name('users.nonArtists');
Route::get('/non-artists/edit/{id}', [HomeController::class, 'editNonArtists'])->name('users.nonArtists.edit');
Route::put('/non-artists/update/{id}', [HomeController::class, 'updateNonArtists'])->name('users.nonArtists.update');









