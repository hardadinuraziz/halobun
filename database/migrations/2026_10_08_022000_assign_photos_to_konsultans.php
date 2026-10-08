<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Konsultan;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $photoMap = [
            1 => '/images/halobun_real_practitioner.jpg',     // Dr. Budi Santoso, M.Si
            2 => '/images/halobun_praktisi_hero.jpg',         // Ir. Siti Rahayu, M.P
            3 => '/images/halobun_hero_halodoc.jpg',          // Prof. Ahmad Fauzi, Ph.D
            4 => '/images/halobun_real_female_1.jpg',         // Drh. Maya Kusuma
            5 => '/images/dashboard_praktisi_banner.jpg',     // Rahmat Hidayat, S.P, M.Agr
            6 => '/images/halobun_real_female_2.jpg',         // Dr. Lestari Wulandari
            7 => '/images/halobun_real_practitioner_2.jpg',   // Bayu Pratama, S.P.
            8 => '/images/halobun_real_soil_test.jpg',        // Prof. Dr. Ir. Suwandi, M.Sc
        ];

        foreach ($photoMap as $id => $photo) {
            $konsultan = Konsultan::find($id);
            if ($konsultan) {
                $konsultan->update(['foto' => $photo]);
                if ($konsultan->user) {
                    $konsultan->user->update(['avatar' => $photo]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op
    }
};
