<?php

namespace App\Providers;

use App\Domains\Announcement\Services\AnnouncementService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\GlobalComposer;
use App\Http\Composers\Backend\SidebarComposer;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @param  AnnouncementService  $announcementService
     */
    public function boot(AnnouncementService $announcementService)
    {
        View::composer('*', function ($view) {
            $view->with('logged_in_user', auth()->user());
        });

        View::composer(['frontend.index', 'frontend.layouts.app'], function ($view) use ($announcementService) {
            $view->with('announcements', $announcementService->getForFrontend());
        });

        View::composer(['backend.layouts.app'], function ($view) use ($announcementService) {
            $view->with('announcements', $announcementService->getForBackend());
        });

        // Global
        View::composer(
            // This class binds the $logged_in_user variable to every view
            '*',
            GlobalComposer::class
        );

        // Frontend

        // Backend
        View::composer(
            // This binds items like number of users pending approval when account approval is set to true
            'backend.includes.sidebar',
            SidebarComposer::class
        );
    }
}
