<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('email')->unique()->index()->comment('電子郵件');
            $table->string('name', 50)->comment('姓名');
            $table->string('cellphone', 50)->nullable()->comment('手機號碼');
            $table->string('telephone', 50)->nullable()->comment('聯絡電話');
            $table->string('password', 60)->nullable()->comment('密碼');
            $table->timestamp('password_updated_at')->nullable()->comment('密碼更新');
            $table->string('address')->nullable()->comment('地址');
            $table->text('remarks')->nullable()->comment('備註');
            $table->string('client_ip')->comment('最近ip');
            $table->text('client_agent')->comment('最近使用裝置');
            $table->rememberToken();
            $table->string('confirmation_token')->nullable();
            $table->timestamp('logged_in_at')->nullable()->comment('最近登入日期');
            $table->timestamps();
            $table->timestamp('confirmed_at')->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
