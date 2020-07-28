<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItementitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itementities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id');
            $table->string('identifier');
            $table->text('borrowed_by');
            $table->tinyInteger('status'); // 0 nicht vorhanden, 1 vorhanden, 2 verliehen, -1 verloren
            $table->integer('amount');
            $table->bigInteger('storagelocation_id');
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
        Schema::dropIfExists('itementities');
    }
}
