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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('cat_icon')->nullable();
            $table->string('cat_image')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('Isb_image')->nullable();
            $table->integer('is_game')->nullable()->default(0);
            $table->integer('feature_cat')->nullable()->default(0);
            $table->integer('show_catpage')->default(0);
            $table->integer('cat_page_order')->nullable()->default(0);
            // $table->integer('created_by');
            // $table->integer('updated_by');
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
        Schema::dropIfExists('categories');
    }
};
