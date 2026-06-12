<?php

namespace App\Modules\Checkout\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Checkout\Repositories\OrderRepository;
use Illuminate\Validation\ValidationException;

class UpdateOrderStatusAction extends BaseAction
{
    private const ALLOWED_STATUSES = [
        'pending',
        'paid',
        'processing',
        'shipped',
        'cancelled',
    ];

    public function __construct(private readonly OrderRepository $orderRepository) {}

    public function execute(mixed ...$args): void
    {
        [$id, $newStatus] = $args;

        if (!in_array($newStatus, self::ALLOWED_STATUSES)) {
            throw ValidationException::withMessages(['status' => 'Geçersiz sipariş durumu.']);
        }

        $order = $this->orderRepository->findById($id);

        // Status transition logic
        if ($order->status === 'cancelled') {
            throw ValidationException::withMessages(['status' => 'İptal edilmiş bir siparişin durumu değiştirilemez.']);
        }

        if ($order->status === 'shipped' && $newStatus === 'processing') {
            throw ValidationException::withMessages(['status' => 'Kargolanmış sipariş geri alınamaz.']);
        }

        $this->orderRepository->update($order->id, ['status' => $newStatus]);
    }
}
