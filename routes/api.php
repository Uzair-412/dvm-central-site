<?php

use App\Domains\Auth\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\apis\CartController;
use App\Http\Controllers\apis\ContactController;
use App\Http\Controllers\apis\Customer\AddressController;
use App\Http\Controllers\apis\Customer\ChatBoxController;
use App\Http\Controllers\apis\Customer\DashboardController;
use App\Http\Controllers\apis\Customer\PaymentController;
use App\Http\Controllers\apis\Customer\ProfileController;
use App\Http\Controllers\apis\Customer\WishlistController;
use App\Http\Controllers\apis\Customer\FollowController;
use App\Http\Controllers\apis\HomeController;
use App\Http\Controllers\apis\LoginController;
use App\Http\Controllers\apis\RegisterController;
use App\Http\Controllers\apis\PetOfTheMonthController;
use App\Http\Controllers\apis\ResourcesController;
use App\Http\Controllers\apis\ShopController;
use App\Http\Controllers\apis\CoursesController;
use App\Http\Controllers\apis\JobsController;
use App\Http\Controllers\apis\Customer\MobileUserSettingsController;
use App\Http\Controllers\apis\VendorController;
use App\Http\Controllers\apis\WebinarController;
use App\Http\Controllers\apis\EventsController;
use App\Http\Controllers\apis\VerificationController;
use App\Http\Controllers\apis\NotificationsController;
use App\Http\Controllers\apis\SpeakersController;
use App\Http\Controllers\apis\ProductRelatedChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    // return $request->user();
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('orders/{customer_id}', [DashboardController::class, 'orders']);
        Route::get('order/{order}', [DashboardController::class, 'order_detail']);
        Route::get('payment-history', [DashboardController::class, 'payment_history']);
        Route::get('payment-history/{id}', [DashboardController::class, 'payment_detail']);
        Route::get('profile/{customer_id}', [ProfileController::class, 'getProfile']);
        Route::post('profile/update', [ProfileController::class, 'update']);
        Route::post('profile/change-password', [ProfileController::class, 'update_password']);

        Route::get('wishlist/{customer_id}', [WishlistController::class, 'index']);
        Route::post('wishlist/store', [WishlistController::class, 'store']);
        Route::post('wishlist/delete/{id}/{customer_id}', [WishlistController::class, 'destroy']);

        Route::get('chat-box', [ChatBoxController::class, 'index']);
        Route::get('chat-box/user/{user_id}', [ChatBoxController::class, 'user_chat']);
        Route::post('chat-box/send-message', [ChatBoxController::class, 'store']);

        Route::get('addresses/{customer_id}', [AddressController::class,'index']);
        Route::post('address', [AddressController::class,'store']);
        Route::post('address/{address}', [AddressController::class,'update']);
        Route::delete('address/{address}', [AddressController::class,'delete']);
    });

    Route::post('payment', [PaymentController::class,'index']);
    Route::post('mobile-user-settings',[MobileUserSettingsController::class,'index']);
    Route::post('mobile-user-settings/update_settings',[MobileUserSettingsController::class,'update_settings']);
    Route::post('follow', [FollowController::class, 'follow_vendor'])->name('follow.vendor');
    Route::get('following', [FollowController::class, 'following_list'])->name('following.list');              
});


