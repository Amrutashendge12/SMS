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
        Schema::create('securities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile', 15);
            $table->string('photo')->nullable();
            $table->string('id_proof')->nullable();
            $table->text('address')->nullable();
            $table->string('education')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('shift')->nullable();
            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();
            $table->boolean('status')->default(1);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('securities');
    }
};
