<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::enableForeignKeyConstraints();
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->Constraints()->onUpdate('cascade');
            $table->foreignId('category_id')->Constraints()->onUpdate('cascade');

            $table->char('title', 27);
            $table->string('desc', 303);
            $table->integer('price');
            $table->integer('mobileNo');
            $table->string('adress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
