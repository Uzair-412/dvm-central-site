<?php

use App\Http\Controllers\Backend\PushNotificationController;
use App\Http\Controllers\Frontend\{
    HomeController,
    TermsController,
    ShopController,
    CartController,
    CheckoutController,
    AjaxController,
    ContactController,
    LandingController,
    ComparisonController,
    SellerController,
    EventsController,
    WebinarController,
    NavbarController,
    ChatController,
    AttendeeController,
    CoursesCartController,
    EventsFeeController,
    FollowController,
    PetController,
    ResourcesController,
    CoursesManagementController,
    JobsController,
    SpeakersController,
    MarketingPagesController
};

use App\Http\Controllers\Frontend\User\{
    DashboardController,
    AddressesController,
    WishlistController,
    AccountController,
    ChatController as UserChatController,
    CoursesController,
    NotificationController,
    ProfileController,
};
use App\Http\Controllers\VendorController;
// use App\Http\Livewire\Chat;
use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PetsOfTheMonth;
use App\Http\Livewire\PetOfTheMonth;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('/mobile', [HomeController::class, 'mobile'])->name('mobile');

// Route::get('terms', [TermsController::class, 'index'])
// ->name('pages.terms')
// ->breadcrumbs(function (Trail $trail) {
//     $trail->parent('frontend.index')
//         ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
// });

Route::get('/shop', [HomeController::class, 'shop'])
->name('shop')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Shop'), route('frontend.shop'));
});
Route::any('track-your-order', [HomeController::class, 'track_order'])->name('track-your-order');
Route::any('products/{name}', [HomeController::class, 'products']);
// Vendor Route
Route::get('vendors', [VendorController::class, 'index'])->name('vendors');
// Cart Routes
Route::resource('cart', CartController::class);
Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('cart/get-cart', [CartController::class, 'show'])->name('cart.get-cart');
Route::post('cart/recalculate', [CartController::class, 'recalculate'])->name('cart.recalculate');
Route::post('cart/vendor-coupon', [CartController::class, 'vendor_coupon'])->name('cart.vendor_coupon');
Route::post('cart/set-shipping-location', [CartController::class, 'set_shipping_location'])->name('cart.set-shipping-location');
Route::post('cart/set-vendor-shipping-service', [CartController::class, 'set_vendor_shipping_service']);

// Checkout Routes
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'save_shipping'])->name('checkout-save-shipping');
Route::post('checkout/save-order', [CheckoutController::class, 'save_order'])->name('save-order');
Route::get('order/payment-details', [CheckoutController::class, 'payment_details'])->name('payment-details');
Route::post('order/payment-details', [CheckoutController::class, 'process_payment'])->name('process-payment');
Route::get('order/order-placed', [CheckoutController::class, 'order_placed'])->name('order-placed');
//Route::get('order/payment-details/{order}', [CheckoutController::class, 'payment_details'])->name('payment-details');
//Route::post('order/payment-details/{order}', [CheckoutController::class, 'process_payment'])->name('process-payment');
//Route::post('checkout/process-payment', [CheckoutController::class, 'process_payment'])->name('process-payment');

