<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Thread;
use App\Policies\CommentPolicy;
use App\Policies\ThreadPolicy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use App\Http\Livewire\EmptyState;
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

        Carbon::setLocale('id');
    }
}
