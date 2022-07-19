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
        Schema::create('boosters', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 63);
            $table->unsignedSmallInteger('points')
                ->default(0);
            $table->timestamp('booster_available_at')
                ->nullable()
                ->index()
                ->comment('The time the booster will be available at to be applied');
            $table->timestamp('booster_expired_at')
                ->nullable()
                ->index()
                ->comment('The time the booster will expire at and cn not be applied');
            $table->unsignedSmallInteger('action_id')->index();
            $table->unsignedSmallInteger('actions_reapeated_times')
                ->default(1)
                ->index()
                ->comment('Indicates to the times that action is repeated');
            $table->unsignedBigInteger('actions_within_minutes')
                ->default(60)
                ->comment('Indicates to the time interval that action happened within');
            $table->time('actions_from_time')
                ->default('00:00:00')
                ->index()
                ->comment('Indicates to the start time of day that actions should happened');
            $table->time('actions_to_time')
                ->default('23:59:59')
                ->index()
                ->comment('Indicates to the end time of day that actions should happened');
            $table->json('actions_week_days')
                ->nullable()
                ->comment('Indicates to the week days the booster available at');
            /*
                example for actions_week_days {"availableAt":[0,1,2,3,4,5,6]}
                and if it was null then it is available all week
            */
            $table->timestamps();
            $table->engine = 'MyISAM';
            $table->index(
                ['booster_available_at', 'booster_expired_at'],
                'active_boosters_index'
            );
            $table->index(
                ['booster_available_at', 'booster_expired_at', 'action_id'],
                'active_boosters_action_index'
            );
            $table->index(
                ['action_id', 'actions_reapeated_times'],
                'reapeated_actions_index'
            );
            $table->index(
                ['action_id', 'actions_reapeated_times', 'actions_within_minutes'],
                'reapeated_actions_interval_index'
            );
            $table->index(
                ['actions_from_time', 'actions_to_time'],
                'boosters_day_times_index'
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
        Schema::dropIfExists('boosters');
    }
};