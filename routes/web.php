<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {return view('welcome');})->name('home');

//Items
Route::resource('items', ItemController::class);

Route::middleware(['auth'])->group(function () {
   
    Route::resource('bids', BidController::class)->except(['store','destroy']);
    Route::post('bids/{item:slug}', [BidController::class, 'store'])->name('bids.store');
    Route::delete('bids/remove/{item:slug}', [BidController::class, 'destroy'])->name('bids.destroy');

    //Reset Password
    Route::get('reset-my-password', [PasswordResetController::class, 'resetPassword'])->middleware('auth')->name('users.resetPassword');
    Route::post('store-new-password', [PasswordResetController::class, 'storePassword'])->middleware('auth')->name('users.storePassword');

    //Admin
    Route::get('admin/bids', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admins.bids');
});
require __DIR__ . '/auth.php';
