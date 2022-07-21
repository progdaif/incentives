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
        Schema::table('user_points', function (Blueprint $table) {
            $table->dropIndex(['active_user_points']);
            $table->index(['created_at'], 'created_at_index');
            $table->index(
                ['user_id', 'expired_at', 'exchanged_at', 'created_at'],
                'active_time_user_points_index'
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
        Schema::table('user_points', function (Blueprint $table) {
            $table->dropIndex(['active_time_user_points_index', 'created_at_index']);
            $table->index(
                ['user_id', 'expired_at', 'exchanged_at'],
                'active_user_points'
            );
        });
    }
};