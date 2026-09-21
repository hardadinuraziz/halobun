<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $paymentService) {}

    /**
     * Webhook callback dari Midtrans (POST)
     */
    public function callback(Request $request)
    {
        Log::info('Midtrans webhook received', $request->all());

        try {
            $this->paymentService->handleCallback($request->all());
            return response()->json(['status' => 'ok'], 200);
        } catch (\Exception $e) {
            Log::error('Payment callback error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Halaman selesai pembayaran (redirect dari Midtrans popup)
     */
    public function finish(string $kodeBooking)
    {
        return redirect()->route('konsultasi.payment-finish', $kodeBooking);
    }
}
