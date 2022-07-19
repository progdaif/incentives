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
        Schema::create('actions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 63);
            $table->unsignedTinyInteger('boostable')
                ->default(1)
                ->index()
                ->comment('Indicates whether action can be a part of booster or not');
            $table->unsignedSmallInteger('points')
                ->default(1)
                ->comment('Indicates to points count for performing this action');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
};