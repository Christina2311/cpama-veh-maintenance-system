<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('vehicle_name', 100)->nullable()->after('vehicle_id');
            $table->string('license_no', 50)->nullable()->after('vehicle_name');
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['vehicle_name', 'license_no']);
        });
    }
};