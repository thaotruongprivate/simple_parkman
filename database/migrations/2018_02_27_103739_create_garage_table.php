<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use simple_parkman\Garage;

class CreateGarageTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('garage', function(Blueprint $table) {
            $table->string('garage_id', 11);
            $table->string('name', 50);
            $table->float('hourly_price', 4, 2);
            $table->enum('currency', ['EUR', 'USD', 'GBP']);
            $table->string('contact_email', 100);
            $table->string('point', 50);
            $table->enum('country', [
                'Finland', 'United Kingdom', 'United States of America'
            ]);
            $table->string('owner_id', 9);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary('garage_id');
            $table->unique('point');
            $table->index('country');
            $table->index('hourly_price');
            $table->index('name');
            $table->index('owner_id');
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
