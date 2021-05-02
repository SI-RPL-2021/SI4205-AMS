<?php

namespace Tests\Unit;

use App\Http\Controllers\AssetController;
use phpDocumentor\Reflection\Types\This;
use PHPUnit\Framework\TestCase;

class phpassetTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
      $asset = new AssetController();
      $total = $asset->tambah(4,4);
      $this->assertEquals(8,$total);
    }
}
