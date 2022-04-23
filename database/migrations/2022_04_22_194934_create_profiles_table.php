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
        Schema::create('profiles', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('country')->nullable();
            $table->double('rating')->default(0.0);
            $table->string('account_type')->nullable();
            $table->string('job_title')->nullable();
            $table->string('specialization')->nullable();
            $table->longText('bio')->nullable();
            $table->string('video')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};