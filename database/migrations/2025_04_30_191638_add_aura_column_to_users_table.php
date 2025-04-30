<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the column doesn't already exist
        Schema::table('users', function (Blueprint $table) {
            // Add the aura column, defaulting to 0
            $table->integer('aura')->default(0)->after('bio'); // Adjust 'after' if needed
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the column if rolling back
        if (Schema::hasColumn('users', 'aura')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('aura');
            });
        }
    }
};