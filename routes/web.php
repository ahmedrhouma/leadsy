<?php

use App\Models\Publishers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fr'])) {
        abort(400);
    }
   App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang.change');
Route::get('/profile',[\App\Http\Controllers\ProfileController::class,'index'])->middleware('auth')->name('profile');
Route::post('/profile/update',[\App\Http\Controllers\ProfileController::class,'update'])->middleware('auth')->name('profile.update');

Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function () {
    Route::get('/leads',[\App\Http\Controllers\LeadsController::class,'index'])->name('admin.leads');
    Route::post('/thematic/countries', [\App\Http\Controllers\ThematicsController::class,'countries'])->name('admin.thematics.countries');
    Route::post('/campaigns/show', [\App\Http\Controllers\CampaignsController::class,'show'])->name('admin.campaigns.show');
    Route::post('/publisher/sources', [\App\Http\Controllers\PublishersController::class,'sources'])->name('admin.publishers.sources');
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth','checkRole:admin']], function () {
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/reports',[\App\Http\Controllers\ReportsController::class,'reports'])->name('admin.reports');
    Route::get('/advert/reports',[\App\Http\Controllers\ReportsController::class,'advertisersReports'])->name('admin.advertisers.reports');
    Route::get('/publishers/reports',[\App\Http\Controllers\ReportsController::class,'publishersReports'])->name('admin.publishers.reports');
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

    Route::post('/negotiation/messages', [\App\Http\Controllers\NegotiationsController::class,'messages'])->name('admin.negotiations.messages');
    Route::post('/negotiation/invite', [\App\Http\Controllers\NegotiationsController::class,'invite'])->name('admin.negotiations.invite');
    Route::post('/negotiation/prices', [\App\Http\Controllers\NegotiationsController::class,'prices'])->name('admin.negotiations.updatePrices');


    Route::get('/campaigns',[\App\Http\Controllers\CampaignsController::class,'index'])->name('admin.campaigns');
    Route::post('/campaigns', [\App\Http\Controllers\CampaignsController::class,'store'])->name('admin.campaigns.store');
    Route::post('/campaigns/update', [\App\Http\Controllers\CampaignsController::class,'update'])->name('admin.campaigns.update');
    Route::delete('/campaigns', [\App\Http\Controllers\CampaignsController::class,'destroy'])->name('admin.campaigns.destroy');
    Route::post('/campaigns/show', [\App\Http\Controllers\CampaignsController::class,'show'])->name('admin.campaigns.show');
    Route::post('/campaigns/view', [\App\Http\Controllers\CampaignsController::class,'view'])->name('admin.campaigns.view');
    Route::post('/campaigns/negotiations', [\App\Http\Controllers\CampaignsController::class,'negotiations'])->name('admin.campaigns.negotiationsHeader');

    Route::get('/publishers',[\App\Http\Controllers\PublishersController::class,'index'])->name('admin.publishers');
    Route::post('/publisher', [\App\Http\Controllers\PublishersController::class,'store'])->name('admin.publishers.store');
    Route::post('/publisher/show', [\App\Http\Controllers\PublishersController::class,'show'])->name('admin.publishers.show');
    Route::post('/publisher/update', [\App\Http\Controllers\PublishersController::class,'update'])->name('admin.publishers.update');
    Route::delete('/publisher', [\App\Http\Controllers\PublishersController::class,'destroy'])->name('admin.publishers.destroy');

    Route::get('/leads/list',[\App\Http\Controllers\LeadsController::class,'indexList'])->name('admin.leads.list');

    Route::get('/negotiations',[\App\Http\Controllers\NegotiationsController::class,'index'])->name('admin.negotiations');


});

