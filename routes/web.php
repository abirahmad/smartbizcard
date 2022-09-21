<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\FrontendBlogController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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
Route::get('/', [FrontendController::class, 'index']);
Route::get('vcf-url',[App\Http\Controllers\VcardGenerateController::class,'vcfFileGenerate'])->name('vcf.generate');
Route::get('smart-vcard/{name}/{slug}',[App\Http\Controllers\VcardGenerateController::class,'vcardGenerate'])->name('vcard.generate');
Route::post('/setSessionController', [App\Http\Controllers\SetSessionController::class, 'store'])->name('set.session');
Route::post('/get-session-share', [App\Http\Controllers\SetSessionController::class, 'setShareRoute'])->name('set.session.share');
Route::get('/plan-details/{id}', [FrontendController::class, 'planDetails'])->name('plan.details');
Route::get('/privacy', [FrontendController::class, 'showPrivacyPolicy'])->name('privacy');
Route::get('/terms-services', [FrontendController::class, 'showTermsAndServices'])->name('terms');
Route::group(['prefix' => 'api'], function () {
    Route::get('social-links',[App\Http\Controllers\Api\ApiController::class, 'getCardSocialLink'])->name('social.links');
    Route::get('delete-links/{id}',[App\Http\Controllers\Api\ApiController::class, 'deleteSocialLinks'])->name('delete.links');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('admin.home');
Route::get('/blog/single-blog/{id}', [FrontendBlogController::class, 'singlePost'])->name('blog.single-blog');
Route::get('/blog', [FrontendBlogController::class, 'blogs'])->name('blog');
Route::get('/blog/search', [SearchController::class, 'search'])->name('blog.search');
Route::post('/blog/comment/{id}', [FrontendBlogController::class, 'blogComment'])->name('blog.comment');
Route::get('/blog/search/{id}', [SearchController::class, 'searchByCategory'])->name('search.category');

Route::middleware(['auth'])->group(function(){
Route::get('vcard',[App\Http\Controllers\VcardController::class,'create'])->name('vcard.create');
Route::post('vcard/store',[App\Http\Controllers\VcardController::class,'store'])->name('vcard.store');
Route::get('qr-code',[App\Http\Controllers\VcardController::class,'qrCodeGenerate'])->name('qrcode');
Route::get('qr-code/settings',[App\Http\Controllers\VcardController::class,'qrCodeSettings'])->name('qr-code.settings');
Route::get('membership',[App\Http\Controllers\MembershipController::class,'index'])->name('membership');
Route::get('transaction',[App\Http\Controllers\TransactionController::class,'index'])->name('transaction');
Route::resource('tutorials',App\Http\Controllers\TutorialController::class);
Route::post('/settings/user/store',[App\Http\Controllers\SettingsController::class, 'userSettingsStore'])->name('settings.user.store');
Route::get('/settings',[App\Http\Controllers\SettingsController::class, 'settings'])->name('settings');
Route::get('/settings/user',[App\Http\Controllers\SettingsController::class, 'userSettings'])->name('settings.user');
Route::get('settings/logo-copyright',[App\Http\Controllers\SettingsController::class, 'logoCopyRight']);
Route::post('settings/update-logo-copyright/{id}',[App\Http\Controllers\SettingsController::class, 'updateLogoCopyRIght']);
Route::get('payment-invoice/{id}',[App\Http\Controllers\PaymentController::class, 'paymentInvoice'])->name('payment-invoice');
Route::get('payment-checkout/{id}',[App\Http\Controllers\PaymentController::class, 'paymentCheckout'])->name('payment-checkout');
Route::get('settings/social-links',[App\Http\Controllers\SettingsController::class, 'socialLinks']);
Route::post('settings/update-social-links',[App\Http\Controllers\SettingsController::class, 'updateSocialLinks'])->name('social.settings');
Route::get('checkout',[App\Http\Controllers\CheckoutController::class, 'stripe'])->name('stripe.index');
Route::post('checkout',[App\Http\Controllers\CheckoutController::class, 'stripePost'])->name('stripe.post');
Route::get('send-email', [App\Http\Controllers\CheckoutController::class, 'sendEmail'])->name('send-mail');
Route::post('qrCode/settings', [App\Http\Controllers\QrCodeController::class, 'store'])->name('qrCode.store');
Route::get('feedback', [App\Http\Controllers\FeedBackController::class, 'index'])->name('feedback.index');
Route::post('feedback', [App\Http\Controllers\FeedBackController::class, 'store'])->name('feedback.store');
Route::get('user/invite', [App\Http\Controllers\InviteController::class, 'index'])->name('invite.index');
Route::post('invite', [App\Http\Controllers\InviteController::class, 'store'])->name('invite.store');
Route::get('barchart/{status}',[App\Http\Controllers\HomeController::class, 'getSelectData']);
Route::get('share-contact/{reference}',[App\Http\Controllers\VcardController::class, 'postShareContact'])->name('share.contact');
Route::get('shared-contacts', [App\Http\Controllers\VcardController::class, 'shareContact'])->name('share-contact.list');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is all of the api routes will be declared
|
*/


Route::group(['prefix'=>'admin','as'=>'admin.'],function(){

    Route::resource('/memberships', App\Http\Controllers\Admin\MembershipController::class);
    Route::resource('/biz-cards', App\Http\Controllers\Admin\BizCardsController::class);
    Route::resource('/blogs', App\Http\Controllers\Admin\BlogController::class);
    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/plans', App\Http\Controllers\Admin\PlanController::class);
    Route::resource('/taxes', App\Http\Controllers\Admin\TaxController::class);
    Route::resource('/custom-settings', App\Http\Controllers\Admin\CustomSettingController::class);
    Route::get('comment/index', [FrontendBlogController::class, 'commentIndex'])->name('comment.index');
    Route::get('comment/delete/{id}', [FrontendBlogController::class, 'commentDelete'])->name('comment.delete');
    Route::get('comment/update/status/{id}', [FrontendBlogController::class, 'commentStatusUpdate'])->name('comment.status.update');
    Route::get('/blogs/update/status/{id}', [App\Http\Controllers\Admin\BlogController::class, 'blogStatusUpdate'])->name('blog.status');
    Route::get('/upgrades',[App\Http\Controllers\Admin\UpgradeController::class, 'index'])->name('upgrades.index');
    Route::post('/plans/update/status/{id}', [App\Http\Controllers\Admin\PlanController::class, 'statusUpdate'])->name('plan.update.status');
    Route::get('/bizCard/update/status/{id}', [App\Http\Controllers\Admin\BizCardsController::class, 'statusUpdate'])->name('bizCard.update.status');
    Route::get('/transaction-list/by-admin', [App\Http\Controllers\Admin\TransactionController::class, 'transactionList'])->name('transaction.list');
    Route::get('/get-chart-data', [App\Http\Controllers\HomeController::class, 'getMonthlyPostData']);
    Route::get('/cron-logs', [App\Http\Controllers\Admin\CronController::class, 'index'])->name('cron.index');
    Route::get('/userlist', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.list');
    Route::get('/userlist/view/{id}', [App\Http\Controllers\Admin\UserController::class, 'view'])->name('user.view');
    Route::post('/userlist/status/{id}', [App\Http\Controllers\Admin\UserController::class, 'statusUpdate'])->name('user.update.status');
    Route::post('/userlist/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/add/tutorials', [App\Http\Controllers\Admin\TutorialController::class, 'index'])->name('add.tutorial');
    Route::post('/add/tutorials', [App\Http\Controllers\Admin\TutorialController::class, 'store'])->name('store.tutorial');
    Route::get('/update/admin/info', [App\Http\Controllers\Admin\AdminController::class, 'adminView'])->name('adminUpdate.view');
    Route::post('/update/admin/username/email/{id}', [App\Http\Controllers\Admin\AdminController::class, 'adminUsernameEmail'])->name('adminUsernameEmail.store');
    Route::post('/update/admin/password/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateAdminPassword'])->name('updateAdminPassword.store');
});
});
