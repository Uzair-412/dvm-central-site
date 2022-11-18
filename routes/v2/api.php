<?php

//Small NavbarController
use App\Http\Controllers\ApisV2\SpeakersController;
use App\Http\Controllers\ApisV2\PetOfTheMonthController;
use App\Http\Controllers\ApisV2\CoursesController;
use App\Http\Controllers\ApisV2\WebinarController;
use App\Http\Controllers\ApisV2\JobsController;
use App\Http\Controllers\ApisV2\LoginController;
use App\Http\Controllers\ApisV2\VerificationController;
use App\Http\Controllers\ApisV2\ForgotPasswordController;
use App\Http\Controllers\ApisV2\RegisterController;
use App\Http\Controllers\ApisV2\Resources\CommonDiseaseController;
use App\Http\Controllers\ApisV2\ContactController;
use App\Http\Controllers\ApisV2\NewsLetterController;

//Resources Controllers
use App\Http\Controllers\ApisV2\Resources\NewsFeedController;
use App\Http\Controllers\ApisV2\Resources\EducationalProgramsController;
use App\Http\Controllers\ApisV2\Resources\AssociationsController;
use App\Http\Controllers\ApisV2\Resources\SurgicalProceduresController;
use App\Http\Controllers\ApisV2\Resources\BlogsController;

use App\Http\Controllers\ApisV2\VendorController;
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

/*
|--------------------------------------------------------------------------
| VetAndTech API Routes
|--------------------------------------------------------------------------
*/

Route::post('news-letter-signup', [NewsLetterController::class, 'signUpSubscription']);

//Speakers APIs
Route::get('speakers', [SpeakersController::class, 'index']);
Route::get('/speakers/{slug}', [SpeakersController::class, 'speakerDetails']);
Route::post('/search-speakers', [SpeakersController::class, 'searchSpeakers']);
Route::post('/speakers/filter-job-type', [SpeakersController::class, 'filterSpeakers']);

// Pet of the month APIs
Route::get('/pet-of-the-month', [PetOfTheMonthController::class, 'index']);
Route::get('/pet-of-the-month/{id}', [PetOfTheMonthController::class, 'detail']);
Route::post('/pet-of-the-month/submit', [PetOfTheMonthController::class, 'share']);

//Courses APIs
Route::get('courses/categories', [CoursesController::class, 'courseCategories']);
Route::get('/courses/categories/{cat_slug}', [CoursesController::class, 'coursesList']);
Route::get('/course/{course_slug}/enrollment', [CoursesController::class, 'courseEnrollment']);
Route::get('/courses/filter-types/{type_id}/{cat_id}', [CoursesController::class, 'filterTypes']);
Route::get('/courses/sort-by/{sortType}/{cat_id}', [CoursesController::class, 'sortBy']);
Route::get('/courses/categories/{cat_slug}/{course_slug}', [CoursesController::class, 'courseDetails']);
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}', [CoursesController::class, 'moduleVideos']);
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}/quiz', [CoursesController::class, 'moduleQuiz']);
Route::get('/courses/categories/{cat_slug}/{course_slug}/{module_slug}/{video_slug}', [CoursesController::class, 'video']);
Route::post('/courses/module/quiz/store', [CoursesController::class, 'saveQuiz']);

//Webinars APIs
Route::get('webinars', [WebinarController::class,'index']);
Route::post('webinar-register', [WebinarController::class,'register']);
Route::post('user-registered-webinars', [WebinarController::class, 'user_registered_webinars']);


// Vet Resources API routes
Route::prefix('resources')->group(function () {
    // Route::get('/', [NewsFeedController::class, 'index']);
    
    // News API routes
    Route::get('/news', [NewsFeedController::class, 'news']);
    Route::get('/news/{slug}', [NewsFeedController::class, 'single_news']);
    
    // Educational Programs API routes
    Route::get( '/programs', [EducationalProgramsController::class, 'programs']);
    Route::post('/filter-programs', [EducationalProgramsController::class, 'filterPrograms']);
    
    // Associations API routes
    Route::get( '/associations', [AssociationsController::class, 'associations']);
    Route::post('/filter-associations', [AssociationsController::class, 'filterAssociations']);
    
    // Surgical Procedures API routes
    Route::get( '/surgical-procedures', [SurgicalProceduresController::class, 'surgicalProcedures']);
    Route::get( '/surgical-procedures/{category?}', [SurgicalProceduresController::class, 'surgicalProceduresCategory']);
    Route::get( '/surgical-procedures/{category?}/{article?}', [SurgicalProceduresController::class, 'surgicalProceduresArticle']);

    //Blogs API routes
    Route::get('/blogs', [BlogsController::class, 'blogs']);
    Route::get('/blog/{slug}', [BlogsController::class, 'blog']);
    
    //Common Disease API routes
    Route::get( '/animals', [CommonDiseaseController::class, 'listOfAnaimals']);
    Route::get( '/common-diseases/{pet?}', [CommonDiseaseController::class, 'commonDiseases']);
    Route::get( '/common-diseases/{pet}/{disease?}', [CommonDiseaseController::class, 'petsDiseases']);

});

//Jobs APIs
Route::get('jobs', [JobsController::class, 'listing']);
Route::get('jobs/{job_slug}', [JobsController::class, 'jobDetail']);
Route::post('/apply/job', [JobsController::class, 'apply']);
Route::post('/jobs/filter', [JobsController::class, 'filterJobs']);
Route::post('/search-jobs', [JobsController::class, 'searchJobs']);
Route::get('jobs/add-to-wishlist/{jobId}/{userId}', [JobsController::class, 'addToWishlist']);

// Login related APIs
Route::post('login', [LoginController::class,'login']);
Route::post('social-login', [LoginController::class, 'socialLogin']);
Route::post('social-login/save-password', [LoginController::class, 'savePassword']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('reset-password', [ForgotPasswordController::class, 'sendResetLinkEmailJson']);
Route::post('email/resend', [VerificationController::class, 'resend']);

// Contact page Api routes
Route::get('contact', [ContactController::class, 'index']);
Route::post('contact/send', [ContactController::class, 'send']);




/*
|--------------------------------------------------------------------------
| DVM Central API Routes
|--------------------------------------------------------------------------
*/
Route::get('vendors', [VendorController::class, 'index']);
Route::get('search-vendors/{search}', [VendorController::class, 'searchVendors']);