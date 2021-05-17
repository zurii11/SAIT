<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('start_station_id')->constrained('stations');
            $table->foreignId('company_id')->constrained('companies');
            $table->json('stop_stations_ids');
            $table->string('cash_register_number');
            $table->smallInteger('price');
            $table->foreign(['cash_register_number', 'company_id'])->references(['number', 'company_id'])->on('cash_registers');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
