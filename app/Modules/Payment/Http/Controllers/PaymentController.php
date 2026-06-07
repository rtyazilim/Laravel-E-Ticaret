<?php

namespace App\Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Order\Domain\Models\Order;
use App\Modules\Payment\Application\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function init(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string',
            'idempotency_key' => 'nullable|string',
        ]);

        $order = Order::findOrFail($validated['order_id']);

        // Generate idempotency key if not provided by client
        $idempotencyKey = $validated['idempotency_key'] ?? (string) Str::uuid();

        $payment = $this->paymentService->initiatePayment(
            $order, 
            $validated['payment_method'], 
            $idempotencyKey
        );

        return response()->json(['data' => $payment]);
    }

    public function webhook(Request $request): JsonResponse
    {
        // Stub for external provider webhook
        return response()->json(['status' => 'received']);
    }
}
