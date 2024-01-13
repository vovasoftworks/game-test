<?php

namespace App\Providers;

use App\Repositories\Read\Members\MembersReadRepository;
use App\Repositories\Read\Members\MembersReadRepositoryInterface;
use App\Repositories\Read\Top\TopResultsReadRepository;
use App\Repositories\Read\Top\TopResultsReadRepositoryInterface;
use App\Repositories\Write\ResultWriteRepository;
use App\Repositories\Write\ResultWriteRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ResultWriteRepositoryInterface::class,
            ResultWriteRepository::class
        );
        $this->app->bind(
            MembersReadRepositoryInterface::class,
            MembersReadRepository::class
        );
        $this->app->bind(
            TopResultsReadRepositoryInterface::class,
            TopResultsReadRepository::class
        );
    }
}
