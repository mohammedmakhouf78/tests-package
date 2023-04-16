<?php

namespace mohammedmakhlouf78\Tests\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class TestPagesCommand extends Command
{
    protected $signature = 'tests:make-pages';

    protected $description = 'Install the BlogPackage';

    public function handle()
    {
        $stub = File::get(__DIR__ . "/stubs/testPages.php.stub");

        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            echo $value->getPath();
        }
    }
}
