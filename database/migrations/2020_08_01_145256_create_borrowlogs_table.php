<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowlogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('people_id');
            $table->bigInteger('itementity_id');
            $table->tinyInteger('status');
            $table->datetime('wanted')->nullable();
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
        Schema::dropIfExists('borrowlogs');
    }
}
