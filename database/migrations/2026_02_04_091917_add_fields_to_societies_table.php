<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('societies', function (Blueprint $table) {
            $table->string('society_name');
            $table->string('registration_no')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('pincode');
        });
    }

    public function down(): void
    {
        Schema::table('societies', function (Blueprint $table) {
            $table->dropColumn([
                'society_name',
                'registration_no',
                'address',
                'city',
                'pincode'
            ]);
        });
    }
};
