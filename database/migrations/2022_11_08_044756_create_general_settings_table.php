<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('max_shipping_time')->nullable();
            $table->string('min_shipping_time')->nullable();
            $table->string('shipping_charge')->nullable();
            $table->integer('cod_status')->nullable()->default(0);
            $table->string('cod_name')->nullable();
            $table->text('cod_note')->nullable();
            $table->integer('cia_status')->default(0);
            $table->string('cia_name')->nullable();
            $table->text('cia_note')->nullable();
            $table->integer('dot_status')->default(0);
            $table->string('dot_name')->nullable();
            $table->text('dot_note')->nullable();
            $table->string('menu_setting')->nullable();
            $table->integer('online_pay_status')->nullable()->default(0);
            $table->string('online_pay_name')->nullable();
            $table->text('online_pay_note')->nullable();
           
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
        Schema::dropIfExists('general_settings');
    }
};
