<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNestingDurationToChannelDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_datas', function (Blueprint $table) {
            $table->integer('nesting_duration')->nullable()->after('class_duration');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_datas', function (Blueprint $table) {
            $table->dropColumn('nesting_duration');
        });
    }
}
