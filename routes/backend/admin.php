<?php

use App\Http\Controllers\Backend\{
    DashboardController,
    OrdersController,
    InvoicesController,
    CouponsController,
    CategoryController,
    ProductController,
    AjaxController,
    ReviewController,
    CustomerController,
    AddressController,
    GroupController,
    PagesController,
    BannersController,
    FlyersController,
    ShowsController,
    VideosController,
    FaqsController,
    BlogCategoriesController,
    BlogPostsController,
    MicroSitesController,
    SettingsController,
    ManageRedirectsController,
    BusinessTypeController,
    FieldSetsController,
    FieldsController,
    VendorsController,
    PackagesController,
    EventsController,
    SpeakersController,
    WebinarController,
    AttendeesController,
    HelpCentreController,
    NewsCategoriesController,
    NewsPostController,
    PetController,
    ProgramController,
    SurgicalProceduresCategoriesController,
    SurgicalProceduresArticlesController,
    AnimalPetsController,
    CategoryBlockController,
    PetDiseasesController,
    ChatsController,
    NotificationsController,
    PushNotificationController,
    LevelsController,
    UserDocumentsController,
};

use App\Http\Controllers\Backend\Manage_Courses\{
    CourseModuleQuizesController,
    CourseModuleQuizOptionsController,
    CourseModulesController,
    CourseModuleVideosController,
    CoursesCategoryController,
    CoursesController,
    CoursesTypeController
  
};

use App\Http\Controllers\Backend\Manage_Jobs\{
    JobsCategoryController,
    JobsWorkingTimeController,
    JobsTypeController,
    EducationLevelController,
    SalaryTypeController
};

use App\Http\Controllers\Backend\Programs\AccreditationStatusController;
use App\Http\Controllers\Backend\Programs\DirectorController;
use App\Http\Controllers\Backend\Programs\InstituteController;
use App\Http\Controllers\Backend\Programs\TypesController;
use App\Http\Controllers\Backend\Programs\AssociationController;
use PHPUnit\TextUI\Help;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.' \\
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::resource('orders', OrdersController::class);
Route::post('orders/save-status', [OrdersController::class, 'save_status'])->name('orders.save-status');
Route::post('orders/send-followup-email', [OrdersController::class ,'send_followup_email'])->name('orders.send-followup-email');
Route::resource('invoices',InvoicesController::class);
Route::resource('coupons',CouponsController::class);
Route::resource('category',CategoryController::class);
Route::resource('category-blocks',CategoryBlockController::class);
Route::post('category-blocks/store-categories',[CategoryBlockController::class, 'store_categories'])->name('category-blocks.store-categories');
Route::resource('product',ProductController::class);
Route::post('check-sku-variation', [AjaxController::class, 'check_sku_variation'])->name('product.check-sku-variation');
Route::get('delete-product-variation', [AjaxController::class, 'delete_variation'])->name('product.delete.variation');
Route::get('edit-product-variation', [AjaxController::class, 'edit_variation'])->name('product.edit.variation');
Route::get('set-position', [AjaxController::class, 'set_position'])->name('product.set-position');
Route::get('pets', [PetController::class, 'index'])->name('pets');
Route::post( 'pets/approve', [PetController::class, 'approve'])->name('pets.approve');
Route::post( 'pets/disapprove', [PetController::class, 'disApprove'])->name('pets.disapprove');
Route::get('pets/view/{id}', [PetController::class, 'view'])->name('pets.view');
Route::get('pets/edit/{id}', [PetController::class, 'edit'])->name('pets.edit');
Route::post('pets/update', [PetController::class, 'update'])->name('pets.update');

Route::group(['prefix'=>'product','as'=>'product.'], function(){
    Route::get('{product}/edit-variations', [ProductController::class, 'edit_variations'])->name('edit.variations');
    Route::get('{product}/edit-details', [ProductController::class, 'edit_details'])->name('edit.details');
    Route::get('{product}/edit-files', [ProductController::class, 'edit_files'])->name('edit.files');
    Route::patch('{product}/update-details', [ProductController::class, 'update_details'])->name('update.details');
    Route::patch('{product}/upload-files', [ProductController::class, 'upload_files'])->name('upload.files');
    Route::patch('{product}/update-files', [ProductController::class, 'update_files'])->name('update.files');
    Route::post('{product}/upload-variations', [ProductController::class, 'upload_variations'])->name('upload.variations');
    Route::get('{product}/edit-set-items', [ProductController::class, 'edit_set_items'])->name('edit.set-items');
});

