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
        // Check if the column exists before trying to drop it
        if (Schema::hasColumn('users', 'aura')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('aura');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-add the column if rolling back
        Schema::table('users', function (Blueprint $table) {
            // Add it back with the same definition as before
            $table->integer('aura')->default(0)->after('bio'); // Adjust 'after' if needed
        });
    }
};