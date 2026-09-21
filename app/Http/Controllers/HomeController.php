<?php

namespace App\Http\Controllers;

use App\Models\Konsultan;
use App\Models\Booking;
use App\Models\Sarana;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $konsultanFeatured = Konsultan::active()
            ->with('user')
            ->orderByDesc('rating')
            ->take(6)
            ->get();

        $totalKonsultan    = Konsultan::active()->count();
        $totalKonsultasi   = Booking::where('status', 'completed')->count();
        $saranaFeatured    = Sarana::active()->featured()->take(4)->get();

        $layananList = [
            [
                'icon'        => '💬',
                'title'       => 'Konsultasi Online',
                'desc'        => 'Konsultasi langsung dengan pakar pertanian via video call kapanpun & dimanapun.',
                'url'         => route('konsultasi.index'),
                'color'       => 'emerald',
            ],
            [
                'icon'        => '🎤',
                'title'       => 'Undang Narasumber',
                'desc'        => 'Undang pakar pertanian untuk acara seminar, penyuluhan, atau pelatihan Anda.',
                'url'         => route('narsum.index'),
                'color'       => 'blue',
            ],
            [
                'icon'        => '🚜',
                'title'       => 'Kunjungan Offline',
                'desc'        => 'Tim ahli kami siap datang langsung ke lahan Anda untuk konsultasi tatap muka.',
                'url'         => route('kunjungan.index'),
                'color'       => 'amber',
            ],
            [
                'icon'        => '🌿',
                'title'       => 'Sarana Pertanian',
                'desc'        => 'Temukan berbagai produk pertanian berkualitas: pupuk, bibit, dan peralatan.',
                'url'         => route('sarana.index'),
                'color'       => 'lime',
            ],
        ];

        return view('home.index', compact(
            'konsultanFeatured', 'totalKonsultan', 'totalKonsultasi',
            'saranaFeatured', 'layananList'
        ));
    }
}
