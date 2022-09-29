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
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('nick_name', 50)->nullable();
            $table->string('landmark', 50);
            $table->string('location', 50);
            $table->string('meal_style');   //不指定長度就是255
            $table->string('dislike_food');
            $table->boolean('public');
            $table->enum('gender', array('male', 'female'));
            $table->date('birth')->nullable();  //MySQL 5.7, 0000-00-00 00:00:00 is no longer considered a valid date, since strict mode is enabled by default
            $table->string('user_photo')->nullable();
            $table->string('local_favorite');
            $table->string('eating_habits');
            $table->string('longitude')->nullable(); //經度
            $table->string('latitude')->nullable();  //緯度
            $table->string('remark01')->nullable();
            $table->string('remark02')->nullable();
            $table->string('remark03')->nullable();
            $table->string('line_id')->nullable();
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
        });
    }
};
