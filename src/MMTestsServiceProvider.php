<?php

namespace mohammedmakhlouf78\Tests;


use Illuminate\Support\ServiceProvider;
use mohammedmakhlouf78\Tests\Console\TestPagesCommand;

class MMTestsServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TestPagesCommand::class
            ]);
        }
    }
}
