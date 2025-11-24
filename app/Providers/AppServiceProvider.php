<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Thread;
use Livewire\Livewire;
use App\Models\Comment;
use App\Policies\ThreadPolicy;
use App\Policies\CommentPolicy;
use App\Http\Livewire\EmptyState;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Thread::class => ThreadPolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Thread::class, ThreadPolicy::class);
        Gate::policy(Comment::class, CommentPolicy::class);

        // Laravel Pulse Dashboard hanya bisa diakses oleh admin
        Gate::define('viewPulse', function (User $user) {
            return $user->hasRole('admin');
        });
        
        // Laravel Telescope juga hanya bisa diakses oleh admin
        Gate::define('viewTelescope', function ($user) {
            return $user->hasRole('admin');
        });

        Carbon::setLocale('id');

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('site_infos')) {
                \Illuminate\Support\Facades\View::share('siteInfo', \App\Models\SiteInfo::first());
            }
        } catch (\Exception $e) {
            //
        }
    }
}
