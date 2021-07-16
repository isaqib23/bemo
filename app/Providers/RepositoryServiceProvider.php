<?php

namespace App\Providers;

use App\Repository\CardRepositoryInterface;
use App\Repository\ColumnRepositoryInterface;
use App\Repository\Eloquent\CardRepository;
use App\Repository\Eloquent\ColumnRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ColumnRepositoryInterface::class, ColumnRepository::class);
        $this->app->bind(CardRepositoryInterface::class, CardRepository::class);
    }
}
