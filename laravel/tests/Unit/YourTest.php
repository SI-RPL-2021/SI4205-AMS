<?php

namespace Tests\Unit;

use App\Http\Controllers\AssetController;
use PHPUnit\Framework\TestCase;

class YourTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    

    public function testMethod() {
        $your = new AssetController();
        $total = $your->hebat(5,6);
        $this->assertEquals(11,$total);
    }
}
