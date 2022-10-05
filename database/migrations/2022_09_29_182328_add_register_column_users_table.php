<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('first_name', 50)->nullable();
      $table->string('last_name', 50)->nullable();
      $table->string('nick_name', 50)->nullable();
      $table->string('landmark', 50)->nullable();  //地標
      $table->string('location', 50)->nullable();  //所在縣市資料
      $table->boolean('public')->nullable(); //資料是否公開
      $table->enum('gender', array('male', 'female'))->nullable();
      $table->date('birth')->nullable();  //MySQL 5.7, 0000-00-00 00:00:00 is no longer considered a valid date, since strict mode is enabled by default
      $table->string('user_photo')->nullable();
      $table->string('u_diet_groups')->nullable();   //不指定長度就是255
      $table->string('u_dislike_food')->nullable();
      $table->string('u_chain_diners')->nullable();
      $table->string('u_diet_behaviors')->nullable();
      $table->string('long')->nullable(); //經度
      $table->string('lat')->nullable();  //緯度
      $table->string('google_id')->nullable(); //google 帳號驗證
      $table->string('line_id')->nullable();
      $table->string('remark01')->nullable();
      $table->string('remark02')->nullable();
      $table->string('remark03')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      //
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('nick_name');
            $table->dropColumn('landmark');
            $table->dropColumn('location');
            $table->dropColumn('public');
            $table->dropColumn('gender');
            $table->dropColumn('birth');
            $table->dropColumn('user_photo');
            $table->dropColumn('u_diet_groups');
            $table->dropColumn('u_dislike_food');
            $table->dropColumn('u_chain_diners');
            $table->dropColumn('u_diet_behaviors');
            $table->dropColumn('long');
            $table->dropColumn('lat');
            $table->dropColumn('google_id');
            $table->dropColumn('line_id');
            $table->dropColumn('remark01');
            $table->dropColumn('remark02');
            $table->dropColumn('remark03');
    });
  }
};
