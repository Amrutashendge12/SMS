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
        Schema::create('bills', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_role'); // owner/admin/security
            $table->string('bill_type'); // maintenance, light etc
            $table->decimal('amount',10,2);
            $table->enum('status',['Pending','Paid'])->default('Pending');
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
