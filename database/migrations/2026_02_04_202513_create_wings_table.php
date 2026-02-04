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
        Schema::create('wings', function (Blueprint $table) {
             $table->id();
            $table->foreignId('phase_id')->constrained()->cascadeOnDelete();
            $table->string('wing_name'); // A, B, C
            $table->integer('total_floors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wings');
    }
};
