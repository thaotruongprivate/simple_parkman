<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarageTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('garage', function(Blueprint $table) {
            $table->increments('garage_id');
            $table->string('name', 50);
            $table->float('hourly_price', 8, 2);
            $table->enum('currency', ['EUR', 'USD', 'GBP']);
            $table->string('contact_email', 100);
            $table->string('point', 50);
            $table->integer('owner_id', false, true);
            $table->timestamps();
            $table->unique('point');
            $table->index('hourly_price');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('garage');
    }
}
