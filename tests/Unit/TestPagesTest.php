<?php

use Illuminate\Support\Facades\Artisan;
use Mohammedmakhlouf78\Tests\Tests\TestCase;

class TestPagesTest extends TestCase
{
    public function test_command()
    {
        Artisan::call("tests:make-pages");
    }
}
