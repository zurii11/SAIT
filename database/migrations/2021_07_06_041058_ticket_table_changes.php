<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketTableChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('customer_id')->nullable()->change();
            $table->dropColumn('schedule_id');
            $table->foreignId('departure_id')->constrained('departures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('departure_id');
            $table->foreignId('schedule_id')->constrained('schedules');
        });
    }
}
