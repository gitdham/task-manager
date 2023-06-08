<?php

namespace App\Providers;

use App\Services\Impl\TaskServiceImpl;
use App\Services\TaskService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider implements DeferrableProvider {
    public array $singletons = [
        TaskService::class => TaskServiceImpl::class
    ];

    public function provides(): array {
        return [TaskService::class];
    }

    /**
     * Register services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {
        //
    }
}
