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
        Schema::create('often_diners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->string('of_diner', 50)->nullable();  //常光顧店家名稱
            $table->string('of_meal', 50)->nullable();  //常光顧餐點名稱
            $table->string('of_address', 50)->nullable();  //約略地址

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('often_diners', function(Blueprint $table)
        {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('often_diners');
    }
};
