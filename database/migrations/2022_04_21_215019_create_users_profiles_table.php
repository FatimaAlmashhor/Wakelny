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
        Schema::create('users_profiles', function (Blueprint $table) {
            // $table->bigIncrements('profile_id');
            $table->foreignId('user_id')->constrained()
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile');
            $table->string('specialization');
            $table->longText('bio');
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
        Schema::dropIfExists('users_profiles');
    }
};