// Ajax Routes
Route::post('add-set-item', [AjaxController::class, 'add_set_item'])->name('product.add-set-item');
Route::post('update-set-item', [AjaxController::class, 'update_set_item'])->name('product.update-set-item');
Route::post('delete-product-set-item', [AjaxController::class, 'delete_set_item'])->name('product.delete-set-item');
Route::get('get-qr-code', [AjaxController::class, 'get_qr_code'])->name('get-qr-code');
Route::get('set-default-image', [AjaxController::class, 'set_default_image'])->name('set-default-image');
Route::get('delete-product-file', [AjaxController::class, 'delete_product_file'])->name('delete-product-file');
Route::get('delete-speaker-file', [AjaxController::class, 'delete_speaker_file'])->name('delete-speaker-file');
Route::match(['post','patch'], 'slug-checker', [AjaxController::class, 'slugs'])->name('slug-checker');
Route::post('/get-categories', [AjaxController::class, 'get_categories']);
Route::get('get-states', [AjaxController::class, 'get_states'])->name('get-states');


Route::resource('reviews', ReviewController::class,);
Route::resource('customers', CustomerController::class);
Route::resource('customers.addresses', AddressController::class);
Route::resource('customers.vendor', VendorsController::class);
Route::resource('vendors', VendorsController::class);
Route::resource('groups', GroupController::class);
Route::resource('banners', BannersController::class);
Route::resource('flyers', FlyersController::class);
Route::resource('shows', ShowsController::class);
Route::resource('events', EventsController::class);
Route::resource('videos', VideosController::class);
Route::resource('faqs', FaqsController::class);
Route::resource('blog-categories', BlogCategoriesController::class);
Route::resource('blog-posts', BlogPostsController::class);
Route::resource('micro-sites', MicroSitesController::class);
Route::get('micro-sites/{site}/products', [MicroSitesController::class, 'products'])->name('micro-sites.products');
Route::resource('settings', SettingsController::class);
Route::resource('redirects', ManageRedirectsController::class);
Route::resource('business-type', BusinessTypeController::class);
Route::resource('field-sets', FieldSetsController::class);
Route::resource('fields', FieldsController::class);
Route::resource('speakers', SpeakersController::class);
Route::get('speakers/{id}/file-manager', [SpeakersController::class, 'file_manager'])->name('speaker.file');
Route::post('speakers/{id}/file-manager', [SpeakersController::class, 'file_upload'])->name('speaker.file.upload');
Route::get('speakers/{speaker_id}/file-manager/{file_id}/edit', [SpeakersController::class, 'file_upload_edit'])->name('speaker.file.upload.edit');
Route::put('speakers/{speaker_id}/file-manager/{file_id}/edit', [SpeakersController::class, 'file_upload_update'])->name('speaker.file.upload.update');
Route::resource('attendees', AttendeesController::class);
Route::resource('packages', PackagesController::class);
Route::resource('pages', PagesController::class);
Route::get('file-manager', [PagesController::class, 'file_manager'])->name('file-manager');
Route::resource('webinars', WebinarController::class);
Route::resource('help', HelpCentreController::class);
Route::resource('news-categories', NewsCategoriesController::class);
Route::resource('news-posts', NewsPostController::class);

Route::resource('surgical-procedures-categories', SurgicalProceduresCategoriesController::class);
Route::resource('surgical-procedures-articles', SurgicalProceduresArticlesController::class);

Route::resource('animal-pets', AnimalPetsController::class);
Route::resource('common-diseases',PetDiseasesController ::class);
Route::get('vendors-chat', [ChatsController::class, 'vendors_chat'])->name('vendors-chat');
Route::get('vendors/add-details/{vendor_id}', [VendorsController::class, 'add_details'])->name('vendors.add-details');
Route::post('vendors/add-details/{vendor_id}', [VendorsController::class, 'update_details'])->name('vendors.update_details');
Route::delete('vendors/delete-details/{question_id}', [VendorsController::class, 'delete_details'])->name('vendors.delete_details');

