<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_contact_us', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('name')->comment('姓名');
            $table->string('email')->comment('電子信箱');
            $table->string('phone')->nullable()->comment('電話');
            $table->text('content')->nullable()->comment('留言');
            $table->string('client_ip')->comment('ip');
            $table->text('client_agent')->comment('使用裝置');
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
        Schema::dropIfExists('web_contact_us');
    }
}
