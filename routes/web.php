<?php

use App\Http\Controllers\Backend\PushNotificationController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\LocaleController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});

/*
 * Cronjob Routes
 */
Route::group(['prefix'=>'cronjob','as'=> 'cronjob.'], function(){
    Route::get('/send-pending-notifications', [PushNotificationController::class, 'send_pending_notifications'])->name('send-pending-notifications');
});

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
    Route::get('/{slug?}', [ShopController::class, 'index'])->name('shop-slug')->where('slug', '.*');
});