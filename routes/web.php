<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\payment\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Livewire\Admin\Blog as AdminBlog;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\EditUser;
use App\Livewire\Admin\Inventry;
use App\Livewire\Admin\LaundryCategory;
use App\Livewire\Admin\LaundryList;
use App\Livewire\Admin\Report;
use App\Livewire\Admin\SupplyList;
use App\Livewire\Admin\User;
use App\Livewire\Auth\Login;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\BlogDetails;
use App\Livewire\Pages\Track;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get("/login", [LoginController::class, "index"]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/about", [AboutController::class, "index"])->name("about");

Route::get("/contact-us", [ContactController::class, "index"])->name("contact");

Route::get("/service", [ServiceController::class, "index"])->name("service");


Route::get("/track-laundry", Track::class)->name("track");

Route::get("/payment/callback", [PaymentController::class, "handleGatewayCallback"])->name("payment.callback");

Route::get("/blog", Blog::class);

Route::get("/blog-detail", BlogDetails::class);

//admin routes
Route::group(["middleware" => ['auth'], "prefix" => "admin"], function () {
    Route::get('/dashboard', Dashboard::class)->name("dashboard");

    Route::get('/laundry-list', LaundryList::class)->name("laundry-list");

    Route::get('/laundry-category', LaundryCategory::class)->name("laundry-category");

    Route::get('/supply-list', SupplyList::class)->name("supply-list");

    Route::get('/reports', Report::class)->name("reports");

    Route::get('/users', User::class)->name("users");
    Route::get('users/{user}', EditUser::class)->name("edit-user");

    Route::get('/inventry', Inventry::class)->name("inventry");

    Route::get('/blog', AdminBlog::class);
});




Route::get('/login', Login::class);
