<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tabel products
        // Schema::create('products', function (Blueprint $table) {
        //     $table->id('product_id');
        //     $table->string('name', 100);
        //     $table->decimal('price', 10, 2);
        //     $table->integer('stock');
        //     $table->unsignedBigInteger('supplier_id');
        //     $table->unsignedBigInteger('category_id');
        //     $table->timestamps();

        //     // Foreign keys
        //     $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');
        //     $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        // });



    }

    public function down()
    {
        // Schema::dropIfExists('products');
        // Schema::dropIfExists('product_details');
        // Schema::dropIfExists('supplier');
    }


};
