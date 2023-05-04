<?php

namespace App\Http\Livewire\Dashboard\Orders;

use App\Models\Order;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class StatusUpdater extends Component
{

    use LivewireAlert;

    public $order;
    public int $status_id = 0;

    public array $statusArray = [];

    public function updatedStatusId(): void
    {

        if (in_array($this->status_id, $this->statusArray)) {
            $this->order->update([
                'status' => $this->status_id,
            ]);
            $this->alert('success', 'Successfully updated order status.');
        }
    }

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->status_id = $order->status;
        $this->statusArray = Order::getStatusAsArray();
    }

    public function render()
    {
        return view('livewire.dashboard.orders.status-updater');
    }
}
