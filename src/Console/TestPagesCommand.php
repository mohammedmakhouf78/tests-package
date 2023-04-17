<?php

namespace Mohammedmakhlouf78\Tests\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class TestPagesCommand extends Command
{
    protected $signature = 'tests:make-pages';

    protected $description = 'Install the BlogPackage';

    private $testMethodStr = "";

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

            $this->testMethodStr = "";

            $methodeName = "test_" . str_replace([".", "-"], "_", $route->getName()) . "_opens";

            if (
                $route->methods()[0] == "GET" &&
                !str_contains($route->getName(), 'debugbar') &&
                !str_contains($route->getName(), 'livewire') &&
                !str_contains($route->getName(), 'ignition') &&
                !str_contains($route->getName(), 'facebookRedirect') &&
                !str_contains($route->getName(), 'facebookCallback') &&
                !str_contains($route->getName(), 'userLogout') &&
                $route->getName() != "" &&
                !str_contains($route->getName(), 'sanctum')
            ) {

                $this->testMethodStr .= <<<END
                    public function $methodeName()
                    {
                END;


                $routeModels = $this->getRouteParams($route);


                $this->testMethodStr .= <<<END

                    \$res = \$this->call('get', route('{$route->getName()}', $routeModels));

                    \$res->assertOk();
                }
                
                // {{method}}
                END;
                $stub = str_replace("// {{method}}", $this->testMethodStr, $stub);
            }
        }

        $filePath = base_path("/tests/Feature");

        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }

        File::put($filePath . "/PagesTest.php", $stub);

        $this->info("Done Babhy !!!!");
    }

    private function getRouteParams($route)
    {
        preg_match_all('/{.*}/', $route->uri, $routesParams);

        if (!isset($routesParams[0])) {
            return "";
        }

        $routeModels = "[";
        foreach ($routesParams[0] as $routeParam) {
            $routeParam = trim($routeParam, "{}");
            $model = ucfirst($routeParam);
            $this->testMethodStr .= <<<END

                \$$routeParam = App\\Models\\{$model}::factory()->create();
            END;

            $routeModels .= <<<END
                "$routeParam" => \$$routeParam
            END;
        }
        $routeModels .= "]";

        return $routeModels;
    }
}
