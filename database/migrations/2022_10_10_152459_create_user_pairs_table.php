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
        Schema::create('user_pairs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->string('u_religion', 50)->nullable();  //user宗教信仰
            $table->string('u_relation', 50)->nullable();  //user感情狀態
            $table->string('u_education', 50)->nullable();  //最高學歷
            $table->decimal('u_height')->nullable(); //user身高
            $table->string('u_job', 50)->nullable();  //職業
            $table->string('u_interest', 50)->nullable();  //興趣/專長
            $table->string('u_life_photo', 255)->nullable();  //生活照
            $table->string('u_social_type', 50)->nullable();  //社交連結類別
            $table->string('u_social_url', 255)->nullable();  //社交連結網址
            $table->string('u_intro', 255)->nullable();  //自我介紹
            $table->enum('pa_gender', array('male', 'female'))->nullable(); //配對性別
            $table->decimal('pa_age_max')->nullable(); //年齡區間最高
            $table->decimal('pa_age_mini')->nullable(); //年齡區間最低
            $table->decimal('pa_distance')->nullable(); //距離區間
            $table->string('pa_diet_behavior', 255)->nullable();  //飲食習慣
            $table->string('pa_relation', 50)->nullable();  //配對感情狀態
            $table->decimal('pa_height_max')->nullable(); //配對身高最高
            $table->decimal('pa_height_mini')->nullable(); //配對身高最低
            $table->string('pa_religion', 50)->nullable();  //配對宗教信仰

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_pairs', function(Blueprint $table)
        {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('user_pairs');
    }
};
