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
        Schema::create('corporate_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('order_no')->default(1);
            $table->string('title',255)->nullable();
            $table->string('title_green',255)->nullable();
            $table->string('side_image',255)->nullable();
            $table->text('right_text')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('corporate_settings');
    }
};