// Contact Routes
Route::get('contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('navbar/desktop', [NavbarController::class, 'DesktopNav']);
Route::post('navbar/mobile', [NavbarController::class, 'MobileNav']);

// Ajax Routes
Route::get('show-search', [AjaxController::class, 'show_search'])->name('show-search');
Route::get('search-vendor-item', [AjaxController::class, 'search_vendor_item'])->name('search-vendor-item');
Route::match('get', 'get-states', [AjaxController::class, 'get_states'])->name('get-states');
Route::get('check-email-account', [AjaxController::class, 'check_email_account'])->name('check-email-account');
Route::post('get-shipping-rates', [AjaxController::class, 'get_shipping_rates'])->name('get-shipping-rates');
Route::post('set-shipping-method', [AjaxController::class, 'set_shipping_method'])->name('set-shipping-method');
Route::get('set-shipping-address', [AjaxController::class, 'set_shipping_address'])->name('set-shipping-address');
Route::post('subscribe', [AjaxController::class, 'subscribe'])->name('subscribe');
Route::get('/ajax/user/login', [AjaxController::class, 'loginUser'])->name('social.ajax.user.login');
Route::post('add-impression', [AjaxController::class, 'add_impression'])->name('add_impression');

// Resources
Route::get( '/resources', [ResourcesController::class, 'index'])->name('resources.index');
Route::get('/resources/news', [ResourcesController::class, 'news'])->name('resources.news');
Route::get('/resources/news/{slug}', [ResourcesController::class, 'single_news'])->name('resources.news.list');
Route::get( '/resources/educational-programs', [ResourcesController::class, 'programs'])->name('resources.programs');
Route::get('/resources/filter-programs', [ResourcesController::class, 'filter_programs'])->name('resources.filter_programs');
Route::get('/resources/online-resources', [ ResourcesController::class, 'online_resources'])->name('resources.online-resources');
Route::get( '/resources/veterinary-associations', [ResourcesController::class, 'associations'])->name('resources.associations');
Route::get('/resources/filter-associations', [ResourcesController::class, 'filter_associations'])->name('resources.filter-associations');
Route::get( '/resources/surgical-procedures', [ResourcesController::class, 'surgical_procedures'])->name('resources.surgical-procedures');
Route::get( '/resources/surgical-procedures/{category?}', [ResourcesController::class, 'surgical_procedures_category'])->name('resources.ft-surgical-procedures-category');
Route::get( '/resources/surgical-procedures/{category?}/{article?}', [ResourcesController::class, 'surgical_procedures_article'])->name('resources.ft-surgical-procedures-article');
Route::get( '/resources/common-diseases/{pet?}', [ResourcesController::class, 'common_diseases'])->name('resources.common-diseases');
Route::get( '/resources/common-diseases/{pet}/{disease?}', [ResourcesController::class, 'pets_diseases'])->name('resources.common-diseases.pet');
// Route::get('/resources/pet-diseases/{slug}', [ResourcesController::class, 'shows_detail'])->name('shows-detail');

// Shop Routes
Route::get('search-results', [ShopController::class, 'listing'])->name('search-results');
Route::get('search-result', [ShopController::class, 'listings'])->name('search-result');
Route::post('save-review', [ShopController::class, 'save_review'])->name('review.store');
Route::post('viewed_products', [ShopController::class, 'viewed_products'])->name('viewed_products');
Route::post('modal_products', [ShopController::class, 'modal_products'])->name('modal_products');

// Home Routes
Route::get('downloads', [HomeController::class, 'downloads'])->name('downloads');
Route::get('trade-shows', [HomeController::class, 'shows'])->name('shows');
Route::get('about-us', [HomeController::class, 'aboutus'])->name('about-us');
// Route::get('pages/videos', [HomeController::class, 'videos'])->name('videos');
Route::get('faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('our-mission', [HomeController::class, 'our_mission'])->name('our-mission');
Route::get('terms-and-conditions', [HomeController::class, 'terms'])->name('terms-and-conditions');
Route::get('privacy-policy', [HomeController::class, 'privacy'])->name('privacy-policy');

Route::get('pages/{page}', [HomeController::class, 'pages'])->name('pages');
Route::get('{vendor}/page/{page}', [HomeController::class, 'vendor_page'])->name('vendor_page');
Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('blog/{post}', [HomeController::class, 'blog_detail'])->name('blog-detail');
Route::get('first-data', [HomeController::class, 'first_data'])->name('first_data_test');
Route::get('static/serve-images', [HomeController::class, 'serve_images'])->name('home.serve-images');
Route::get('speakers', [SpeakersController::class, 'index'])->name('speakers');
Route::get('speaker/{id}', [SpeakersController::class, 'speaker'])->name('speaker-detail');

Route::get('events', [EventsController::class, 'index'])->name('events.index');
Route::get('events/{event}', [EventsController::class, 'show'])->name('events.show');
Route::get('events/{event}/exhibitors', [EventsController::class, 'exhibitors'])->name('events.exhibitors');
Route::get('events/{event}/exhibitors/{id}-{name}', [EventsController::class, 'exhibitors_detail'])->name('events.exhibitors.detail');
Route::get('events/{event}/exhibitors/{id}-{name}/edit', [EventsController::class, 'exhibitors_edit'])->name('events.exhibitors.edit');
Route::get('events/{event}/exhibitors/{id}-{name}/messages', [EventsController::class, 'messages'])->name('events.exhibitors.messages');
Route::get('events/{event}/speakers', [EventsController::class, 'speakers'])->name('events.speakers');
Route::get('events/{event}/speakers/{id}', [EventsController::class, 'speakers_detail'])->name('events.speakers.detail');
Route::get('events/{event}/webinars', [EventsController::class, 'webinars'])->name('events.webinars');
Route::get('events/{event}/webinars/{id}', [EventsController::class, 'webinars_detail'])->name('events.webinars.show');
Route::get('events/{event}/attendees', [AttendeeController::class, 'index'])->name('events.attendees');
Route::get('events/{event}/attendees/{id}', [AttendeeController::class, 'attendeeShow'])->name('events.attendees.show');
Route::get('events/{event}/attendees/{id}/edit', [AttendeeController::class, 'attendeeEdit'])->name('events.attendees.edit');
Route::put('events/{event}/attendees/{id}/edit', [AttendeeController::class, 'attendeeUpdate'])->name('events.attendees.update');
Route::get('events/{event}/attendee/register', [AttendeeController::class, 'attendeeRegister'])->name('events.attendees.register');
Route::post('events/{event}/attendee/register', [AttendeeController::class, 'attendeeRegistration'])->name('events.attendees.registration');
Route::post('chat/send', [ChatController::class, 'send']);
Route::get('events/{event}/job-listings', [EventsController::class, 'job_listings'])->name('events.job-listings');
Route::post('addtocalender', [EventsController::class,'addtocalender']);
Route::get('events/{event}/fee', [EventsFeeController::class,'feeIndex'])->name('event.fee');
Route::post('events/{event}/fee', [EventsFeeController::class,'charge_fee'])->name('event.charge-fee');
// Route::post('chat', [Chat::class, 'sendMessage']);
//Route::post('track-order', [HomeController::class, 'track_order_search'])->name('track-order-search');
Route::get('/speakers/documents/download/{id}', [EventsController::class, 'document_download'])->name('documents.download');
Route::get('/pet-of-the-month', [PetController::class, 'index'])->name('pet_of_the_month');
Route::get('/pet-of-the-month/share-details', [PetController::class, 'apply'])->name('pet.apply');
Route::get('/pet-of-the-month/{id}', [PetController::class, 'detail'])->name('pet_of_the_month.detail');
Route::post('/pet-of-the-month/submit', [PetController::class, 'share'])->name('pet.share');

Route::get('/courses/categories', [CoursesManagementController::class, 'course_categories'])->name('course.category');
Route::get('/courses/categories/{cat_slug}', [CoursesManagementController::class, 'courses_list'])->name('course.list');
Route::get('/courses/categories/{cat_slug}/{course_slug}', [CoursesManagementController::class, 'course_details'])->name('course.details');
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}', [CoursesManagementController::class, 'module_videos'])->name('course.module.videos');

// Take Quiz Routes
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}/quiz', [CoursesManagementController::class, 'module_quiz'])->name('course.module.quiz');
Route::post('/courses/module/quiz/store', [CoursesManagementController::class, 'saveQuiz'])->name('course.module.quiz.store');

Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}/{video_slug}', [CoursesManagementController::class, 'module_video'])->name('course.module.video');

