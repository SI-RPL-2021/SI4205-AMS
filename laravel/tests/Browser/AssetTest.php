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
                ->assertSee('List Asset')
                ->clickLink('Add New Asset')
                ->whenAvailable('#addEmployeeModal', function ($modal) {
                    $modal->type('name', 'sapi')
                        ->type('asset_category', 'sapi')
                        ->type('asset_purchase_price', '1234')
                        ->type('asset_purchase_date', '04/02/2021')
                        ->attach('picture', storage_path('app/public/test_upload.jpg'))
                        ->type('description', 'keterangan ceritanya')
                        ->press('Save');
                })
                ->assertSee('Asset Berhasil Ditambahkan');
             
        });
    }
}
