<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restores', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('asset_id');
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('emp_id');
            // $table->unsignedBigInteger('borrowing_id');
            $table->string('asset_code');
            $table->string('return_picture');
            $table->date('return_date');
            $table->text('description')->nullable();
            $table->timestamps();
            // $table->foreign('asset_id')->references('id')->on('assets');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('emp_id')->references('id')->on('employees');
            // $table->foreign('borrowing_id')->references('id')->on('borrowings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restores');
    }
}