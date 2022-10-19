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
        Schema::create('user_auth_stories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->bigInteger('token_id')->index();
            $table->ipAddress('ip_address')->nullable();
            $table->string('country_iso', 10)->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('user_agent', 500)->nullable();
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
        Schema::dropIfExists('user_auth_stories');
    }
};
