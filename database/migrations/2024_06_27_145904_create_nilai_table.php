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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alt_id');
            $table->decimal('c1', 8, 2)->default(0.00);
            $table->decimal('c2', 8, 2)->default(0.00);
            $table->decimal('c3', 8, 2)->default(0.00);
            $table->decimal('c4', 8, 2)->default(0.00);
            $table->foreign('alt_id')->references('id')->on('alternatif')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