Route::post('login', [LoginController::class,'login']);
Route::post('social-login', [LoginController::class, 'social_login']);
Route::post('social-login/save-password', [LoginController::class, 'save_password']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('reset-password', [ForgotPasswordController::class, 'sendResetLinkEmailJson'])->name('reset.password');
Route::post('email/resend', [VerificationController::class, 'resend']);

Route::get('/countries', [HomeController::class, 'countries']);
Route::post('/states-by-country', [HomeController::class, 'states_by_country']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/shop-by-department', [HomeController::class, 'shop_by_department']);
Route::get('/web-shop-by-department', [HomeController::class, 'web_shop_by_department']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('trade-shows', [HomeController::class, 'shows'])->name('shows');
Route::post('track-your-order', [HomeController::class, 'track_order']);
Route::any('products/{name}', [HomeController::class, 'products']);
Route::get('pages/faqs', [HomeController::class, 'faqs']);
Route::get('pages/{page}', [HomeController::class, 'pages']);
Route::get('contact', [ContactController::class, 'index']);
Route::post('contact/send', [ContactController::class, 'send']);
Route::post('seller', [HomeController::class, 'seller_store']);
Route::post('seller', [HomeController::class, 'seller_store']);
Route::get('vendors', [VendorController::class, 'index']);

// Blogs Listing APIs
Route::get('blogs', [HomeController::class, 'blogs']);
Route::get('blog/{slug}', [HomeController::class, 'blog']);

// Pet of the month APIs
Route::get('/pet-of-the-months', [PetOfTheMonthController::class, 'index']);
Route::get('/pet-of-the-month/{id}', [PetOfTheMonthController::class, 'detail']);
Route::post('/pet-of-the-month/submit', [PetOfTheMonthController::class, 'share']);

// Ver resources APIs
Route::prefix('resources')->group(function () {
    Route::get('/', [ResourcesController::class, 'index']);
    // Ver resources news APIs
    Route::get('/news', [ResourcesController::class, 'news']);
    Route::get('/news/{slug}', [ResourcesController::class, 'single_news']);
    // Ver resources programs APIs
    Route::get( '/programs', [ResourcesController::class, 'programs']);
    Route::post('/filter-programs', [ResourcesController::class, 'filter_programs']);
    // Ver resources associations APIs
    Route::get( '/associations', [ResourcesController::class, 'associations']);
    Route::post('/filter-associations', [ResourcesController::class, 'filter_associations']);
    // Ver resources surgical procedures APIs
    Route::get( '/surgical-procedures', [ResourcesController::class, 'surgical_procedures']);
    Route::get( '/surgical-procedures/{category?}', [ResourcesController::class, 'surgical_procedures_category']);
    Route::get( '/surgical-procedures/{category?}/{article?}', [ResourcesController::class, 'surgical_procedures_article']);

    Route::get( '/web-common-diseases', [ResourcesController::class, 'listOfAnaimals']);
    Route::get( '/web-common-diseases/{pet?}', [ResourcesController::class, 'web_common_diseases']);

    
    Route::get( '/common-diseases/{pet?}', [ResourcesController::class, 'common_diseases']);
    Route::get( '/common-diseases/{pet}/{disease?}', [ResourcesController::class, 'pets_diseases']);
});
Route::post('coupon', [CartController::class, 'vendor_coupon']);
Route::post('shipping-location', [CartController::class, 'shipping_location']);
Route::post('calculate-shipping', [CartController::class, 'calculate_shipping']);
// Route::post('vendor-shipping-service', [CartController::class, 'set_vendor_shipping_service']);

Route::get('webinars', [WebinarController::class,'index'])->name('webinars');
Route::post('webinar-register', [WebinarController::class,'register'])->name('webinar-register');
Route::post('user-registered-webinars', [WebinarController::class, 'user_registered_webinars'])->name('user-registered-webinars');

//Speakers APIs
Route::get('speakers', [SpeakersController::class, 'index']);
Route::get('speaker/{id}', [SpeakersController::class, 'speaker_details']);
Route::get('/web-speakers/{slug}', [SpeakersController::class, 'web_speaker_details']);
Route::get('/web-search-speakers/{search}', [SpeakersController::class, 'web_search_speakers']);
Route::post('/web-speakers/filter-job-type', [SpeakersController::class, 'filter_speakers']);

//Courses APIs
Route::get('courses/categories', [CoursesController::class, 'courseCategories']);
Route::get('/courses/categories/{cat_slug}', [CoursesController::class, 'coursesList'])->name('course.list');
Route::get('/courses/filter-types/{type_id}/{cat_id}', [CoursesController::class, 'filterTypes'])->name('course.filter-types');
Route::get('/courses/sort-by/{sortType}/{cat_id}', [CoursesController::class, 'sortBy'])->name('course.sort-by');
Route::get('/courses/categories/{cat_slug}/{course_slug}', [CoursesController::class, 'courseDetails'])->name('course.details');
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}', [CoursesController::class, 'moduleVideos'])->name('course.module.videos');
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}/quiz', [CoursesController::class, 'moduleQuiz'])->name('course.module.quiz');
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}/{video_slug}', [CoursesController::class, 'video'])->name('course.module.video');
Route::post('/courses/module/quiz/store', [CoursesController::class, 'saveQuiz'])->name('course.module.quiz.store');

// End Course APIs

//Jobs API
Route::get('jobs', [JobsController::class, 'listing']);
Route::get('jobs/{job_slug}', [JobsController::class, 'jobDetail']);

//End Jobs API

// Event APIs
Route::get('events', [EventsController::class, 'index'])->name('events.index');
Route::post('events/{id}', [EventsController::class, 'details'])->name('event.details');

Route::post('save-order', [ApiController::class, 'save_order'])->name('save-order');
Route::post('payment-intent', [ApiController::class, 'payment_intent'])->name('payment-intent');

Route::post('create-notifications', [NotificationsController::class, 'create']);

Route::post('product-question', [ProductRelatedChatController::class, 'product_question']);
Route::post('product-answer', [ProductRelatedChatController::class, 'product_answer']);
Route::get('search-product-question/{search?}', [ProductRelatedChatController::class, 'search']);

Route::get('/{slug?}', [ShopController::class, 'index'])->name('shop-slug')->where('slug', '.*');