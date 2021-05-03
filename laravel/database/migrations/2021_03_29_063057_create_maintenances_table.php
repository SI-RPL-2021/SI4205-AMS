<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('asset_id');
            $table->string('name');
            $table->string('asset_damage');
            $table->integer('asset_age');
            $table->string('maintenance_bill');
            $table->string('damage_status');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('asset_id')->references('id')->on('assets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
