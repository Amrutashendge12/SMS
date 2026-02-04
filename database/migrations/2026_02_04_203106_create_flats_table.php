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
        Schema::create('flats', function (Blueprint $table) {
             $table->id();
            $table->foreignId('wing_id')->constrained()->cascadeOnDelete();
            $table->string('flat_number');          // 101, 202, A-101
            $table->integer('floor_no');            // 1,2,3...
            $table->enum('flat_type', ['1RK','1BHK','2BHK','3BHK']);
            $table->enum('status', ['vacant','occupied'])->default('vacant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
