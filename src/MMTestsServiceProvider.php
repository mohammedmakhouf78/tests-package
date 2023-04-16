<?php

namespace Mohammedmakhlouf78\Tests;


use Illuminate\Support\ServiceProvider;
use Mohammedmakhlouf78\Tests\Console\TestPagesCommand;

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

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
