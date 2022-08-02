<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('currency_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('currency_name');
            $table->string('currency_sign');
            $table->string('country_name');
            $table->double('exchange_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('currency_countries');
    }
};
