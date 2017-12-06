<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_news', function (Blueprint $table) {        
            $table->increments('id')->unique()->index();
            $table->string('title')->comment('標題');
            $table->string('summary')->nullable()->comment('描述');
            $table->text('content')->comment('內文');
            $table->timestamp('active_from')->nullable()->comment('發布日期'); 
            // aka posted_at (default now)
            $table->timestamp('active_to')->nullable()->comment('到期日期');
            $table->timestamps();
            $table->string('update_user',25)->comment('最後更新者');
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
        Schema::dropIfExists('web_news');
    }
}
