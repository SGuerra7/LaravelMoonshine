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
        Schema::create('supplier_material', function (Blueprint $table) {
            // Si no necesitas id auto-incremental, omítelo.
            $table->foreignId('material_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('supplier_id')
                ->constrained()
                ->onDelete('cascade');
            // Para evitar duplicados:
            $table->primary(['material_id', 'supplier_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_material');
    }
};
