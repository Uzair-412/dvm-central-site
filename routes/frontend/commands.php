<?php

Route::group(['prefix'=>'commands','as'=>'commands.'], function(){
    Route::get('optimize-clear', function () {
        \Artisan::call('optimize:clear');
        dd("Optimize is cleared");
    });
    Route::get('optimize', function () {
        \Artisan::call('optimize');
        dd("Optimized");
    });
    Route::get('route-cache', function () {
        \Artisan::call('route:cache');
        dd("Route is cleared");
    });
    Route::get('route-clear', function () {
        \Artisan::call('route:clear');
        dd("Route is cleared");
    });
    Route::get('view-clear', function () {
        \Artisan::call('view:clear');
        dd("View is cleared");
    });
    Route::get('config-cache', function () {
        \Artisan::call('config:cache');
        dd("Config cache is cleared");
    });
    Route::get('config-clear', function () {
        \Artisan::call('config:clear');
        dd("Config is cleared");
    });
    Route::get('cache-clear', function () {
        \Artisan::call('cache:clear');
        dd("Cache is cleared");
    });

    Route::get('all-clear', function () {
        \Artisan::call('optimize:clear');
        \Artisan::call('optimize');
        
        \Artisan::call('route:cache');
        \Artisan::call('route:clear');
        
        \Artisan::call('view:clear');
        
        \Artisan::call('config:cache');
        \Artisan::call('config:clear');
        
        \Artisan::call('cache:clear');
        dd("All commands run and data cleared");
    });
});