Route::get('/courses/cart', [CoursesCartController::class, 'index'])->name('course.cart.index');
Route::post('/courses/cart', [CoursesCartController::class, 'saveCart'])->name('course.cart.store');
Route::delete('/courses/cart', [CoursesCartController::class, 'delCart'])->name('course.cart.delete');
Route::get('/courses/checkout', [CoursesCartController::class, 'checkout'])->name('course.checkout');
Route::post('/courses/enroll', [CoursesCartController::class, 'enrollCourse'])->name('course.enroll');
Route::post('/courses/checkout/pay', [CoursesCartController::class, 'purchase'])->name('course.checkout.pay');

//Jobs Routes
Route::get('/jobs/listing', [JobsController::class, 'listing'])->name('jobs.listing');
Route::get('/jobs/detail/{slug}', [JobsController::class, 'detail'])->name('jobs.detail');
Route::post('/apply/job/', [JobsController::class, 'apply'])->name('job.apply');
// Landing Routes
Route::group(['prefix'=>'landing','as'=>'landing.'], function(){
    Route::get('request-session', [LandingController::class, 'request_session'])->name('request-session');
    Route::post('request-session', [LandingController::class, 'submit_session'])->name('submit-session');
    Route::get('enter-to-win', [LandingController::class, 'enter_to_win'])->name('enter-to-win');
    Route::post('enter-to-win', [LandingController::class, 'enter_to_win_submit'])->name('enter-to-win-submit');
    Route::get('enter-to-win-vdf', [LandingController::class, 'enter_to_win_vdf'])->name('enter-to-win-vdf');
    Route::post('enter-to-win-vdf', [LandingController::class, 'enter_to_win_vdf_submit'])->name('enter-to-win-vdf-submit');
    Route::get('enter-to-win-mvc-scissors', [LandingController::class, 'enter_to_win_mvc_scissors'])->name('enter-to-win-mvc-scissors');
    Route::post('enter-to-win-mvc-scissors', [LandingController::class, 'enter_to_win_mvc_scissors_submit'])->name('enter-to-win-mvc-scissors-submit');
    Route::get('enter-to-win-mvc-deciduous', [LandingController::class, 'enter_to_win_mvc_deciduous'])->name('enter-to-win-mvc-deciduous');
    Route::post('enter-to-win-mvc-deciduous', [LandingController::class, 'enter_to_win_mvc_deciduous_submit'])->name('enter-to-win-mvc-deciduous-submit');
    Route::get('enter-to-win-vvs-scissors', [LandingController::class, 'enter_to_win_vvs_scissors'])->name('enter-to-win-vvs-scissors');
    Route::post('enter-to-win-vvs-scissors', [LandingController::class, 'enter_to_win_vvs_scissors_submit'])->name('enter-to-win-vvs-scissors-submit');
    Route::get('enter-to-win-vvs-deciduous', [LandingController::class, 'enter_to_win_vvs_deciduous'])->name('enter-to-win-vvs-deciduous');
    Route::post('enter-to-win-vvs-deciduous', [LandingController::class, 'enter_to_win_vvs_deciduous_submit'])->name('enter-to-win-vvs-deciduous-submit');
});

