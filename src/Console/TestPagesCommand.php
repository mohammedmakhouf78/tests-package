<?php

namespace Mohammedmakhlouf78\Tests\Console;

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



        foreach ($routeCollection as $route) {
            // dump($route->methods()[0]);
            // dump($route->uri());
            // dump($route->getName());
            // dump($route->getActionName());
            // dd($route->methods()[0]);

            $methodeName = "test_" . str_replace([".", "-"], "_", $route->getName()) . "_opens";

            if (
                $route->methods()[0] == "GET" &&
                !str_contains($route->getName(), 'debugbar') &&
                !str_contains($route->getName(), 'livewire') &&
                !str_contains($route->getName(), 'ignition') &&
                $route->getName() != "" &&
                !str_contains($route->getName(), 'sanctum')
            ) {
                $testMethodStr = <<<END
                public function $methodeName()
                {
                    \$res = \$this->call('get', route('{$route->getName()}'));

                    \$res->assertOk();
                }
                
                // {{method}}
                END;
                $stub = str_replace("// {{method}}", $testMethodStr, $stub);
            }
        }

        $filePath = base_path("/tests/Feature");

        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }

        File::put($filePath . "/PagesTest.php", $stub);

        $this->info("Done Babhy !!!!");
    }
}
