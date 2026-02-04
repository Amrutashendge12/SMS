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
        Schema::table('users', function (Blueprint $table) {
              $table->string('mobile')->nullable();
            $table->integer('total_family_members')->nullable();
            $table->integer('total_children')->nullable();
            $table->integer('boys')->nullable();
            $table->integer('girls')->nullable();
            $table->integer('old_people')->nullable();
            $table->string('occupation')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
