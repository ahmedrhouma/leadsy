<?php

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

Route::group(['/admin'], function () {
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/thematics', [\App\Http\Controllers\ThematicsController::class,'index'])->name('admin.thematics');
    Route::post('/thematic', [\App\Http\Controllers\ThematicsController::class,'store'])->name('admin.thematics.store');
    Route::delete('/thematic', [\App\Http\Controllers\ThematicsController::class,'destroy'])->name('admin.thematics.destroy');
    Route::post('/thematic/show', [\App\Http\Controllers\ThematicsController::class,'show'])->name('admin.thematics.show');
    Route::post('/thematic/update', [\App\Http\Controllers\ThematicsController::class,'update'])->name('admin.thematics.update');

    Route::get('/advertisers',[\App\Http\Controllers\AdvertisersController::class,'index'])->name('admin.advertisers');

    Route::get('/campaigns',[\App\Http\Controllers\CampaignsController::class,'index'])->name('admin.campaigns');

    Route::get('/leads',[\App\Http\Controllers\LeadsController::class,'index'])->name('admin.leads');

    Route::get('/publishers',[\App\Http\Controllers\PublishersController::class,'index'])->name('admin.publishers');
    Route::post('/publisher', [\App\Http\Controllers\PublishersController::class,'store'])->name('admin.publishers.store');
    Route::post('/publisher/show', [\App\Http\Controllers\PublishersController::class,'show'])->name('admin.publishers.show');
    Route::post('/publisher/update', [\App\Http\Controllers\PublishersController::class,'update'])->name('admin.publishers.update');
    Route::delete('/publisher', [\App\Http\Controllers\PublishersController::class,'destroy'])->name('admin.publishers.destroy');

});