// Comparison Routes
Route::get('compare', [ComparisonController::class, 'comparison'])->name('comparison');
Route::post('comparison-search', [ComparisonController::class, 'comparison_item'])->name('comparison_search');
Route::put('comparison-search', [ComparisonController::class, 'comparison_id'])->name('comparison_id');
Route::resource('seller', SellerController::class)->only(['index', 'store']);

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::post('device-token/notification', [NotificationController::class, 'updateDeviceToken'])->name('device-token.notification');
Route::post('follow/{slug}',[FollowController::class,'follow_vendor'])->name('follow.vendor');

// store latitude and longitude route
Route::post('latitude-longitude/save',[HomeController::class,'save_lat_lng'])->name('latitude-longitude.save');

Route::group(['middleware' => ['auth', 'password.expires']], function () {
    
    Route::group(['as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
        Route::get('dashboard/orders/{order}', [DashboardController::class, 'order_detail'])->name('dashboard.orders.detail');
        Route::get('dashboard/payment-history', [DashboardController::class, 'payment_history'])->name('dashboard.payment-history');
        Route::get('dashboard/payment-history/{id}', [DashboardController::class, 'payment_detail'])->name('dashboard.payment-detail');
        Route::resource('dashboard/addresses', AddressesController::class);
        Route::post('dashboard/addresses/stores', [AddressesController::class, 'stores'])->name('addresses.stores');
        Route::get('dashboard/courses', [CoursesController::class, 'index']);

        Route::get('dashboard/chat-box', [UserChatController::class, 'index'])->name('dashboard.chat-box');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::get('dashboard/profile', [AccountController::class, 'index'])->name('profile');
        
        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('dashboard/wishlist', WishlistController::class);
        Route::post('dashboard/wishlist/store', [WishlistController::class, 'store']);
        Route::delete('dashboard/wishlist/remove-all/{data}', [WishlistController::class, 'remove_all'])->name('remove-all-wishlist');
        Route::get('dashboard/user-level', [DashboardController::class, 'user_level'])->name('user-level');
        Route::get('dashboard/notifications', [DashboardController::class, 'notifications'])->name('notifications');
        Route::get('dashboard/notifications/{id}', [DashboardController::class, 'notification_details'])->name('notification-details');
        Route::post('/upload-documents', [DashboardController::class, 'document_upload'])->name('docs');
        Route::delete('/delete-documents/{id}', [DashboardController::class, 'document_delete'])->name('document.destroy');
        Route::delete('dashboard/wishlist/remove-all-jobs/{data}', [WishlistController::class, 'remove_all_jobs'])->name('remove-all-jobs');
    });
});

Route::get('/buy-direct', [MarketingPagesController::class, 'buy_direct'])->name('buy-direct');
Route::get('/ce-courses', [MarketingPagesController::class, 'ce_courses'])->name('ce-courses');
Route::get('/educational-resources', [MarketingPagesController::class, 'educational_resources'])->name('educational-resources');
Route::get('/free-webinars', [MarketingPagesController::class, 'free_webinars'])->name('free-webinars');
Route::get('/guides', [MarketingPagesController::class, 'guides'])->name('guides');
Route::get('/market-place', [MarketingPagesController::class, 'market_place'])->name('market-place');
Route::get('/personalized-store-pages', [MarketingPagesController::class, 'personalized_store_pages'])->name('personalized-store-pages');
Route::get('/seller-central-portal', [MarketingPagesController::class, 'seller_central_portal'])->name('seller-central-portal');