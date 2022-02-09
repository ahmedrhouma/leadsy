<?php

use App\Models\Publishers;
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

Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/thematics', [\App\Http\Controllers\ThematicsController::class,'index'])->name('admin.thematics');
    Route::post('/thematic', [\App\Http\Controllers\ThematicsController::class,'store'])->name('admin.thematics.store');
    Route::delete('/thematic', [\App\Http\Controllers\ThematicsController::class,'destroy'])->name('admin.thematics.destroy');
    Route::post('/thematic/show', [\App\Http\Controllers\ThematicsController::class,'show'])->name('admin.thematics.show');
    Route::post('/thematic/update', [\App\Http\Controllers\ThematicsController::class,'update'])->name('admin.thematics.update');

    Route::get('/advertisers',[\App\Http\Controllers\AdvertisersController::class,'index'])->name('admin.advertisers');
    Route::post('/advert', [\App\Http\Controllers\AdvertisersController::class,'store'])->name('admin.advertisers.store');
    Route::post('/advert/show', [\App\Http\Controllers\AdvertisersController::class,'show'])->name('admin.advertisers.show');
    Route::post('/advert/update', [\App\Http\Controllers\AdvertisersController::class,'update'])->name('admin.advertisers.update');
    Route::delete('/advertisers', [\App\Http\Controllers\AdvertisersController::class,'destroy'])->name('admin.advertisers.destroy');


    Route::get('/campaigns',[\App\Http\Controllers\CampaignsController::class,'index'])->name('admin.campaigns');
    Route::post('/campaigns', [\App\Http\Controllers\CampaignsController::class,'store'])->name('admin.campaigns.store');
    Route::post('/campaigns/show', [\App\Http\Controllers\CampaignsController::class,'show'])->name('admin.campaigns.show');
    Route::post('/campaigns/update', [\App\Http\Controllers\CampaignsController::class,'update'])->name('admin.campaigns.update');
    Route::delete('/campaigns', [\App\Http\Controllers\CampaignsController::class,'destroy'])->name('admin.campaigns.destroy');

    Route::get('/leads',[\App\Http\Controllers\LeadsController::class,'index'])->name('admin.leads');
    Route::get('/leads/list',[\App\Http\Controllers\LeadsController::class,'indexList'])->name('admin.leads.list');

    Route::get('/publishers',[\App\Http\Controllers\PublishersController::class,'index'])->name('admin.publishers');
    Route::post('/publisher', [\App\Http\Controllers\PublishersController::class,'store'])->name('admin.publishers.store');
    Route::post('/publisher/show', [\App\Http\Controllers\PublishersController::class,'show'])->name('admin.publishers.show');
    Route::post('/publisher/update', [\App\Http\Controllers\PublishersController::class,'update'])->name('admin.publishers.update');
    Route::delete('/publisher', [\App\Http\Controllers\PublishersController::class,'destroy'])->name('admin.publishers.destroy');


});

Route::group(['prefix'=>'advert', 'middleware' => ['auth']], function () {
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('advertiser.dashboard');
    Route::get('/campaigns',[\App\Http\Controllers\CampaignsController::class,'index'])->name('advertiser.campaigns');
    Route::post('/campaigns', [\App\Http\Controllers\CampaignsController::class,'store'])->name('advertiser.campaigns.store');
    Route::post('/campaigns/show', [\App\Http\Controllers\CampaignsController::class,'show'])->name('advertiser.campaigns.show');
    Route::post('/campaigns/update', [\App\Http\Controllers\CampaignsController::class,'update'])->name('advertiser.campaigns.update');
    Route::delete('/campaigns', [\App\Http\Controllers\CampaignsController::class,'destroy'])->name('advertiser.campaigns.destroy');
    Route::get('/leads',[\App\Http\Controllers\LeadsController::class,'index'])->name('advertiser.leads');
    Route::get('/leads/list',[\App\Http\Controllers\LeadsController::class,'indexList'])->name('advertiser.leads.list');
});

Route::group(['prefix'=>'publisher', 'middleware' => ['auth']], function () {
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('publisher.dashboard');
    Route::get('/campaigns',[\App\Http\Controllers\CampaignsController::class,'index'])->name('publisher.campaigns');
    Route::post('/campaigns', [\App\Http\Controllers\CampaignsController::class,'store'])->name('publisher.campaigns.store');
    Route::post('/campaigns/show', [\App\Http\Controllers\CampaignsController::class,'show'])->name('publisher.campaigns.show');
    Route::post('/campaigns/update', [\App\Http\Controllers\CampaignsController::class,'update'])->name('publisher.campaigns.update');
    Route::delete('/campaigns', [\App\Http\Controllers\CampaignsController::class,'destroy'])->name('publisher.campaigns.destroy');
    Route::get('/leads',[\App\Http\Controllers\LeadsController::class,'index'])->name('publisher.leads');
    Route::get('/leads/list',[\App\Http\Controllers\LeadsController::class,'indexList'])->name('publisher.leads.list');
});
