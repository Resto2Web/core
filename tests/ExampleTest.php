<?php

namespace Resto2web\Core\Tests;

use Orchestra\Testbench\TestCase;
use Resto2web\Core\CoreServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CoreServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
