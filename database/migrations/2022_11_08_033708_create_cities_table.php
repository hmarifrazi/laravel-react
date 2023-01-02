<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->bigint('country_id');
            $table->bigint('state_id');
            $table->string('city');
            $table->timestamps();
        });
        DB::table('cities')->insert([
            [
                'city' => 'Dhaka City',
                'created_at' => Carbon::now(),
            ],
            [
                'city' => 'Dubay City',
                'created_at' => Carbon::now(),
            ],
            [
                'city' => 'Karachi City',
                'created_at' => Carbon::now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
