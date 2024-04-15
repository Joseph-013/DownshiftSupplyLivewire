<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use App\Models\Transaction;
use Livewire\Component;

class NotificationBadgeResponsive extends Component
{
    public $count;

    #[On('updateBadge')]
    public function mount()
    {
        $this->count = $this->getProcessingTransactionsCount();
    }

    public function render()
    {
        return view('livewire.notification-badge-responsive');
    }

    public function getProcessingTransactionsCount()
    {
        return Transaction::where('status', 'Processing')->count();
    }
}
