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
        Schema::create('headerviews', function (Blueprint $table) {
            $table->id();
            $table->string('logo_link');
            $table->string('logo_image');
            $table->string('whatsapp');
            $table->string('contact');
            $table->string('email');
            $table->string('menu_setting',2000);
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('headerviews');
    }
};
