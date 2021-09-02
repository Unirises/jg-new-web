<?php

use App\Http\Controllers\Listing\CategoryController;
use App\Http\Controllers\Listing\ItemController;
use App\Http\Controllers\Listing\ItemVariantController;
use App\Http\Controllers\Listing\VariantController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\RiderController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureUserIsMerchant;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

Route::middleware(['auth'])->group(function () {
    Route::get('verification', [App\Http\Controllers\VerificationController::class, 'index'])->name('verification.index');
    Route::post('verification/merchant', [App\Http\Controllers\VerificationController::class, 'merchant'])->name('verification.merchant.set');
    Route::post('verification/rider', [App\Http\Controllers\VerificationController::class, 'rider'])->name('verification.rider.set');
    
    //Update User Details
    Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
});

Route::middleware([EnsureUserIsAdmin::class])->group(function () {
    Route::put('verification/rider/{id}/approve', [App\Http\Controllers\VerificationController::class, 'approveRider'])->name('verification.rider.approve');
    Route::put('verification/rider/{id}/deny', [App\Http\Controllers\VerificationController::class, 'denyRider'])->name('verification.rider.deny');
    Route::put('verification/merchant/{id}/approve', [App\Http\Controllers\VerificationController::class, 'approveMerchant'])->name('verification.merchant.approve');
    Route::put('verification/merchant/{id}/deny', [App\Http\Controllers\VerificationController::class, 'denyMerchant'])->name('verification.merchant.deny');

    Route::resource('riders', RiderController::class);
    Route::resource('merchants', MerchantController::class);
});

Route::middleware([EnsureUserIsMerchant::class])->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('category.item', ItemController::class);
    Route::resource('category.item.variants', ItemVariantController::class);
    Route::resource('category.item.variants.selection', VariantController::class);
});