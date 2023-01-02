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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->string('model_no')->nullable();
            $table->unsignedBigInteger('manufacturer_id')->index()->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('product_title')->nullable();
            $table->string('feature_image')->nullable()->default(4);
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->longText('specification')->nullable()->default(4);
            $table->string('warranty')->nullable();
            $table->string('product_condition')->nullable();
            $table->string('vat_status')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->decimal('discount',10,2)->nullable();
            $table->integer('qty')->default(1)->nullable();
            $table->integer('max_qty')->nullable()->default(4);
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
        Schema::dropIfExists('products');
    }
};
