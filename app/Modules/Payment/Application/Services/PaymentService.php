<?php

namespace App\Modules\Payment\Application\Services;

use App\Modules\Order\Domain\Models\Order;
use App\Modules\Payment\Domain\Models\Payment;
use Illuminate\Support\Str;

class PaymentService
{
    public function initiatePayment(Order $order, string $paymentMethod, string $idempotencyKey): Payment
    {
        // Check Idempotency
        $existingPayment = Payment::where('idempotency_key', $idempotencyKey)->first();
        if ($existingPayment) {
            return $existingPayment;
        }

        // Create Pending Payment Record
        $payment = Payment::create([
            'order_id' => $order->id,
            'idempotency_key' => $idempotencyKey,
            'payment_method' => $paymentMethod,
            'amount' => $order->total_amount,
            'status' => 'pending',
            'transaction_id' => 'txn_' . Str::random(16), // Mock transaction ID
        ]);

        // Mock Stripe Provider Call
        $isSuccess = rand(1, 100) > 10; // 90% success rate mock

        if ($isSuccess) {
            $payment->update([
                'status' => 'completed',
                'provider_response' => ['status' => 'succeeded', 'id' => $payment->transaction_id]
            ]);
            
            $order->update(['status' => 'paid']);
        } else {
            $payment->update([
                'status' => 'failed',
                'provider_response' => ['status' => 'failed', 'error' => 'Card declined']
            ]);
            
            $order->update(['status' => 'failed']);
        }

        return $payment;
    }
}
