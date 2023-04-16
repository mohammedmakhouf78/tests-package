<?php

namespace Mm\Tests;


use Illuminate\Support\ServiceProvider;
use Mm\Tests\Console\TestPagesCommand;

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