// Courses Management All Routes
Route::group(['prefix'=>'manage-courses','as'=> 'manage-courses.'], function(){
    Route::resource('category',CoursesCategoryController::class);
    Route::resource('types', CoursesTypeController::class);
    Route::resource('courses', CoursesController::class);

    // Course Routes
    Route::get('courses/{slug}/modules', [CourseModulesController::class, 'index'])->name('courses.modules');
    Route::get('courses/{slug}/module/create', [CourseModulesController::class, 'create'])->name('courses.module.create');
    Route::get('course/{slug}/module/edit/{id}', [CourseModulesController::class, 'edit'])->name('course.module.edit');
    Route::post('course/module/store', [CourseModulesController::class, 'store'])->name('course.module.store');
    Route::patch('course/module/update/{id}', [CourseModulesController::class, 'update'])->name('course.module.update');
    Route::DELETE('course/module/destroy/{id}', [CourseModulesController::class, 'destroy'])->name('course.module.destroy');

    // Course Module Quizes Routes
    Route::get('course/{slug}/module/{module_slug}/quizes', [CourseModuleQuizesController::class, 'index'])->name('course.module.quizes');
    Route::get('course/{slug}/module/{module_slug}/quizes/{quiz}/edit', [CourseModuleQuizesController::class, 'edit'])->name('course.module.quizes.edit');
    Route::post('course/module/quiz/store', [CourseModuleQuizesController::class, 'store'])->name('course.module.quiz.store');
    Route::patch('course/module/quiz/update/{id}', [CourseModuleQuizesController::class, 'update'])->name('course.module.quiz.update');
    Route::DELETE('course/module/quiz/destroy/{id}', [CourseModuleQuizesController::class, 'destroy'])->name('course.module.quiz.destroy');

    // Course Quiz Options Routes
    Route::get('course/{slug}/module/{module_slug}/quiz/{quiz}/options', [CourseModuleQuizOptionsController::class, 'index'])->name('course.module.quiz.options');
    Route::get('course/{slug}/module/{module_slug}/quiz/{quiz}/option/{option}/edit', [CourseModuleQuizOptionsController::class, 'edit'])->name('course.module.quiz.options.edit');
    Route::post('course/module/quiz/option/store', [CourseModuleQuizOptionsController::class, 'store'])->name('course.module.quiz.options.store');
    Route::patch('course/module/quiz/option/update/{id}', [CourseModuleQuizOptionsController::class, 'update'])->name('course.module.quiz.options.update');
    Route::DELETE('course/module/quiz/option/destroy/{id}', [CourseModuleQuizOptionsController::class, 'destroy'])->name('course.module.quiz.options.destroy');

    // Course Video Routes
    Route::get('course/module/{slug}/videos', [CourseModuleVideosController::class, 'index'])->name('courses.modules.videos');
    Route::get('course/module/{slug}/video/create', [CourseModuleVideosController::class, 'create'])->name('courses.module.video.create');
    Route::get('course/module/{slug}/video/edit/{id}', [CourseModuleVideosController::class, 'edit'])->name('course.module.video.edit');
    Route::post('course/module/video/store', [CourseModuleVideosController::class, 'store'])->name('course.module.video.store');
    Route::PATCH('course/module/video/update/{id}', [CourseModuleVideosController::class, 'update'])->name('course.module.video.update');
    Route::DELETE('course/module/video/destroy/{id}', [CourseModuleVideosController::class, 'destroy'])->name('course.module.video.destroy');
});
    //Jobs Route
Route::group(['prefix'=>'manage-jobs','as'=> 'manage-jobs.'], function(){
    Route::resource('category',JobsCategoryController::class);
    Route::resource('working-time',JobsWorkingTimeController::class);
    Route::resource('types',JobsTypeController::class);
    Route::resource('education-level',EducationLevelController::class);
    Route::resource('salary-type',SalaryTypeController::class);
    });
    
Route::group(['prefix'=>'programs','as'=> 'programs.'], function(){
    Route::resource('/program', ProgramController::class);
    Route::resource('types', TypesController::class);
    Route::resource('directors', DirectorController::class);
    Route::resource('institutes', InstituteController::class);
    Route::resource('accreditation-status', AccreditationStatusController::class);
    Route::resource('associations', AssociationController::class);
});

Route::group(['prefix'=>'notifications','as'=> 'notifications.'], function(){
    Route::get('/push-notifications', [PushNotificationController::class, 'index'])->name('push-notifications');
});

Route::resource('/notifications', NotificationsController::class);

Route::resource('levels', LevelsController::class);
Route::get('user-documents/{id}',[UserDocumentsController::class, 'user_documents'])->name('user-documents');
Route::get('/user-level/approve/{user_id}/{level}',[UserDocumentsController::class, 'level_upgrade'])->name('user-level-upgrade');
Route::get('/user-level/decline/{id}/',[UserDocumentsController::class, 'decline'])->name('user-level-decline');