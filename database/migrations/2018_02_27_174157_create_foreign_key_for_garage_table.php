<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyForGarageTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('garage', function(Blueprint $table) {
            $table->foreign('owner_id', 'foreign_key_owner_id')->references('owner_id')->on('garage_owner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('garage', function(Blueprint $table) {
            $table->dropForeign('foreign_key_owner_id');
        });
    }
}
