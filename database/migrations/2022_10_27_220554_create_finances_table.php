<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
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
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('date')->nullable();
            $table->string('month', 7)->nullable();
            $table->integer('year')->nullable();
            $table->float('money')->default(0);
            $table->float('tax')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Artisan::call('db:seed', [
            'class' => "FinanceSeeder",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
};
