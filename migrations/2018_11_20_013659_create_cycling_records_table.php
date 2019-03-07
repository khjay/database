<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycling_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->unsignedInteger('moving_time')->comment('移動時間 秒');
            $table->float('distance')->comment('移動距離 公尺');
            $table->unsignedInteger('calories')->default(0)->comment('消耗卡路里');
            $table->float('max_speed')->comment('最高速度 公尺/秒');
            $table->float('average_speed')->comment('平均速度 公尺/秒');
            $table->float('elevation_gain')->default(0);
            $table->float('elevation_high')->default(0);
            $table->float('elevation_low')->default(0);
            $table->json('sensors')->nullable()->comment('單車感應器');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cycling_records');
    }
}
