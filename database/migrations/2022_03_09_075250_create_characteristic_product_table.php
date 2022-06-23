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
        Schema::create('characteristic_product', function (Blueprint $table) {

            $table->foreignId('product_id')->constrained('products')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('characteristic_id')->constrained('characteristics')
                ->cascadeOnDelete()->cascadeOnUpdate();

        });
    }


    public function down()
    {
        Schema::dropIfExists('characteristic_product');
    }
};
