<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_stores', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('code_fabrica')->nullable();
            $table->string('code_peru')->nullable();
            $table->decimal('price_compra',8,2)->default(0.0);
            $table->decimal('price_venta',8,2)->default(0.0);
            $table->integer('porcentaje')->nullable();
            $table->integer('stock');
            $table->integer('dias_entrega')->default(4);
            $table->longText('description');
            $table->string('tipo')->nullable();
            $table->string('color')->nullable();
            $table->string('garantia')->default(1);
            $table->string('observaciones')->nullable();
            $table->string('image')->nullable();
            $table->string('archivo')->nullable();
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stores');
    }
};
