<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Update Admin password
        User::where('email', 'admin@hallobun.com')->update([
            'password' => Hash::make('halobun2026'),
        ]);

        // 2. Update Demo User password
        User::where('email', 'demo@hallobun.com')->update([
            'password' => Hash::make('halobun2026'),
        ]);

        // 3. Update all system consultants (@hallobun.com)
        User::where('email', 'like', '%@hallobun.com')->update([
            'password' => Hash::make('halobun2026'),
        ]);

        // 4. Update any role=admin user if password is default
        User::where('role', 'admin')->update([
            'password' => Hash::make('halobun2026'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op for safety
    }
};
