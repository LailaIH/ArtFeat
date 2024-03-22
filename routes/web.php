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

Route::get('/', function () {
    return view('welcome');
});


// Define resourceful routes for products
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

// Define resourceful routes for orders
Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
Route::get('/orders/{order}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');

// Define resourceful routes for sections
Route::get('/sections', [SectionsController::class, 'index'])->name('sections.index');
Route::get('/sections/create', [SectionsController::class, 'create'])->name('sections.create');
Route::post('/sections', [SectionsController::class, 'store'])->name('sections.store');
Route::get('/sections/{section}', [SectionsController::class, 'show'])->name('sections.show');
Route::get('/sections/{section}/edit', [SectionsController::class, 'edit'])->name('sections.edit');
Route::put('/sections/{section}', [SectionsController::class, 'update'])->name('sections.update');
Route::delete('/sections/{section}', [SectionsController::class, 'destroy'])->name('sections.destroy');

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
Route::post('/carts', [CartsController::class, 'store'])->name('carts.store');
Route::get('/carts/{cart}', [CartsController::class, 'show'])->name('carts.show');
Route::get('/carts/{cart}/edit', [CartsController::class, 'edit'])->name('carts.edit');
Route::put('/carts/{cart}', [CartsController::class, 'update'])->name('carts.update');
Route::delete('/carts/{cart}', [CartsController::class, 'destroy'])->name('carts.destroy');

// Define resourceful routes for options
Route::get('/options', [OptionsController::class, 'index'])->name('options.index');
Route::get('/options/create', [OptionsController::class, 'create'])->name('options.create');
Route::post('/options', [OptionsController::class, 'store'])->name('options.store');
Route::get('/options/{option}', [OptionsController::class, 'show'])->name('options.show');
Route::get('/options/{option}/edit', [OptionsController::class, 'edit'])->name('options.edit');
Route::put('/options/{option}', [OptionsController::class, 'update'])->name('options.update');
Route::delete('/options/{option}', [OptionsController::class, 'destroy'])->name('options.destroy');

// Define routes for job titles
Route::get('/job_titles', [JobTitlesController::class, 'index'])->name('job_titles.index');
Route::get('/job_titles/create', [JobTitlesController::class, 'create'])->name('job_titles.create');
Route::post('/job_titles', [JobTitlesController::class, 'store'])->name('job_titles.store');
Route::get('/job_titles/{job_title}', [JobTitlesController::class, 'show'])->name('job_titles.show');
Route::get('/job_titles/{job_title}/edit', [JobTitlesController::class, 'edit'])->name('job_titles.edit');
Route::put('/job_titles/{job_title}', [JobTitlesController::class, 'update'])->name('job_titles.update');
Route::delete('/job_titles/{job_title}', [JobTitlesController::class, 'destroy'])->name('job_titles.destroy');
Route::patch('/job_titles/{jobTitle}', [JobTitlesController::class, 'updateStatus'])->name('job_titles.updateStatus');


// Define routes for Podcasts
Route::get('/podcasts', [PodcastsController::class, 'index'])->name('podcasts.index');
Route::get('/podcasts/create', [PodcastsController::class, 'create'])->name('podcasts.create');
Route::post('/podcasts', [PodcastsController::class, 'store'])->name('podcasts.store');
Route::get('/podcasts/{id}', [PodcastsController::class, 'show'])->name('podcasts.show');
Route::get('/podcasts/{id}/edit', [PodcastsController::class, 'edit'])->name('podcasts.edit');
Route::put('/podcasts/{id}', [PodcastsController::class, 'update'])->name('podcasts.update');
Route::patch('/podcasts/{id}', [PodcastsController::class, 'update']);
Route::delete('/podcasts/{id}', [PodcastsController::class, 'destroy'])->name('podcasts.destroy');

// Define routes for Auctions
Route::get('/auctions', [AuctionsController::class, 'index'])->name('auctions.index');
Route::get('/auctions/create', [AuctionsController::class, 'create'])->name('auctions.create');
Route::post('/auctions', [AuctionsController::class, 'store'])->name('auctions.store');
Route::get('/auctions/{id}', [AuctionsController::class, 'show'])->name('auctions.show');
Route::get('/auctions/{id}/edit', [AuctionsController::class, 'edit'])->name('auctions.edit');
Route::put('/auctions/{id}', [AuctionsController::class, 'update'])->name('auctions.update');
Route::patch('/auctions/{id}', [AuctionsController::class, 'update']);
Route::delete('/auctions/{id}', [AuctionsController::class, 'destroy'])->name('auctions.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [AuctionsController::class, 'showSettings']);

Route::resource('tickets', TicketsController::class);

// Route to show the ticket creation form
Route::get('tickets/create', [TicketsController::class, 'create'])->name('tickets.create');
Route::get('tickets', [TicketsController::class, 'index'])->name('tickets.index');
Route::post('tickets/{parentTicketId}/reply', [TicketsController::class, 'storeReply'])->name('tickets.storeReply');

Route::get('/artists', [HomeController::class, 'showArtists'])->name('users.artists');
Route::get('/non-artists', [HomeController::class, 'showNonArtists'])->name('users.nonArtists');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
