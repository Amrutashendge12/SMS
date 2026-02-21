<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('maintenances', function (Blueprint $table) {
        $table->id();

        $table->string('society_name');
        $table->string('phase_name');
        $table->string('wing');
        $table->string('floor');
        $table->string('flat_no');
        $table->string('owner_name');

        $table->decimal('amount',10,2);
        $table->date('due_date');
        $table->date('paid_date')->nullable();

        $table->enum('status',['paid','pending'])->default('pending');
        $table->string('payment_mode')->nullable();
        $table->text('remark')->nullable();

        $table->foreignId('created_by')->constrained('users');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
