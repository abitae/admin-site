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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');            
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('type_documents');
            $table->string('serie_documents');
            $table->string('num_documents');
            $table->string('moneda');
            $table->date('date_documents')->nullable();
            $table->longText('observaciones')->nullable();
            $table->decimal('price_venta',8,2);
            $table->decimal('tipo_cambio',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
