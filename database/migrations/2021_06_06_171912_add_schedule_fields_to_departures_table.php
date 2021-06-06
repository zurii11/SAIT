<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduleFieldsToDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departures', function (Blueprint $table) {
            $table->foreignId('route_id')->after('buses_drivers_id')->nullable()->constrained('routes');
            $table->time('start_time')->after('buses_drivers_id')->nullable();
            $table->boolean('active')->after('start_time')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departures', function (Blueprint $table) {
            $table->dropColumn('route_id');
            $table->dropColumn('start_time');
            $table->dropColumn('active');
        });
    }
}
