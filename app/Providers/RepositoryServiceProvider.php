<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BookingInstrumentRepository;
use App\Repositories\BookingInstrumentRepositoryInterface;
use App\Contracts\PIRepositoryInterface;
use App\Repositories\PIRepository;
use App\Contracts\InstrumentRepositoryInterface;
use App\Repositories\InstrumentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookingInstrumentRepositoryInterface::class, BookingInstrumentRepository::class);
        $this->app->bind(PIRepositoryInterface::class, PIRepository::class);
        $this->app->bind(InstrumentRepositoryInterface::class, InstrumentRepository::class);
     
    }
}

