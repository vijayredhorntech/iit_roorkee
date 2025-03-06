<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BookingInstrumentRepository;
use App\Repositories\BookingInstrumentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookingInstrumentRepositoryInterface::class, BookingInstrumentRepository::class);
    }
}

