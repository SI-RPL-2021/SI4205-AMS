<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssetTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *@group asset
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/manajer_inventaris/Input_Asset/index')
                ->assertSee('List Asset');
             //
        });
    }
}