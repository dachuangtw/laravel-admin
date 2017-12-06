<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_location', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('area')->comment('地區');
            $table->string('name')->comment('店名');
            $table->string('adress')->comment('地址');
            $table->string('GPS')->comment('GPS');
            $table->text('content')->nullable()->comment('文字說明');
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
        Schema::dropIfExists('web_location');
    }
}
