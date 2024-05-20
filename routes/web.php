<?php

use App\Http\Controllers\AboutController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Inventry;
use App\Livewire\Admin\LaundryCategory;
use App\Livewire\Admin\LaundryList;
use App\Livewire\Admin\Report;
use App\Livewire\Admin\SupplyList;
use App\Livewire\Admin\User;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/about", [AboutController::class, "index"])->name("about");

Route::get("/contact-us", [AboutController::class, "index"])->name("contact");

Route::get("/service", [AboutController::class, "index"])->name("service");


//admin routes
Route::get('/dashboard', Dashboard::class)->name("dashboard");

Route::get('/laundry-list', LaundryList::class)->name("laundry-list");

Route::get('/laundry-category', LaundryCategory::class)->name("laundry-category");

Route::get('/supply-list', SupplyList::class)->name("supply-list");

Route::get('/reports', Report::class)->name("reports");

Route::get('/users', User::class)->name("users");

Route::get('/inventry', Inventry::class)->name("inventry");