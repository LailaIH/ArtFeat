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
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CreatorsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FollowingsController;
use App\Http\Controllers\ShippingCompanyController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\LandingPage\LandingController;
use App\Http\Controllers\LandingPage\DiscoverController;
use App\Http\Controllers\LandingPage\ArtistController;
use App\Http\Controllers\LandingPage\UserCartsController;
use App\Http\Controllers\LandingPage\StripeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SupportsController;
use App\Models\Auction;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
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

// Route::get('/test', [LandingController::class, 'test']);
Route::post('/filter', [LandingController::class, 'productsFilter'])->name('products.filter');
//public routes for landing pages
Route::get('/', [LandingController::class, 'welcome'])->name('welcome');
Route::get('/landing/events', [LandingController::class, 'events'])->name('events');
Route::get('/landing/single/event/{id}', [LandingController::class, 'singleEvent'])->name('events.single');

Route::get('/landing/auctions', [LandingController::class, 'auctions'])->name('auctions');
Route::post('/landing/auctions/price/{id}', [LandingController::class, 'addPriceLanding'])->name('addPrice');

Route::get('/privacy/policy', [LandingController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/support', [LandingController::class, 'support'])->name('support');


Route::get('/all/sections', [LandingController::class, 'allSections'])->name('allSections');
Route::get('/single/section/{id}', [LandingController::class, 'singleSection'])->name('singleSection');

Route::get('/discover', [DiscoverController::class, 'discover'])->name('discover');
Route::get('/one/card/{artist}', [DiscoverController::class, 'oneCard'])->name('one_card');

Route::get('/artists/search', [DiscoverController::class, 'search'])->name('artists.search');


Route::get('/live/join', function () {
    return view('livejoin');
});

Route::get('/dis', function () {
    return view('landing.editprofile');
});


// Route::get('/test', function () {
//     return view('landing.supportTickets');
// });



Route::get('/who/we/are', function () {
    return view('who-we-are');
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

Route::get('/artists/show/edit/artwork/{id}', [ArtistController::class, 'editArtWork'])
->name('artists.showEditArtwork')->middleware('auth');

Route::post('/artists/add/to/collection/{id}', [ArtistController::class, 'addArtToCollection'])->name('artists.add_to_collection');
Route::put('/artists/update-art-work/{id}', [ArtistController::class, 'updateArtWork'])->name('artists.updateArtWork');
Route::put('/artists/addArtToCollection/{id}', [ArtistController::class, 'addExistedArtworkToCollection'])->name('addExistedArtworkToCollection');

Route::post('/artists/add/expertise/{id}', [ArtistController::class, 'addExpert'])->name('artists.addExpert');
Route::post('/artists/add/desc/{id}', [ArtistController::class, 'addDescription'])->name('artists.addDescription');
Route::post('/artists/add/years/{id}', [ArtistController::class, 'addYears'])->name('artists.addYears');

Route::get('/artists/show/become/artist', [ArtistController::class, 'showBecomArtist'])
->name('artists.showBecomeArtist');
Route::get('/artists/become/artist', [ArtistController::class, 'becomeArtist'])
->name('artists.becomeArtist');

Route::get('/artists/artist/{id}', [ArtistController::class, 'showArtist'])
->name('artists.showArtist')->middleware('artistProfile');;

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

Route::put('/artists/collections/edit/{id}', [ArtistController::class, 'updateCollection'])->name('artists.collectionUpdate');


Route::get('/follow/{id}', [FollowingsController::class, 'follow'])->name('follow')->middleware(['auth']);
Route::delete('/unfollow/{id}', [FollowingsController::class, 'unfollow'])->name('unfollow')->middleware(['auth']);



Route::get('/landing/login', [LandingController::class, 'landingLogin'])->name('landingLogin')->middleware('capture.intended.url');
Route::get('/landing/signup', [LandingController::class, 'landingSignup'])->name('landingSignup')->middleware('capture.intended.url');
Route::get('/landing/user/profile', [LandingController::class, 'userProfile'])->name('userProfile')->middleware(['auth','userOnly']);
Route::put('/landing/user/update/profile/{id}', [LandingController::class, 'updateUser'])->name('userUpdateProfile')->middleware(['auth','userOnly']);

// landing tickets
Route::get('/landing/user/tickets', [LandingController::class, 'showTickets'])->name('showTickets')->middleware(['auth']);
Route::post('/landing/user/add/ticket', [LandingController::class, 'addTicket'])->name('addTicket')->middleware(['auth']);
Route::get('/landing/user/ticket/{id}/replies', [LandingController::class, 'showReplies'])->name('showRepliesOfTicket')->middleware(['auth']);
Route::post('/landing/user/reply/to/ticket', [LandingController::class, 'replyToTicket'])->name('replyToTicket')->middleware(['auth']);
Route::put('/landing/close/ticket/{id}', [LandingController::class, 'closeTicket'])->name('closeTicket')->middleware(['auth']);



// stripe
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
Route::post('/webhook', [StripeController::class, 'webhook'])->name('webhook');

// funds stripe

Route::post('/funds/checkout', [StripeController::class, 'fundsCheckout'])->name('fundsCheckout');
Route::get('/funds/success', [StripeController::class, 'fundSuccess'])->name('fundsSuccess');
Route::get('/funds/cancel', [StripeController::class, 'fundsCancel'])->name('fundsCancel');

// wallet payment

Route::get('/wallet/confirm/payment', [StripeController::class, 'showConfirmPayment'])->name('showConfirmPayment');
// success:
Route::get('/wallet/pay', [StripeController::class, 'payWithWallet'])->name('payWithWallet');
//cancel
Route::get('/wallet/cancel', [StripeController::class, 'cancelWallet'])->name('cancelWallet');



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
Route::post('/auctions/store', [AuctionsController::class, 'store'])->name('auctions.store');
Route::get('/auctions/edit/{id}', [AuctionsController::class, 'edit'])->name('auctions.edit');
Route::put('/auctions/update/{id}', [AuctionsController::class, 'update'])->name('auctions.update');
Route::delete('/auctions/delete/{id}', [AuctionsController::class, 'destroy'])->name('auctions.delete');
Route::get('/auctions/show/prices/{id}', [AuctionsController::class, 'showPrices'])->name('auctions.showPrices');
Route::get('/auctions/show/add/price/{id}', [AuctionsController::class, 'showAddPrice'])->name('auctions.showAddePrice');

Route::post('/auctions/add/price/{id}', [AuctionsController::class, 'addPrice'])->name('auctions.addPrice');







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


// Countries Routes
Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
Route::get('/countries/edit/{uuid}', [CountryController::class, 'edit'])->name('countries.edit');
Route::post('/countries/store', [CountryController::class, 'store'])->name('countries.store');
Route::put('/countries/update/{uuid}', [CountryController::class, 'update'])->name('countries.update');


// Shipping Companies Routes
Route::get('/shipping/companies', [ShippingCompanyController::class, 'index'])->name('shipping-companies.index');
Route::get('/shipping/companies/create', [ShippingCompanyController::class, 'create'])->name('shipping-companies.create');
Route::get('/shipping/companies/edit/{uuid}', [ShippingCompanyController::class, 'edit'])->name('shipping-companies.edit');
Route::post('/shipping/companies/store', [ShippingCompanyController::class, 'store'])->name('shipping-companies.store');
Route::put('/shipping/companies/update/{uuid}', [ShippingCompanyController::class, 'update'])->name('shipping-companies.update');
Route::get('/shipping/companies/show/offline/{uuid}', [ShippingCompanyController::class, 'showOffline'])->name('shipping-companies.show_offline');

// support routes
Route::get('/supports', [SupportsController::class, 'index'])->name('supports.index');
Route::get('/supports/create', [SupportsController::class, 'create'])->name('supports.create');
Route::get('/supports/edit/{id}', [SupportsController::class, 'edit'])->name('supports.edit');
Route::post('/supports/store', [SupportsController::class, 'store'])->name('supports.store');
Route::put('/supports/update/{id}', [SupportsController::class, 'update'])->name('supports.update');


// events routes
Route::get('/events', [EventsController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::get('/events/edit/{id}', [EventsController::class, 'edit'])->name('events.edit');
Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');
Route::put('/events/update/{id}', [EventsController::class, 'update'])->name('events.update');


// creators routes
Route::get('/creators', [CreatorsController::class, 'index'])->name('creators.index');
Route::get('/creators/create', [CreatorsController::class, 'create'])->name('creators.create');
Route::get('/creators/edit/{id}', [CreatorsController::class, 'edit'])->name('creators.edit');
Route::post('/creators/store', [CreatorsController::class, 'store'])->name('creators.store');
Route::put('/creators/update/{id}', [CreatorsController::class, 'update'])->name('creators.update');

// notifications routes
Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
Route::put('/notifications/approve/{id}', [NotificationsController::class, 'approve'])->name('notifications.approve');
Route::put('/notifications/reject/{id}', [NotificationsController::class, 'reject'])->name('notifications.reject');


});









