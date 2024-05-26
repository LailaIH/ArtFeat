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
use App\Http\Controllers\CollectionController;

use App\Http\Controllers\TicketsController;
use App\Http\Controllers\LandingPage\LandingController;
use App\Http\Controllers\LandingPage\DiscoverController;
use App\Http\Controllers\LandingPage\ArtistController;
use App\Http\Controllers\LandingPage\UserCartsController;
use App\Http\Controllers\LandingPage\StripeController;




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

Auth::routes();



Route::get('/languageConverter/{locale}', [LandingController::class, 'switch'])->name('languageConverter');

//public routes for landing pages
Route::get('/', [LandingController::class, 'welcome'])->name('welcome');
Route::get('/events', [LandingController::class, 'events'])->name('events');
Route::get('/landing/auctions', [LandingController::class, 'auctions'])->name('auctions');
Route::get('/privacy/policy', [LandingController::class, 'privacyPolicy'])->name('privacyPolicy');


Route::get('/all/sections', [LandingController::class, 'allSections'])->name('allSections');

Route::get('/discover', [DiscoverController::class, 'discover'])->name('discover');
Route::get('/one/card/{artist}', [DiscoverController::class, 'oneCard'])->name('one_card');

Route::post('/artists/search', [DiscoverController::class, 'search'])->name('artists.search');


Route::get('/live/join', function () {
    return view('livejoin');
});





Route::get('/who/we/are', function () {
    return view('who-we-are');
});

Route::get('/proooo', function () {
    return view('landing.profile');
});





Route::get('/terms/conditions', function () {
    return view('terms-and-conditions');
});



// landing page carts routes

     // for non logged users
Route::post('/non/logged/user/add/to/cart/{id}', [UserCartsController::class, 'nonLoggedUserAddToCart'])->name('non_logged_add_to_cart');
Route::get('/cart/details', [UserCartsController::class, 'nonLoggedUserCart'])->name('non_logged_cart');
Route::put('/update/non/logged/user/cart/{id}', [UserCartsController::class, 'updateNonLoggedUserCart'])->name('updateNonLoggedUserCart');
Route::delete('/delete/non/logged/user/cart/{id}', [UserCartsController::class, 'removeFromCart'])->name('removeFromCart');


     // for logged users
Route::get('/cart/details/user/{id}', [UserCartsController::class, 'loggedUserCart'])->name('logged_user_cart')
->middleware('auth', 'checkUserCart');
Route::post('/logged/user/add/to/cart/{id}', [UserCartsController::class, 'loggedUserAddToCart'])->name('logged_add_to_cart')
->middleware('auth');
Route::put('/update/logged/user/cart/{id}', [UserCartsController::class, 'updateLoggedUserCart'])->name('updateLoggedUserCart')->middleware('auth');
Route::delete('/delete/logged/user/cart/{id}', [UserCartsController::class, 'deleteLoggedUserCart'])->name('deleteLoggedUserCart')->middleware('auth');
Route::get('/user/paidd/invoices', [UserCartsController::class, 'paidInvoices'])->name('paidInvoices')
->middleware('auth');


