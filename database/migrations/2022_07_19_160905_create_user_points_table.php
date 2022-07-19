<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('action_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamp('expired_at')
                ->nullable()
                ->index()
                ->comment('In case of points added by boosters should be filled');
            $table->timestamp('exchanged_at')
                ->nullable()
                ->index()
                ->comment('In case of points already exchanged should be filled');
            $table->unsignedTinyInteger('booster_id')
                ->default(0)
                ->index()
                ->comment('In case of points added by boosters be filled by booster id');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->index(
                ['user_id', 'expired_at', 'exchanged_at'],
                'active_user_points'
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_points');
    }
};