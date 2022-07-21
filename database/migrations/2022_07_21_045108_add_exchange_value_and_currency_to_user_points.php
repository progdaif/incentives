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
            $table->unsignedSmallInteger('exchanged_value')
                ->nullable()
                ->after('points')
                ->comment('money amount exchanged for points');
            $table->string('exchanged_currency', 3)
                ->nullable()
                ->after('exchanged_value');
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
            $table->dropColumn(['exchanged_value', 'exchanged_currency']);
        });
    }
};