// artists landing page
Route::get('/artists/signup', [ArtistController::class, 'signup'])->name('artists.signup');
Route::post('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::get('/artists/show/add/collection', [ArtistController::class, 'showAddCollection'])
->name('artists.showAddCollection')->middleware('auth', 'checkArtistAuth');
Route::post('/artists/add/collection/{id}', [ArtistController::class, 'addCollection'])->name('artists.add_collection');

Route::get('/artists/show/add/to/collection/{id}', [ArtistController::class, 'showAddToCollection'])
->name('artists.showAddToCollection')->middleware('auth', 'checkArtistCollection');

Route::post('/artists/add/to/collection/{id}', [ArtistController::class, 'addArtToCollection'])->name('artists.add_to_collection');
Route::post('/artists/add/expertise/{id}', [ArtistController::class, 'addExpert'])->name('artists.addExpert');
Route::post('/artists/add/desc/{id}', [ArtistController::class, 'addDescription'])->name('artists.addDescription');
Route::post('/artists/add/years/{id}', [ArtistController::class, 'addYears'])->name('artists.addYears');




Route::get('/artists/profile/{id}', [ArtistController::class, 'profile'])
->name('artists.profile')
->middleware('auth', 'checkArtistProfile');

Route::get('/artists/edit/profile/{id}', [ArtistController::class, 'editProfile'])
->name('artists.edit_profile')
->middleware('auth', 'checkArtistProfile');

Route::put('/artists/update/profile/{id}', [ArtistController::class, 'update'])
->name('artists.update')
->middleware('auth', 'checkArtistProfile');

Route::post('/artists/edit/profile/picture/{id}', [ArtistController::class, 'updateProfilePicture'])
->name('artists.updateProfilePicture')
->middleware('auth', 'checkArtistProfile');

Route::post('/artists/edit/background/picture/{id}', [ArtistController::class, 'updateBackgroundPicture'])
->name('artists.updateBackgroundPicture')
->middleware('auth', 'checkArtistProfile');

Route::post('/collections/disable/{collection}', [ArtistController::class, 'disableCollection'])
->name('artists.collectionsDisable');




Route::get('/landing/login', function () {
    return view('landing-login');
});

Route::get('/landing/signup', function () {
    return view('landing-signup');
});

// stripe
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
Route::post('/webhook', [StripeController::class, 'webhook'])->name('webhook');

// Admin Panel Routes

Route::middleware(['auth', 'check.admin'])->group(function () {


//admin panel
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');    

// Define resourceful routes for products
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
//Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/edit/{product}', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{product}', [ProductsController::class, 'updateCollectionIdProduct'])->name('products.update');
Route::get('/products/show/{product}', [ProductsController::class, 'showOfflineCollectionIdProduct'])->name('products.show_offline_product');

Route::get('/products/show-offline/{product}', [ProductsController::class, 'showOfflineProduct'])->name('products.show_offline');
Route::put('/products/update-is-online/{product}', [ProductsController::class, 'updateIsOnlineProduct'])->name('products.update_is_online');



// Define resourceful routes for orders
Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/edit/{order}', [OrdersController::class, 'edit'])->name('orders.edit');
Route::put('/orders/update/{order}', [OrdersController::class, 'update'])->name('orders.update');



// Define resourceful routes for invoices
Route::get('/invoices/edit/{invoice}', [InvoicesController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/update/{invoice}', [InvoicesController::class, 'update'])->name('invoices.update');
Route::get('/invoices/unpaid', [InvoicesController::class, 'showUnpaidInvoices'])->name('invoices.unpaid');
Route::get('/invoices/paid', [InvoicesController::class, 'showPaidInvoices'])->name('invoices.paid');
Route::get('invoices/canceled', [InvoicesController::class, 'showCanceledInvoices'])->name('invoices.canceled');

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
//Route::get('/podcasts/{id}', [PodcastsController::class, 'show'])->name('podcasts.show');
Route::get('/podcasts/edit/{id}', [PodcastsController::class, 'edit'])->name('podcasts.edit');
Route::put('/podcasts/update/{id}', [PodcastsController::class, 'update'])->name('podcasts.update');
Route::delete('/podcasts/destroy/{id}', [PodcastsController::class, 'destroy'])->name('podcasts.destroy');
Route::patch('/podcasts/{podcast}', [PodcastsController::class, 'updateStatus'])->name('podcasts.updateStatus');






//Route::get('/settings', [AuctionsController::class, 'showSettings']);




// Define routes for job titles
Route::get('/job_titles', [JobTitlesController::class, 'index'])->name('job_titles.index');
Route::get('/job_titles/create', [JobTitlesController::class, 'create'])->name('job_titles.create');
Route::post('/job_titles/store', [JobTitlesController::class, 'store'])->name('job_titles.store');
//Route::get('/job_titles/show/{id}', [JobTitlesController::class, 'show'])->name('job_titles.show');
Route::get('/job_titles/edit/{id}', [JobTitlesController::class, 'edit'])->name('job_titles.edit');
Route::put('/job_titles/update/{id}', [JobTitlesController::class, 'update'])->name('job_titles.update');
Route::delete('/job_titles/destroy/{id}', [JobTitlesController::class, 'destroy'])->name('job_titles.destroy');
Route::patch('/job_titles/{jobTitle}', [JobTitlesController::class, 'updateStatus'])->name('job_titles.updateStatus');


// Define resourceful routes for options
Route::get('/options', [OptionsController::class, 'index'])->name('options.index');
Route::get('/options/create', [OptionsController::class, 'create'])->name('options.create');
Route::post('/options/store', [OptionsController::class, 'store'])->name('options.store');
//Route::get('/options/{id}', [OptionsController::class, 'show'])->name('options.show');
Route::get('/options/edit/{id}', [OptionsController::class, 'edit'])->name('options.edit');
Route::put('/options/update/{id}', [OptionsController::class, 'update'])->name('options.update');
Route::delete('/options/destroy/{id}', [OptionsController::class, 'destroy'])->name('options.destroy');





// Define resourceful routes for sections
Route::get('/sections', [SectionsController::class, 'index'])->name('sections.index');
Route::get('/sections/create', [SectionsController::class, 'create'])->name('sections.create');
Route::post('/sections/store', [SectionsController::class, 'store'])->name('sections.store');
//Route::get('/sections/{section}', [SectionsController::class, 'show'])->name('sections.show');
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
Route::resource('tickets', TicketsController::class);
Route::get('tickets/create', [TicketsController::class, 'create'])->name('tickets.create');
Route::get('tickets', [TicketsController::class, 'index'])->name('tickets.index');
Route::post('tickets/{parentTicketId}/reply', [TicketsController::class, 'storeReply'])->name('tickets.storeReply');


Route::get('/artists', [HomeController::class, 'showArtists'])->name('users.artists');
Route::get('/artists/edit/{id}', [HomeController::class, 'editArtists'])->name('users.artists.edit');
Route::put('/artists/update/{id}', [HomeController::class, 'updateArtists'])->name('users.artists.update');





Route::get('/users/create', [HomeController::class, 'create'])->name('users.create');
Route::post('/users/store', [HomeController::class, 'store'])->name('users.store');
Route::delete('/users/delete/artist/{id}', [HomeController::class, 'deleteArtist'])->name('users.deleteArtist');
Route::get('/users/profile/{id}', [HomeController::class, 'profile'])->name('users.profile');


Route::get('/non-artists', [HomeController::class, 'showNonArtists'])->name('users.nonArtists');
Route::get('/non-artists/edit/{id}', [HomeController::class, 'editNonArtists'])->name('users.nonArtists.edit');
Route::put('/non-artists/update/{id}', [HomeController::class, 'updateNonArtists'])->name('users.nonArtists.update');
Route::delete('/users/delete/{id}', [HomeController::class, 'deleteUser'])->name('users.deleteUser');


// collections routes
Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::get('/collections/create', [CollectionController::class, 'create'])->name('collections.create');
Route::get('/collections/edit/{collection}', [CollectionController::class, 'edit'])->name('collections.edit');
Route::post('/collections/store', [CollectionController::class, 'store'])->name('collections.store');
Route::put('/collections/update/{collection}', [CollectionController::class, 'update'])->name('collections.update');





});









