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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();

            $table->string('name');          // Visitor name
            $table->string('phone');         // Mobile number
            $table->string('flat_no');       // Flat number

            $table->string('purpose');       // Guest / Delivery / Service

            $table->timestamp('check_in')->nullable();   // Entry time
            $table->timestamp('check_out')->nullable();  // Exit time
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
