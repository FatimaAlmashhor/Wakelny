<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('total_amount');
            $table->integer('site_amount');
            $table->string('currency');
            $table->string('order_reference');
            $table->unsignedBigInteger('seeker_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('seeker_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('provider_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