Route::group(['prefix'=>'advert', 'middleware' => ['auth','checkRole:advertiser']], function () {
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('advertiser.dashboard');
    Route::get('/campaigns',[\App\Http\Controllers\CampaignsController::class,'index'])->name('advertiser.campaigns');
    Route::post('/campaigns', [\App\Http\Controllers\CampaignsController::class,'store'])->name('advertiser.campaigns.store');
    Route::post('/campaigns/show', [\App\Http\Controllers\CampaignsController::class,'show'])->name('advertiser.campaigns.show');
    Route::post('/campaigns/update', [\App\Http\Controllers\CampaignsController::class,'update'])->name('advertiser.campaigns.update');
    Route::delete('/campaigns', [\App\Http\Controllers\CampaignsController::class,'destroy'])->name('advertiser.campaigns.destroy');

    Route::get('/publishers/reports',[\App\Http\Controllers\ReportsController::class,'publishersReports'])->name('advertiser.publishers.reports');
    Route::post('/publishers/ban',[\App\Http\Controllers\ReportsController::class,'publishersReports'])->name('advertiser.publisher.ban');
    Route::get('/reports',[\App\Http\Controllers\ReportsController::class,'reports'])->name('advertiser.reports');

    Route::get('/negotiations',[\App\Http\Controllers\NegotiationsController::class,'index'])->name('advertiser.negotiations');
    Route::post('/negotiation/messages', [\App\Http\Controllers\NegotiationsController::class,'messages'])->name('advertiser.negotiations.messages');

    Route::get('/leads',[\App\Http\Controllers\LeadsController::class,'index'])->name('advertiser.leads');
    Route::get('/leads/comments',[\App\Http\Controllers\LeadsController::class,'saleComments'])->name('advertiser.leads.saleComments');
    Route::post('/leads/comments/add',[\App\Http\Controllers\LeadsController::class,'addComment'])->name('advertiser.leads.addComment');
    Route::post('/leads/status',[\App\Http\Controllers\LeadsController::class,'updateStatus'])->name('advertiser.leads.status');
    Route::post('/leads/reject',[\App\Http\Controllers\LeadsController::class,'updateRejection'])->name('advertiser.leads.reject');
    Route::get('/leads/list',[\App\Http\Controllers\LeadsController::class,'indexList'])->name('advertiser.leads.list');
});

Route::group(['prefix'=>'publisher', 'middleware' => ['auth','checkRole:publisher']], function () {
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('publisher.dashboard');
    Route::get('/campaigns',[\App\Http\Controllers\CampaignsController::class,'index'])->name('publisher.campaigns');
    Route::post('/campaigns', [\App\Http\Controllers\CampaignsController::class,'store'])->name('publisher.campaigns.store');
    Route::post('/campaigns/show', [\App\Http\Controllers\CampaignsController::class,'show'])->name('publisher.campaigns.show');
    Route::post('/campaigns/update', [\App\Http\Controllers\CampaignsController::class,'update'])->name('publisher.campaigns.update');
    Route::delete('/campaigns', [\App\Http\Controllers\CampaignsController::class,'destroy'])->name('publisher.campaigns.destroy');
    Route::post('/campaigns/view', [\App\Http\Controllers\CampaignsController::class,'view'])->name('publisher.campaigns.view');

    Route::get('/offers', [\App\Http\Controllers\CampaignsController::class,'offers'])->name('publisher.offers');
    Route::get('/opportunities', [\App\Http\Controllers\CampaignsController::class,'opportunities'])->name('publisher.opportunities');
    Route::post('/opportunities/request', [\App\Http\Controllers\CampaignsController::class,'requestNegotiation'])->name('publisher.opportunities.request');
    Route::get('/reports',[\App\Http\Controllers\ReportsController::class,'reports'])->name('publisher.reports');

    Route::get('/negotiations',[\App\Http\Controllers\NegotiationsController::class,'index'])->name('publisher.negotiations');
    Route::post('/negotiation/messages', [\App\Http\Controllers\NegotiationsController::class,'messages'])->name('publisher.negotiations.messages');

    Route::get('/advert/reports',[\App\Http\Controllers\ReportsController::class,'advertisersReports'])->name('publisher.advertisers.reports');

    Route::post('/leads/upload', [\App\Http\Controllers\CampaignsController::class,'upload'])->name('publisher.leads.upload');
    Route::get('/leads',[\App\Http\Controllers\LeadsController::class,'index'])->name('publisher.leads');
    Route::get('/leads/list',[\App\Http\Controllers\LeadsController::class,'indexList'])->name('publisher.leads.list');
});
Route::get('/error',function (){
    return view('error');
})->name('error');
Route::get('/',function (){
    if (\Illuminate\Support\Facades\Auth::check()){
        return redirect(route(Auth::user()->getAccountName().'.dashboard'));
    }
    return redirect('login');
});
