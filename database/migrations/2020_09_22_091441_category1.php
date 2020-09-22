<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category1', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('prix',$total = 15, $places = 2, $unsigned = false);
            $table->string('type',100);
            $table->string('titre',100);
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category1');
    }
}
