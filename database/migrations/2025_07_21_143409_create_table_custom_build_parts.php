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
        Schema::create('custom_build_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("custom_builds")->constrained('custom_builds')->onDelete('cascade');
            $table->integer('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_custom_build_parts');
    }
};
