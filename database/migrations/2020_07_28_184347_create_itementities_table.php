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
            $table->text('borrowed_by')->nullable();
            $table->tinyInteger('status')->default(0); // 0 nicht vorhanden, 1 vorhanden, 2 verliehen, -1 verloren
            $table->tinyInteger('consumable');
            $table->integer('amount')->nullable();
            $table->bigInteger('storagelocation_id');
            $table->bigInteger('image_id')->nullable();
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
