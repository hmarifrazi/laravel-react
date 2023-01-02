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
        Schema::create('phone_exts', function (Blueprint $table) {
            $table->id();
            $table->string('ext');
            $table->timestamps();
        });
         DB::table('phone_exts')->insert([
            [
                'ext'=>'+880',
                'created_at'=>Carbon::now(),
            ],
            [
                'ext'=>'+971',
                'created_at'=>Carbon::now(),
            ],
            [
                'ext'=>'+966',
                'created_at'=>Carbon::now(),
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
        Schema::dropIfExists('phone_exts');
    }
};
