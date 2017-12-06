<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSlidePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_slide_picture', function (Blueprint $table) {
            $table->increments('id')->unique()->index()->comment('首頁輪播圖id');
            $table->string('name',50)->comment('輪播圖名稱');
            $table->text('summary',500)->nullable()->comment('說明');
            $table->string('action_name',191)->nullable()->comment('網址名稱');
            $table->string('action_url')->nullable()->comment('網址');
            $table->string('slide_pic')->comment('圖檔'); 
            $table->boolean('showfront')->default(false)->comment('前台顯示');
            $table->timestamp('action_from')->nullable()->comment('開始時間');
            $table->timestamp('action_to')->nullable()->comment('結束時間');
            $table->boolean('is_website',1)->default(0)->comment('顯示狀態');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slide_picture');
    }
}
