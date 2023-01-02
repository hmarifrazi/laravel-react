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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->bigint('country_id');
            $table->string('state');
            $table->timestamps();
        });
        DB::table('states')->insert([
            [
                'state' => 'Dhaka',
                'created_at' => Carbon::now(),
            ],
            [
                'state' => 'Dubay',
                'created_at' => Carbon::now(),
            ],
            [
                'state' => 'Karachi',
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
        Schema::dropIfExists('states');
    }
};
