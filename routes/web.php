<?php

use App\Livewire\Pages\Faq;
use App\Livewire\Admin\User;
use App\Livewire\Auth\Login;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\Track;
use App\Livewire\Admin\Report;
use App\Livewire\Admin\EditUser;
use App\Livewire\Admin\Inventry;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Pages\Agreement;
use App\Livewire\Admin\SupplyList;
use App\Livewire\Admin\LaundryList;
use App\Livewire\Pages\BlogDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Livewire\Admin\LaundryCategory;
use App\Http\Controllers\AboutController;
use App\Livewire\Admin\Blog as AdminBlog;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\payment\PaymentController;
use App\Http\Controllers\PdfReceiptController;
use App\Http\Controllers\ReportPdfController;
use App\Livewire\Admin\Payment;
use App\Livewire\Pages\Price;

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
    return view('home');
});

Route::get("/reset-password", function(){
    return view("auth.passwords.email");
})->name("reset-password");

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/about", [AboutController::class, "index"])->name("about");

Route::get("/contact-us", [ContactController::class, "index"])->name("contact");
Route::post("/contact-us", [ContactController::class, "sendMessage"]);

Route::get("/service", [ServiceController::class, "index"])->name("service");


Route::get("/track-laundry", Track::class)->name("track");

Route::get('/terms-and-conditions', Agreement::class)->name("agreement");


Route::get('/faq', Faq::class)->name("faq");

Route::get("/payment/callback", [PaymentController::class, "handleGatewayCallback"])->name("payment.callback");

Route::get("/prices", Price::class)->name("price");

// Route::get("/blog", Blog::class)->name("blog");

// Route::get("/blog/{blog}", BlogDetails::class);

Route::get("/generate-pdf/{id}", [PDFController::class, "index"])->name("generate-pdf");
Route::get("/receipt-pdf/{id}", [PdfReceiptController::class, "index"])->name("receipt-pdf");

// Route::get("/generate-report-pdf/{dateFrom}/{dateTo}", [ReportPdfController::class, "index"])->name("generate-report-pdf");

//admin routes
Route::group(["middleware" => ['auth'], "prefix" => "admin"], function () {
    Route::get('/dashboard', Dashboard::class)->name("dashboard");

    Route::get('/laundry-list', LaundryList::class)->name("laundry-list");

    Route::get('/laundry-category', LaundryCategory::class)->name("laundry-category");

    Route::get('/supply-list', SupplyList::class)->name("supply-list");

    Route::get('/reports', Report::class)->name("reports");

    Route::get('/users', User::class)->name("users")->middleware("is_superadmin");
    Route::get('users/{user}', EditUser::class)->name("edit-user");

    Route::get('/inventry', Inventry::class)->name("inventry");

    Route::get('/payment', Payment::class )->name("payment");

    // Route::get('/blog', AdminBlog::class)->name("admin-blog");
});




Route::get('/admin/login', Login::class)->name("login");
